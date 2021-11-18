<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
class Users extends Component
{
    public $create_user_name;
    public $create_email;
    public $create_password;
    public $create_role='';

    public $roles = ['admin','employee'];
    public $searchQuery = '';
  
    public $edit_user_name;
    public $edit_email;
    public $edit_password;
    public $edit_role='';
    
    public $user_id;

    public $edit = false;
    public $add = false;


    protected $listeners = ['yes' => 'confirmed'];


    
    use WithPagination;
    public function render()
    {
        return view('livewire.admin.users',[
            'users'=>User::where('role','employee')
            ->where('name','like','%'.$this->searchQuery.'%')
            ->paginate(10),
        ]);
    }



      public function create(){

        $this->validate([
            'create_user_name' => 'required|min:3',
            'create_email' => 'required|email',
            'create_password' => 'required|min:6',
            'create_role' => 'required'
        ]);

        try {
           User::create([
            'name' => $this->create_user_name,
            'email' => $this->create_email,
            'password' => bcrypt($this->create_password),
            'role' => $this->roles[$this->create_role],
            ]);
        } catch (\Throwable $th) {
        }

        
        $this->create_user_name = '';
        $this->create_email = '';
        $this->create_password = '';
        $this->create_role = '';
        $this->add=false;
        $this->dispatchBrowserEvent('success');

    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        $this->edit_user_name = $user->name;
        $this->edit_email = $user->email;
        $this->edit_role = $user->role == 'admin' ? '0' : '1';  
        $this->user_id = $id;
       $this->edit=true;
    }

    public function updateUser()
    {
        $this->validate([
            'edit_user_name' => 'required|min:3',
            'edit_email' => 'required|email',
            'edit_role' => 'required',
            'edit_password'=>'nullable|min:6',
        ]);

        $user = User::where('id',$this->user_id)->first();
        if ($this->edit_password) {
           $user->update([
            'name' => $this->edit_user_name,
            'email' => $this->edit_email,
            'password' => bcrypt($this->edit_password),
            'role' => $this->roles[$this->edit_role],
            ]);
        }else{
            $user->update([
                'name' => $this->edit_user_name,
                'email' => $this->edit_email,
                'role' => $this->roles[$this->edit_role],
            ]);
        }

        $this->edit_user_name = '';
        $this->edit_email = '';
        $this->edit_password = '';
        $this->edit_role = '';
        $this->edit = false;
        $this->dispatchBrowserEvent('success');
    }

    public function deleteUser($id)
    {
        $this->user_id = $id;
        $this->dispatchBrowserEvent('confirm-delete');
    }

    public function confirmed()
    {
        $user = User::where('id',$this->user_id)->first();
        $user->delete();
        $this->dispatchBrowserEvent('success');
    }

    public function setHR($id)
    {
      
        $oldHR = User::where('is_hr',1)->first();
        if ($oldHR) {
            $oldHR->update([
                'is_hr' => 0,
            ]);
        }
            # code...
        $user = User::where('id',$id)->first();
        $user->update([
            'is_hr' => 1,
        ]);

        $this->dispatchBrowserEvent('success');
     

    }
}