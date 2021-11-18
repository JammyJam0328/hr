<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use App\Models\Leave;
class LeaveApplication extends Component
{
    public $leave_id='';
    public function render()
    {
        return view('livewire.employee.leave-application',[
            'leaves'=>Leave::where('status','pending')->whereHas('employee',function($q){
                $q->where('approver_id',auth()->user()->employee->id);
            })->get(),
        ]);
    }

    public function approved($id)
    {
        $leave=Leave::find($id);
        $leave->status='approved';
        $leave->save();
        $this->dispatchBrowserEvent('success');
    }

    public function deny($id)
    {
        $this->leave_id=$id;
        $this->dispatchBrowserEvent('confirm-delete');
    }

    protected $listeners = [
        'yes' => 'confirmDeny',
    ];

    public function confirmDeny()
    {
        $leave=Leave::where('id',$this->leave_id)->first();
        $leave->status='denied';
        $leave->save();
        $this->dispatchBrowserEvent('success');
    }
}