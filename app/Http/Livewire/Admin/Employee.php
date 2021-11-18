<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Employee as EmployeeModel;
use App\Models\Department;
use App\Models\User;
use App\Models\Position;
use App\Models\Designation;

use App\Models\LeaveCredit;
use App\Models\LeaveType;



class Employee extends Component
{
    public $add=false;
    public $edit=false;
    public $searchQuery='';

    public $departments=[];
    public $heads=[];
    public $users=[];
    public $positions=[];

    public $credits=[];

    public $creditModal=false;





    public $create_firstname='';
    public $create_middlename='';
    public $create_lastname='';
    public $create_address='';
    public $create_contact='';
    public $create_department_id='';
    public $create_approver_id='';
    public $create_position='';
    public $position_department='';
    public $searchUser='';

    public $selected_id='';

    public $credit_number='';


    public $edit_firstname='';
    public $edit_middlename='';
    public $edit_lastname='';
    public $edit_address='';
    public $edit_contact='';
    public $edit_department_id='';
    public $edit_approver_id='';
    public $edit_position='';
    public $edit_position_department=''; 

    public $employee='';
    
    public function render()
    {

     


        $this->heads = EmployeeModel::whereHas('designation.position',function($q){
            $q->where('name','Head');
        })->get();
        return view('livewire.admin.employee',[
            'employees'=>EmployeeModel::where('firstname','like','%'.$this->searchQuery.'%')->orWhere('lastname','like','%'.$this->searchQuery.'%')->with('designation')->paginate(10),
           
        ]);
    }

    public function mount()
    {
        $this->departments = Department::all();
      
        $this->positions= Position::all();
    }

    public function updatedSearchUser()
    {
        $this->users = User::where('name','like','%'.$this->searchUser.'%')->where('role','!=','admin')->doesnthave('employee')->get();
    }

    public function selectUser($id)
    {
        $this->selected_id = $id;
    }

    public function cancel()
    {
        $this->add=false;
        $this->selected_id='';

        $this->create_firstname='';
        $this->create_middlename='';
        $this->create_lastname='';
        $this->create_address='';
        $this->create_contact='';
        $this->create_department_id='';
        $this->create_approver_id='';
        $this->searchUser='';
        $this->add=false;
        $this->edit=false;
    }

    public function create()
    {
        $this->validate([
            'create_firstname'=>'required',
            'create_middlename'=>'nullable',
            'create_lastname'=>'required',
            'create_address'=>'required',
            'create_contact'=>'required',
            'create_department_id'=>'required',
            'create_approver_id'=>'nullable',
            'create_position'=>'required',
            'position_department'=>'required',
        ]);

        $employee = EmployeeModel::create([
            'user_id'=>$this->selected_id,
            'firstname'=>$this->create_firstname,
            'middlename'=>$this->create_middlename,
            'lastname'=>$this->create_lastname,
            'address'=>$this->create_address,
            'contact_number'=>$this->create_contact,
            'department_id'=>$this->create_department_id,
            'approver_id'=>$this->create_approver_id,
        ]);

        Designation::create([
            'employee_id'=>$employee->id,
            'position_id'=>$this->create_position,
            'department_id'=>$this->position_department,
        ]);

        $leaveTypes = LeaveType::all();

        if ($leaveTypes->count()>0) {
            foreach($leaveTypes as $leaveType){
                LeaveCredit::create([
                    'employee_id'=>$employee->id,
                    'leave_type_id'=>$leaveType->id,
                ]);
            }
        }

        $this->cancel();

        $this->dispatchBrowserEvent('success');

      

    }

    public function edit($id)
    {
        $this->edit=true;
        $this->employee = $id;
        $employee = EmployeeModel::where('id',$this->employee)->first();
        $this->edit_firstname=$employee->firstname;
        $this->edit_middlename=$employee->middlename;
        $this->edit_lastname=$employee->lastname;
        $this->edit_address=$employee->address;
        $this->edit_contact=$employee->contact_number;
        $this->edit_department_id=$employee->department_id;
        $this->edit_approver_id=$employee->approver_id;
        $this->edit_position=$employee->designation ? $employee->designation->position_id : '';
        $this->edit_position_department=$employee->designation ? $employee->designation->department_id : '';
    }

    public function update()
    {
        $this->validate([
            'edit_firstname'=>'required',
            'edit_middlename'=>'nullable',
            'edit_lastname'=>'required',
            'edit_address'=>'required',
            'edit_contact'=>'required',
            'edit_department_id'=>'required',
            'edit_approver_id'=>'nullable',
            'edit_position'=>'required',
            'edit_position_department'=>'required',
        ]);

        $employee = EmployeeModel::where('id',$this->employee)->first();

        $employee->update([
            'firstname'=>$this->edit_firstname,
            'middlename'=>$this->edit_middlename,
            'lastname'=>$this->edit_lastname,
            'address'=>$this->edit_address,
            'contact_number'=>$this->edit_contact,
            'department_id'=>$this->edit_department_id,
            'approver_id'=>$this->edit_approver_id,
        ]);

        $designation = Designation::where('employee_id',$this->employee)->first();

       if ($designation) {
           $designation->update([
            'position_id'=>$this->edit_position,
            'department_id'=>$this->edit_position_department,
           ]);
           # code...
       }else{
              Designation::create([
                'employee_id'=>$this->employee,
                'position_id'=>$this->edit_position,
                'department_id'=>$this->edit_position_department,
              ]);
       }

        $this->edit_firstname='';
        $this->edit_middlename='';
        $this->edit_lastname='';
        $this->edit_address='';
        $this->edit_contact='';
        $this->edit_department_id='';
        $this->edit_approver_id='';
        $this->edit_position='';
        $this->edit_position_department='';
        $this->edit=false;
        $this->dispatchBrowserEvent('success');
    }


    public function deleteEmployee($id)
    {
       $this->employee = $id;
       $this->dispatchBrowserEvent('confirm-delete');
    }



    protected $listeners = [
        'yes' => 'confirmDelete',
        'cancel'=>'cancelConfirm',
    ];

    public function confirmDelete()
    {
        $employee = EmployeeModel::where('id',$this->employee)->first();
        $employee->delete();
        $this->employee='';
        $this->dispatchBrowserEvent('success');
    }

    public function cancelConfirm()
    {
        $this->employee='';
        $this->dispatchBrowserEvent('cancel-events');

    }
    

    public function getCredits($id)
    {
        $this->credits = LeaveCredit::where('employee_id',$id)->get();
        $this->creditModal=true;
    }

    public function addCredit($id)
    {
        $this->validate([
            'credit_number'=>'required|numeric',
        ]);
       if ($this->credit_number) {
          $leaveCredit = LeaveCredit::where('id',$id)->first();
            $leaveCredit->update([
                'balance'=>$this->credit_number,
            ]);
            $this->credit_number='';
            $this->creditModal=false;
            $this->dispatchBrowserEvent('success');
       }
       
    }
    
}