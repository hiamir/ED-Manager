<?php

namespace App\Http\Livewire\Admin\Administrators;

use App\Http\Livewire\Authenticate;
use App\Mail\ResetPassword;
use App\Mail\Welcome;
use App\Models\Admin;
use App\Models\Administrator;
use App\Traits\Data;
use App\Traits\Query;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rules;

class Datatable extends Authenticate
{
    use WithPagination;
    use Data;
    use Query;

    public
        $header = null,
        $modalType = null,
        $modalSize = 'medium',
        $openModal = false,
        $confirmModalStatus = true,
        $record,
        $rolePermissions,
        $allRolePermissions,
        $permissions,
        $adminID,
        $admin = ['name' => '', 'email' => ''];


    protected $messages = [
        'admin.name.required' => 'The Name cannot be empty.',
        'admin.name.string' => ':attribute must be a string.',
        'admin.name.min' => 'The Name must have minimum 4 characters.',
        'admin.name.max' => ':attribute cannot exceed more than 255 characters.',
        'admin.email.required' => 'The Email Address cannot be empty.',
        'admin.email.string' => ':attribute Email must be a string.',
        'admin.email.max' => ':attribute cannot exceed more than 255 characters.',
        'admin.email.email' => ':attribute is not a valid email Address.',
        'admin.email.unique' => ':attribute Email Address already exists!.',
        'admin.password.required' => 'The Password cannot be empty.',
        'admin.password.confirmed' => 'The two Password do not match.',
    ];

    public function addButton()
    {
        $this->reset();
        $this->modalType = 'add';
        $this->modalSize = 'medium';
        $this->header = "Add Administrator";
        $this->record = new Admin();

    }


    public function editButton($id)
    {
        $this->resetErrorBag();
        $this->modalType = 'update';
        $this->modalSize = 'medium';
        $this->header = "Update Administrator";
        $this->adminID = $id;
        $this->record = Admin::where('id', $id)->first();
        $this->admin['id'] = $this->record->id;
        $this->admin['name'] = $this->record->name;
        $this->admin['email'] = $this->record->email;
    }

    public function deleteButton($id)
    {
        $this->modalType = 'delete';
        $this->header = "Delete Administrator";
        $this->adminID = $id;
        $this->record = Admin::where('id', $id)->first();
    }

    public function passwordButton($id)
    {
        $this->modalType = 'reset_password';
        $this->header = "Reset password";
        $this->adminID = $id;
        $this->record = Admin::where('id', $id)->first();
    }


    public function submit()
    {

        switch ($this->modalType) {
            case 'add':
            case 'update':
                $this->validate();
                $this->record->name = Data::capitalize_each_word($this->admin['name']);
                $this->record->email = Data::all_lower_case($this->admin['email']);
                if($this->modalType =='add'){
                    $password=Data::generate_password();
                    $this->record->password = Hash::make($password);
                    $this->record->save();
                    $this->record->assignRole('admin');
                    Mail::to($this->record->email)->send(new Welcome($this->record->name, $this->record->email, $password));
                }else{
                    $this->record->save();
                }
                $this->openModal = false;
                ($this->modalType == 'add') ? $this->toastAlert = ['show'=>true,'alert' => 'success', 'message' => $this->record->name . ' added successfully!'] : $this->toastAlert = ['show'=>true,'alert' => 'success', 'message' => $this->record->name . ' updated successfully!'];
                break;

            case 'delete':
                $this->record->delete();
                $this->confirmModalStatus = !$this->confirmModalStatus;
                $this->toastAlert = ['show'=>true,'alert' => 'danger', 'message' => $this->record->name . ' deleted successfully!'];
                break;

            case 'reset_password':
                $password = Data::generate_password();
                $this->record->password = Hash::make($password);
                $this->record->save();
                Mail::to($this->record->email)->send(new ResetPassword($this->record->name, $this->record->email, $password));
                $this->confirmModalStatus = !$this->confirmModalStatus;
                $this->toastAlert = ['show'=>true,'alert' => 'success', 'message' => 'Password was rest for ' . $this->record->name];
                break;

        }

    }

    public function render()
    {
        $records = Admin::paginate(10);
        return view('livewire.admin.administrators.datatable', ['records' => $records]);


    }

    protected function rules()
    {
        return [
            'admin.name' => 'required|min:4',
            'admin.email' => 'required|email|unique:admins,email,' . $this->adminID,
//            'admin.password' => 'required', 'confirmed',Password::defaults()
        ];
    }

    protected function validationAttributes()
    {
        return [
            'admin.name' => $this->admin['name'],
            'admin.email' => $this->admin['email'],
        ];
    }

}
