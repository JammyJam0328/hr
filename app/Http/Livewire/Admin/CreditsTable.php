<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\LeaveCredit;
class CreditsTable extends Component
{
    public $empl_id;
    
    public function render()
    {
       
        return view('livewire.admin.credits-table',[
            'credits' => LeaveCredit::where('employee_id',$this->empl_id)->get()
        ]);
    }
    public function mount($employee_id)
    {
        $this->empl_id = $employee_id;
    }
}