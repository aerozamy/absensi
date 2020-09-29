<?php 

namespace App\Controllers;

Class Auth extends BaseController
{
    public function index()
    {
        return view('contents/login');
    }

    public function register()
    {
        return view('contents/register');    
    }
}

?>
