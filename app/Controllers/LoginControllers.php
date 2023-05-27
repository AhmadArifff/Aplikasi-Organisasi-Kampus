<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModels;

class LoginControllers extends BaseController
{
    public function index()
    {
        if (session()->get('u_role') == "superadmin") {
            return redirect()->to('superadmin/dashboard');
        } else if (session()->get('u_role') == "mahasiswa") {
            return redirect()->to('mahasiswa/dashboard');
        } else if (session()->get('u_role') == "admin") {
            return redirect()->to('admin/dashboard');
        }
        return view('login');
    }

    public function login()
    {
        $db = \Config\Database::connect();
        $post = $this->request->getPost();
        $query = $db->table('tb_user')->getWhere(['u_npm' => $post['u_npm']]);
        $users = $query->getRow();
        if ($users) {
            if (password_verify($post['u_password'], $users->u_password)) {
                $model = new UsersModels();

                $user = $model->where('u_npm', $this->request->getVar('u_npm'))->first();
                // Stroing session values
                $this->setUserSession($user);

                // Redirecting to dashboard after login
                if ($user['u_role'] == "SuperAdmin") {
                    return redirect()->to(base_url('SuperAdmin/dashboard'));
                } else if ($user['u_role'] == "AdminLK/OK") {
                    return redirect()->to(base_url('AdminLK-OK/dashboard'));
                } else if ($user['u_role'] == "Mahasiswa") {
                    return redirect()->to(base_url('Mahasiswa/dashboard'));
                }
            } else {
                return redirect()->back()->with('error', 'Password tidak ditemukan!');
            }
        } else {
            return redirect()->back()->with('error', 'NPM tidak ditemukan!');
        }
    }
    private function setUserSession($user)
    {
        $data = [
            'u_id' => $user['u_id'],
            'u_nama' => $user['u_nama'],
            'u_npm' => $user['u_npm'],
            'isLoggedIn' => true,
            "u_role" => $user['u_role'],
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
