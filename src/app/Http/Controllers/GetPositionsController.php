<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetPositionsController extends Controller
{
    public function get()
    {
        $get_data = file_get_contents('https://api.megaindex.ru/scan_yandex_position?user=indexpro24@gmail.com&password=megaINDEX2022!&lr=47&results=150&request=ремонт квартир в Дзержинске&show_title=1');
        return $get_data;
    }
}
