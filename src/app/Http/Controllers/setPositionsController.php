<?php

namespace App\Http\Controllers;

use App\Models\Position;

use Illuminate\Http\Request;

use App\Jobs\TestSetJob;


class setPositionsController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function set(Request $request)
    {

        TestSetJob::dispatch()->onQueue('set_1');
        // $data = [
        //     'key' => 1,
        //     'value' => 7,
        // ];
        // return Position::create($data);
    }
}
