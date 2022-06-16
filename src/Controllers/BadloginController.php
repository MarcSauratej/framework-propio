<?php

    namespace App\Controllers;

    use App\Controller;
    require('src/helpers.php');


    class BadLoginController extends Controller {
        
        function index () {
            return view ('badlogin');
        }
    }