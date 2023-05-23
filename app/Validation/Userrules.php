<?php

namespace App\Validation;
// import class objek model
use App\Models\UsersModels;

class Userrules
{
    // public function custom_rule(): bool
    // {
    //     return true;
    // }

    // aturan khusus yang memeriksa apakah pengguna valid atau tidak valid pada saat login multi users
    public function validateUser(string $str, string $fields, array $data)
    {
        $model = new UsersModels();
        $user = $model->where('u_username', $data['u_username'])->first();

        if (!$user) {
            return false;
        }

        return password_verify($data['u_password'], $user['u_password']);
    }
}
