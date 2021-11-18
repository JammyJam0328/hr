<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use App\Models\Leave;
class ToApprove extends Component
{
    public $leave_id;
    public function render()
    {
        return view('livewire.employee.to-approve',[
            'leaves'=>Leave::where('status','processing')->paginate(10)
        ]);
    }

    public function approved($id)
    {
        $leave=Leave::where('id',$id)->first();
        $leave->status='approved';
        $leave->save();
        $this->dispatchBrowserEvent('success');
    }
    public function denyLeave($id)
    {
      $this->leave_id=$id;
      $this->dispatchBrowserEvent('confirm-delete');
    }

    protected $listeners=[
        'yes'=>'deny',
    ];

    public function deny()
    {
        $leave=Leave::where('id',$this->leave_id)->first();
        $leave->status='denied';
        $leave->save();
        $this->dispatchBrowserEvent('success');
    }
    
}