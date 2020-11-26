<?php
namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function updateRole($id)
    {
        $user = $this->model->find($id);

        if ($user->role == config('user.customer')) {
            $user->update(['role' => config('user.admin')]);

            return true;
        } else {
            $user->update(['role' => config('user.customer')]);

            return true;
        }

        return false;
    }

    public function getUserByAdmin()
    {
        $result = $this->model->where('role', config('user.admin'))->get();

        return $result;
    }
}
