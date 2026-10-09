<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function home()
    {
        $data = [
            'title'   => 'Home',
            'heading' => 'Simple POS System',
            'message' => 'Welcome to our database-driven Point-of-Sale system.',
        ];

        return view('templates/header', $data)
            . view('pages/home', $data)
            . view('templates/footer');
    }

    public function about()
    {
        $data = [
            'title'   => 'About',
            'heading' => 'About the POS System',
            'message' => 'The Customer Accounts and User Accounts pages retrieve records from a MySQL database using CodeIgniter 4 models.',
        ];

        return view('templates/header', $data)
            . view('pages/about', $data)
            . view('templates/footer');
    }
}