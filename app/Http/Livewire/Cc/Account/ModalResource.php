<?php

namespace App\Http\Livewire\Cc\Account;

use App\Models\User;
use Livewire\Component;
use App\Models\RaP\Role;
use Livewire\WithFileUploads;
use Laravolt\Avatar\Facade as Avatar;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ModalResource extends Component
{
    use LivewireAlert, WithFileUploads;

    public $roles = [];
    public $user_id, $user_role, $user_name, $user_username, $user_email, $user_password, $user_re_password, $user_evangelism_outpost;

    protected $listeners = [
        'set_account' => 'set_account',
        'reset_account' => 'reset_account',
        'set_account_field' => 'set_account_field',
        'ask_to_change_status_account' => 'ask_to_change_status_account',
        'change_status_account' => 'change_status_account',
    ];

    function rules() {
        return [
            'user_role' => 'required|string',
            'user_name' => 'required|string',
            'user_username' => 'required|string|'.($this->user_id ? 'unique:users,username,'.$this->user_id : 'unique:users,username'),
            'user_email' => 'required|email|'.($this->user_id ? 'unique:users,email,'.$this->user_id : 'unique:users,email'),
            'user_password' => 'required|min:8',
            'user_re_password' => 'required|min:8|same:user_password',
        ];
    }

    protected $validationAttributes = [
        'user_role' => 'Peran',
        'user_name' => 'Nama',
        'user_username' => 'Username',
        'user_email' => 'Email',
        'user_password' => 'Password',
        'user_re_password' => 'Konfirmasi Password',
    ];

    public function hydrate()
    {
        $this->dispatchBrowserEvent('render-select2');
    }

    public function set_account_field($field, $value)
    {
        $this->$field = $value;
    }

    public function set_account($user_id)
    {
        $this->reset(['user_id', 'user_role', 'user_name', 'user_username', 'user_email', 'user_password', 'user_re_password']);
        $this->user_id = $user_id;

        $user = User::findOrFail($this->user_id);

        $this->emitSelf('set_account_field', 'user_role', $user->getRoleNames()->first());
        $this->user_name = $user->name;
        $this->user_username = $user->username;
        $this->user_email = $user->email;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        if(is_null($this->user_id)) {
            $this->validate();

            $avatar = md5($this->user_name);
            Avatar::create($this->user_name)->save(storage_path('app/src/img/user/'.$avatar.'.png'), $quality = 100);

            $user = User::create([
                'name' => $this->user_name,
                'username' => $this->user_username,
                'email' => $this->user_email,
                'password' => bcrypt($this->user_password),
                'avatar' => $avatar.'.png',
                'account_status' => 1,
            ]);

            $user->assignRole($this->user_role);
        } else {
            $this->validateOnly($this->user_role);

            $user = User::findOrFail($this->user_id);

            $user->update([
                'name' => $this->user_name,
                'username' => $this->user_username,
                'email' => $this->user_email,
            ]);

            $user->syncRoles($this->user_role);

            if($this->user_password){
                $user->update([
                    'password' => bcrypt($this->user_password),
                ]);
            }
        }

        $this->emit('close_modal_resource');

        $this->alert('success', '', [
            'text' => 'Berhasil '.(is_null($this->user_id) ? 'menambah' : 'mengubah').' Akun',
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->reset(['user_id', 'user_role', 'user_name', 'user_username', 'user_email', 'user_password', 'user_re_password']);
    }

    public function ask_to_change_status_account($user_id)
    {
        $this->user_id = $user_id;
        $user = User::find($this->user_id);
        $this->alert('question', 'Peringatan', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'text' => 'Perintah ini akan mengubah status akun '.$user->name.' menjadi '.($user->account_status == 1 ? 'Tidak Aktif' : 'Aktif').', Anda yakin ingin melanjutkan?',
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Lanjutkan',
            'cancelButtonText' => 'Batalkan',
            'onConfirmed' => 'change_status_account'
        ]);
    }

    public function change_status_account()
    {
        $user = User::find($this->user_id);

        if($user) {
            $user->update([
                'account_status' => ($user->account_status == 1 ? 0 : 1)
            ]);

            $this->emit('account_table_reload');

            $this->alert('success', '', [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
                'text' => 'Berhasil mengubah status akun',
            ]);

            $this->reset(['user_id', 'user_role', 'user_name', 'user_username', 'user_email', 'user_password', 'user_re_password']);
        }
    }

    public function mount()
    {
        $this->roles = Role::orderBy('name')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.cc.account.modal-resource');
    }
}
