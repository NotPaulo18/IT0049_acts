<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'heading' => 'Welcome to My Website',
            'message' => 'This is the Home page of my CodeIgniter 4 website.',
        ];

        return view('templates/header', $data)
            . view('home', $data)
            . view('templates/footer');
    }

    public function about()
    {
        $data = [
            'title' => 'About',
            'heading' => 'About This Website',
            'message' => 'This website demonstrates how routes, controllers, and views work together.',
        ];

        return view('templates/header', $data)
            . view('about', $data)
            . view('templates/footer');
    }
}