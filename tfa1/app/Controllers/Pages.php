<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function home()
    {
        $data = [
            'title' => 'Home',
        ];

        return view('templates/header', $data)
            . view('pages/home')
            . view('templates/footer');
    }

    public function about()
    {
        $data = [
            'title' => 'About',
        ];

        return view('templates/header', $data)
            . view('pages/about')
            . view('templates/footer');
    }
}