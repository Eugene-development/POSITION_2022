<?php

namespace App\Http\Controllers;

use App\Models\Position;

use Illuminate\Http\Request;

use App\Jobs\TestSetJob;


class setPositionsController extends Controller
{

    public function __construct()
    {
    }

    public function set(Request $request)
    {
        TestSetJob::dispatch()->onQueue('set_1');
    }
}
