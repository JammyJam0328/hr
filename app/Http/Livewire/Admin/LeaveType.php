<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\LeaveType as LeaveTypeModel;
use App\Models\Employee;
use App\Models\LeaveCredit;

class LeaveType extends Component
{   
    public $add=false;
    public $edit=false;

    public $create_type='';
    public $create_description='';
    public $create_payable=false;
   
    public $edit_type='';
    public $edit_description='';
    public $edit_payable=false;


    public $edit_id='';
    public $delete_id='';

    public $searchQuery='';
    public function render()
    {
        return view('livewire.admin.leave-type',[
            'leaveTypes'=>LeaveTypeModel::where('type','like','%'.$this->searchQuery.'%')->get()
        ]);
    }

    public function create(){
        $this->validate([
            'create_type'=>'required',
            'create_description'=>'required',
            'create_payable'=>'required',
        ]);

        $this_type=LeaveTypeModel::create([
            'type'=>$this->create_type,
            'description'=>$this->create_description,
            'payable'=>$this->create_payable,
        ]);

        $employes = Employee::all();

        if ($employes->count()>0) {
            foreach($employes as $employee){
                LeaveCredit::create([
                    'employee_id'=>$employee->id,
                    'leave_type_id'=>$this_type->id,
                ]);
            }
        }


        $this->cancel();
        $this->dispatchBrowserEvent('success');
    }

    public function cancel(){
        $this->create_type='';
        $this->create_description='';
        $this->create_payable=false;
        $this->edit_type='';
        $this->edit_description='';
        $this->edit_payable=false;
        $this->edit=false;
        $this->add=false;
    }

    public function edit($id){
        $this->edit=true;
        $this->edit_id=$id;
        $leaveType=LeaveTypeModel::find($id);
        $this->edit_type=$leaveType->type;
        $this->edit_description=$leaveType->description;
        $this->edit_payable=$leaveType->payable;
    }

    public function update(){
        $this->validate([
            'edit_type'=>'required',
            'edit_description'=>'required',
            'edit_payable'=>'required',
        ]);

        $leaveType=LeaveTypeModel::find($this->edit_id);
        $leaveType->type=$this->edit_type;
        $leaveType->description=$this->edit_description;
        $leaveType->payable=$this->edit_payable;
        $leaveType->save();
        $this->cancel();
        $this->dispatchBrowserEvent('success');
    }

    public function deleteType($id){
        $this->delete_id=$id;
        $this->dispatchBrowserEvent('confirm-delete');
    }

    protected $listeners=[
        'yes'=>'confirmDelete',
    ];

    public function confirmDelete(){
        LeaveTypeModel::find($this->delete_id)->delete();
        $this->dispatchBrowserEvent('success');
    }
}