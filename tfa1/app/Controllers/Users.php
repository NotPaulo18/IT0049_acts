<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'User Accounts',

            'users' => [
                [
                    'username'  => 'admin01',
                    'full_name' => 'Paulo Cruz',
                    'role'      => 'Administrator',
                ],
                [
                    'username'  => 'cashier01',
                    'full_name' => 'Anna Reyes',
                    'role'      => 'Cashier',
                ],
                [
                    'username'  => 'cashier02',
                    'full_name' => 'Mark Santos',
                    'role'      => 'Cashier',
                ],
                [
                    'username'  => 'manager01',
                    'full_name' => 'Carlo Garcia',
                    'role'      => 'Manager',
                ],
                [
                    'username'  => 'staff01',
                    'full_name' => 'Jenny Mendoza',
                    'role'      => 'Staff',
                ],
            ],
        ];

        return view('templates/header', $data)
            . view('users/index', $data)
            . view('templates/footer');
    }
}