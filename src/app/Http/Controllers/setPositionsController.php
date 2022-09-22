<?php

namespace App\Http\Controllers;

use App\Models\Position;

use Illuminate\Http\Request;

class setPositionsController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function set(Request $request)
    {
        $data = [
            'key' => 1,
            'value' => 7,
        ];
        return Position::create($data);
    }
}
