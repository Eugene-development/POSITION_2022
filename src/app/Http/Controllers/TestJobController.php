<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestJobController extends Controller
{
    public function testMethod() {
        return dd('345');
    }
}
