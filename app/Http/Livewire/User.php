<?php

namespace App\Http\Livewire;

use App\Models\User as ModelsUser;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public $rows_number = 10;
    public $search;
    public $branch_id = null;
    public $user_status = null;
    public $user_type = null;
    public $filters = [];

    public function getUsers()
    {
        $this->user_status == 'all' ? $this->user_status = null : null;
        $this->user_type == 'all' ? $this->user_type = null : null;
        $this->branch_id == 'all' ? $this->branch_id = null : null;

        $this->filters['search'] = $this->search;
        $this->filters['user_type'] = $this->user_type;
        $this->filters['user_status'] = $this->user_status;
        $this->filters['branch_id'] = $this->branch_id;

        return ModelsUser::data()->whereNot('user_type', 'superadmin')->filters($this->filters)->paginate($this->rows_number);
    }

    public function changeUserStatus($user_id)
    {
        $user = ModelsUser::find($user_id);

        $branches = $user->branches->count();
        if (!$branches) {
            $this->alert('success', '😰😰😰', [
                'toast' => true,
                'position' => 'center',
                'timer' => 6000,
                'text' => ' لا يمكن تنشيط المستخدم، لانه ليس لديه صلاحيات او فروع',
                'timerProgressBar' => true,
            ]);
            return false;
        }

        if ($user) {
            if ($user->user_status == 'active') {
                $user->update(['user_status' => 'inactive']);
                $this->alert('warning', '😰😰😰', [
                    'toast' => true,
                    'position' => 'center',
                    'timer' => 6000,
                    'text' => ' تم الغاء تنشيط المستخدم',
                    'timerProgressBar' => true,
                ]);
            } else {
                $user->update(['user_status' => 'active']);
                $this->alert('success', '', [
                    'toast' => true,
                    'position' => 'center',
                    'timer' => 6000,
                    'text' => ' تم تنشيط المستخدم بنجاح',
                    'timerProgressBar' => true,
                ]);
            }
        }
    }


    public function render()
    {
        $users = $this->getUsers();

        if ($users->count() < 8) {
            $this->resetPage();
        }
        return view('livewire.user', [
            'users' => $users
        ]);
    }
}
