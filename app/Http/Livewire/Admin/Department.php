<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Department as DepartmentModel;
class Department extends Component
{
    public $searchQuery;
    public $create_name;
    public $edit_name;

    public $add=false;
    public $edit=false;

    public $edit_id='';
    public $delete_id='';
    public function render()
    {
        return view('livewire.admin.department',[
            'departments' => DepartmentModel::where('name','like','%'.$this->searchQuery.'%')->paginate(10) 
        ]);
    }

    public function create()
    {
        $this->validate([
            'create_name' => 'required'
        ]);

        DepartmentModel::create([
            'name' => $this->create_name
        ]);

        $this->create_name = null;
        $this->dispatchBrowserEvent('success');
        $this->add=false;
    }

    public function cancel()
    {
        $this->create_name = null;
        $this->edit_name = null;
        $this->add=false;
        $this->edit=false;
    }
    
    public function edit($id)
    {   
        $this->edit_id=$id;
        $this->edit_name = DepartmentModel::find($id)->name;
        $this->edit=true;
    }

    public function update()
    {
        $this->validate([
            'edit_name' => 'required'
        ]);

        DepartmentModel::find($this->edit_id)->update([
            'name' => $this->edit_name
        ]);

        $this->edit_name = null;
        $this->edit=false;
        $this->dispatchBrowserEvent('success');
    }


    public function deleteDepartment($id)
    {
        $this->delete_id=$id;
        $this->dispatchBrowserEvent('confirm-delete');
    }

    protected $listeners = [
        'yes' => 'confirmDelete',
    ];

    public function confirmDelete()
    {
        DepartmentModel::find($this->delete_id)->delete();
        $this->dispatchBrowserEvent('success');
    }
}