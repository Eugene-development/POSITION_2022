<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\TestJob;

class TestJobController extends Controller
{
    public function testMethod() {
        // return 'qwe';
        TestJob::dispatch()->onQueue('i2');
    }
}
