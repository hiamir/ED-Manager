<?php

namespace App\Http\Livewire\Admin\Permissions;

use App\Http\Livewire\Authenticate;
use App\Traits\Data;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Datatable extends Authenticate
{
    use WithPagination;
    use Data;

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
        $permissionID,
        $permission = ['name' => '', 'guard_name' => ''];
    protected $messages = [

        'permission.name.required' => 'Permission name is required.',
        'permission.name.regex' => ':attribute - only lower case alphabets and "-" allowed with no spaces',
        'permission.name.min' => ':attribute must be at-least 4 letters long.',
        'permission.name.unique' => ':attribute permission already exists!.',
        'permission.guard_name.required' => 'Guard name is required.',
        'permission.guard_name.min' => ':attribute must be at-least 4 letters long.',
    ];

    public function addButton()
    {
        $this->reset();
        $this->modalType = 'add';
        $this->modalSize='medium';
        $this->header="Add Permission";
        $this->record = new Permission();

    }


    public function editButton($id)
    {
        $this->resetErrorBag();
        $this->modalType = 'update';
        $this->modalSize='medium';
        $this->header="Update Permission";
        $this->permissionID = $id;
        $this->record = Permission::where('id', $id)->first();
        $this->permission['id'] = $this->record->id;
        $this->permission['name'] = $this->record->name;
        $this->permission['guard_name'] = $this->record->guard_name;
    }

    public function deleteButton($id)
    {
        $this->modalType = 'delete';
        $this->header="Delete Permission";
        $this->permissionID = $id;
        $this->record = Permission::where('id', $id)->first();
    }




    public function submit()
    {
        switch ($this->modalType) {
            case 'add':
            case 'update':
                $this->validate();
                $this->record->name = Data::all_lower_case($this->permission['name']);
                $this->record->guard_name = $this->permission['guard_name'];
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
        $records = Permission::paginate(10);
        return view('livewire.admin.permissions.datatable', ['records' => $records]);


    }

    protected function rules()
    {
        return [
            'permission.name' => 'required|regex:/^[a-z-]+$/u|min:4|unique:permissions,name,' . $this->permissionID,
            'permission.guard_name' => 'required|min:3',
        ];
    }

    protected function validationAttributes()
    {
        return [
            'permission.name' => $this->permission['name'],
            'permission.guard_name' => $this->permission['guard_name'],
        ];
    }
}
