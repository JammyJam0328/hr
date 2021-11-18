<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Leave;
use App\Models\LeaveType;

class Application extends Component
{
    public $from='';
    public $to='';
    public $status='';
    public $order='ASC';
    public $type='';

    public function render()
    {
        return view('livewire.admin.application',[
            'leaves'=>Leave::where('start_date','like','%'.$this->from.'%')
            ->where('end_date','like','%'.$this->to.'%')
            ->where('status','like','%'.$this->status.'%')
            ->where('leave_type_id','like','%'.$this->type.'%')
            ->OrderBy('id',$this->order)->paginate(10),
            'types'=>LeaveType::all(),
        ]);
    }
}