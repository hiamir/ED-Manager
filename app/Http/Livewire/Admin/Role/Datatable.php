<?php

namespace App\Http\Livewire\Admin\Role;

use App\Http\Livewire\Authenticate;
use App\Traits\Data;
use App\Traits\Query;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Datatable extends Authenticate
{
    use WithPagination;
    use Data;
    use Query;

    public
        $header=null,
        $modalType = null,
        $modalSize = 'medium',
        $openModal = false,
        $confirmModalStatus = true,
        $record,
        $rolePermissions,
        $allRolePermissions,
        $permissions,
        $roleID,
        $role = ['name' => '', 'guard_name' => ''];


    protected $messages = [
        'role.name.required' => 'Role name is required.',
        'role.name.regex' => ':attribute - only lower case alphabets allowed with no spaces',
        'role.name.min' => ':attribute must be at-least 4 letters long.',
        'role.name.unique' => ':attribute role already exists!.',
        'role.guard_name.required' => 'Guard name is required.',
        'role.guard_name.min' => ':attribute must be at-least 4 letters long.',
    ];

    public function addButton()
    {
        $this->reset();
        $this->modalType = 'add';
        $this->modalSize='medium';
        $this->header="Add Role";
        $this->record = new Role();

    }


    public function editButton($id)
    {
        $this->resetErrorBag();
        $this->modalType = 'update';
        $this->modalSize='medium';
        $this->header="Update Role";
        $this->roleID = $id;
        $this->record = Role::where('id', $id)->first();
        $this->role['id'] = $this->record->id;
        $this->role['name'] = $this->record->name;
        $this->role['guard_name'] = $this->record->guard_name;
    }

    public function deleteButton($id)
    {
        $this->modalType = 'delete';
        $this->header="Delete Role";
        $this->roleID = $id;
        $this->record = Role::where('id', $id)->first();
    }



    public function permissionButton($id)
    {
        $this->roleID = $id;
        $role=Query::role($this->roleID);
        $this->allRolePermissions=$role->permissions->pluck('id')->toArray();
        $this->modalType = 'permission';
        $this->modalSize='xlarge';
        $this->header=Data::capitalize_first_word($role->name).' permissions';
        switch($role->guard_name){
            case 'admin':
            case 'web':
                $this->permissions=Permission::where('guard_name',$role->guard_name)->get();
                break;
        }



//        $this->permissionID = $id;
//        $this->record = Permission::where('id', $id)->first();
    }

    public function permissionToggle($id){
        $role=Query::role($this->roleID);
        $role->permissions()->sync(json_decode($this->rolePermissions));
    }


    public function submit()
    {

        switch ($this->modalType) {
            case 'add':
            case 'update':
                $this->validate();
                $this->record->name = Data::all_lower_case($this->role['name']);
                $this->record->guard_name = $this->role['guard_name'];
                $this->record->save();
                $this->openModal = false;
                ($this->modalType=='add')? $this->toastAlert=['show'=>true,'alert'=>'success','message'=>$this->record->name.' added successfully!'] :  $this->toastAlert=['alert'=>'success','message'=>$this->record->name.' updated successfully!'];
                break;

            case 'delete':
                $this->record->delete();
                $this->confirmModalStatus = !$this->confirmModalStatus;
                $this->toastAlert=['show'=>true,'alert'=>'danger','message'=>$this->record->name.' deleted successfully!'];
                break;

        }

    }

    public function render()
    {
        $records = Role::paginate(2);
        return view('livewire.admin.role.datatable', ['records' => $records]);


    }

    protected function rules()
    {
        return [
            'role.name' => 'required|regex:/^[a-z]+$/u|min:4|unique:roles,name,' . $this->roleID,
            'role.guard_name' => 'required|min:3',
        ];
    }

    protected function validationAttributes()
    {
        return [
            'role.name' => $this->role['name'],
            'role.guard_name' => $this->role['guard_name'],
        ];
    }
}
