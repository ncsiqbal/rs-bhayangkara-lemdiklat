<?php

namespace App\Controllers;

use App\Models\User;

class AdminAuth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }

        return view('admin/login', [
            'title' => 'Admin Login',
        ]);
    }

    public function authenticate()
    {
        $email = trim($this->request->getPost('email'));
        $password = $this->request->getPost('password');

        if (empty($email) || empty($password)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Email dan password wajib diisi.');
        }

        $userModel = new User();

        $user = $userModel
            ->where('email', $email)
            ->where('role', 'admin')
            ->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Email atau password salah.');
        }

        session()->regenerate();

        session()->set([
            'user_id' => $user['id'],
            'user_name' => $user['name'],
            'user_email' => $user['email'],
            'user_role' => $user['role'],
            'isLoggedIn' => true,
        ]);

        return redirect()->to('/admin/dashboard');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()
            ->to('/admin/login')
            ->with('success', 'Anda berhasil logout.');
    }
}