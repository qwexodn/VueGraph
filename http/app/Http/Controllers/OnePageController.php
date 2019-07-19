<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnePageController extends Controller
{
    //

    function __invoke(){
        echo view('onepage');
    }

    function phpinfo(){
        echo phpinfo();
    }
}
