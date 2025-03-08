<?php
namespace App\Library\Repository\Interfaces;

use App\Library\Objects\UserObject;
use App\Models\User;

interface UserRepositoryInterface
{
    public function register(UserObject $user): User;
}