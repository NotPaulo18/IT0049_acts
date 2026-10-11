<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function about()
    {
        $data = [
            'title'     => 'About',
            'developer' => 'Paulo Delas Armas',
            'section'   => 'TW34',
        ];

        return view('templates/header', $data)
            . view('pages/about', $data)
            . view('templates/footer');
    }
}