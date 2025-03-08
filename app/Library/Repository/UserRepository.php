<?php
namespace App\Library\Repository;

use App\Library\Objects\UserObject;
use App\Library\Repository\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    private User $user;

    public function register(UserObject $user): User
    {
        DB::transaction(function() use($user){
            $this->user = User::create($user->toArray());
        });
        return $this->user;
    }
}
