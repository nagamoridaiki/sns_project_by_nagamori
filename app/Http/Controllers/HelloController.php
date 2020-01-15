<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(){
        return '<html>
        <body>
        <h1>
        Controller
        </h1>

        <p>
        this is App/Http/controller page.
        </p>
        </body> 
    </html>';




    }
    
}
