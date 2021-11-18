<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Position as PositionModel;
class Position extends Component
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
        return view('livewire.admin.position',[
            'positions' => PositionModel::where('name','like','%'.$this->searchQuery.'%')->get()
        ]);
    }

    public function create()
    {
        $this->validate([
            'create_name' => 'required',
        ]);

        PositionModel::create([
            'name' => $this->create_name,
        ]);

        $this->create_name='';
        $this->add=false;
        $this->dispatchBrowserEvent('success');
    }        

    public function edit($id)
    {
        $this->edit_id=$id;
        $this->edit=true;
        $this->edit_name=PositionModel::find($id)->name;
    }

    public function cancel()
    {
        $this->edit_id='';
        $this->edit=false;
        $this->create_name='';
        $this->add=false;
    }

    public function update()
    {
        $this->validate([
            'edit_name' => 'required',
        ]);

        PositionModel::find($this->edit_id)->update([
            'name' => $this->edit_name,
        ]);

        $this->edit_id='';
        $this->edit=false;
        $this->edit_name='';
        $this->dispatchBrowserEvent('success');

    }


    public function deletePosition($id)
    {
        $this->delete_id=$id;
        $this->dispatchBrowserEvent('confirm-delete');
    }

    protected $listeners=[
        'yes' => 'confirmDelete',
    ];

    public function confirmDelete()
    {
        PositionModel::find($this->delete_id)->delete();
        $this->delete_id='';
        $this->dispatchBrowserEvent('success');
    }
}