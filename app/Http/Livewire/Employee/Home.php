<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\LeaveCredit;


class Home extends Component
{
    public $add=false;
    public $edit=false;

    public $create_type='';
    public $create_reason='';
    public $create_start_date='';
    public $create_end_date='';
    public $create_day_type='';
    
    public $types=['Whole day','Dalf day'];

    public $cancel_id='';

    public $leave_credits='';
    public function render()
    {
        
        return view('livewire.employee.home',[
            'leaveTypes'=>LeaveType::all(),
            'leaves'=>Leave::where('employee_id',auth()->user()->employee->id)->get()
        ]);
    }

    public function create()
    {
        
        $id= auth()->user()->employee->id;
        $emp_credit = LeaveCredit::where('employee_id',$id)->where('leave_type_id',$this->create_type)->first();
        $this->leave_credits = $emp_credit->balance;
        $this->validate([
                'create_type'=>'required',
                'create_reason'=>'required',
                'create_start_date'=>'required',
                'create_end_date'=>'required',
                'create_day_type'=>'required',
                'leave_credits'=>'required|not_in:0',
            ]);
        
      
          
            Leave::create([
                'leave_type_id'=>$this->create_type,
                'employee_id'=>auth()->user()->employee->id,
                'reason'=>$this->create_reason,
                'type'=>$this->types[$this->create_day_type],
                'start_date'=>$this->create_start_date,
                'end_date'=>$this->create_end_date,
                'status'=> auth()->user()->is_hr==1?'processing':'pending',
            ]);

            $emp_credit->decrement('balance',1);
            $emp_credit->increment('used',1);

 
            
    
        $this->add=false;
        $this->create_type='';
        $this->create_reason='';
        $this->create_start_date='';
        $this->create_end_date='';
        $this->create_day_type='';
        $this->dispatchBrowserEvent('success');
    }



    public function cancelLeave($id)
    {
        $this->cancel_id=$id;
        $this->dispatchBrowserEvent('confirm-delete');
    }

    protected $listeners = [
        'yes' => 'confirmCancel',
    ];

    public function confirmCancel()
    {
        $leave=Leave::where('id',$this->cancel_id)->first();
        $leave->update([
            'status'=>'cancelled'
        ]);
        $this->dispatchBrowserEvent('success');
    }
}