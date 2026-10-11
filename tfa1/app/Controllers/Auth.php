<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        // Already logged-in users do not need the login page.
        if (session()->get('isLoggedIn')) {
            return redirect()->to(site_url('customers'));
        }

        return view('auth/login', [
            'title' => 'POS Login',
        ]);
    }

    public function attempt()
    {
        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter your username.',
                ],
            ],

            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter your password.',
                ],
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');

        $userModel = new UserModel();

        $user = $userModel
            ->where('username', $username)
            ->first();

        if (! $user || ! password_verify($password, $user['password'])) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid username or password.');
        }

        // Create a new session ID after successful authentication.
        session()->regenerate(true);

        session()->set([
            'isLoggedIn' => true,
            'user_id'    => $user['id'],
            'username'   => $user['username'],
            'full_name'  => $user['full_name'],
        ]);

        return redirect()->to(site_url('customers'))
            ->with('success', 'Login successful. Welcome, ' . $user['full_name'] . '!');
    }

    public function logout()
    {
    session()->destroy();

    return view('auth/logout', [
        'title' => 'Logout Successful',
    ]);
    }
}