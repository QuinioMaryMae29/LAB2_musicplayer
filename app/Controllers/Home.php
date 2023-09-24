<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function test()
    {
        echo 'hello';
    }
    
    public function index(): string
    {
        return view('welcome_message');
    }
}