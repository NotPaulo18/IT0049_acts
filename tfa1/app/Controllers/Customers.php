<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Customer Accounts',

            'customers' => [
                [
                    'full_name' => 'Juan Dela Cruz',
                    'email'     => 'juan@example.com',
                    'phone'     => '0917-123-4567',
                ],
                [
                    'full_name' => 'Maria Santos',
                    'email'     => 'maria@example.com',
                    'phone'     => '0918-234-5678',
                ],
                [
                    'full_name' => 'Pedro Reyes',
                    'email'     => 'pedro@example.com',
                    'phone'     => '0919-345-6789',
                ],
                [
                    'full_name' => 'Angela Garcia',
                    'email'     => 'angela@example.com',
                    'phone'     => '0920-456-7890',
                ],
                [
                    'full_name' => 'Miguel Mendoza',
                    'email'     => 'miguel@example.com',
                    'phone'     => '0921-567-8901',
                ],
            ],
        ];

        return view('templates/header', $data)
            . view('customers/index', $data)
            . view('templates/footer');
    }
}