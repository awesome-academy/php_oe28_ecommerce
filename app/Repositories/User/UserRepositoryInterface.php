<?php
namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function updateRole($id);

    public function getUserByAdmin();
}
