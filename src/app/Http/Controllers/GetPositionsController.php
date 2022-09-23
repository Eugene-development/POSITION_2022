<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class GetPositionsController extends Controller
{
    public function get()
    {
        $url = 'https://api.megaindex.ru/scan_yandex_position?user=indexpro24@gmail.com&password=megaINDEX2022!&lr=47&results=150&request=ремонт квартир в Дзержинске&show_title=1';
        // $get_data = file_get_contents('https://api.megaindex.ru/scan_yandex_position?user=indexpro24@gmail.com&password=megaINDEX2022!&lr=47&results=150&request=ремонт квартир в Дзержинске&show_title=1');

        // $data_positions = $get_data->toArray;

        // return $data_positions;

        $client = new \GuzzleHttp\Client();
        $res = $client->get($url);
        $content = (string) $res->getBody();
        // dd($content);
        $a = json_decode($content);
        // dd($a);

        $b = $a->data;
        // dd($b);

        $first = Arr::first($b, function ($value, $key) {
            return $value->domain == 'novostroy.org';
        });
        dd($first->position);
        // dd($first->domain);

        // $c = Arr::exists($b, 0);
        // $obj = (object) $b;
        // $object = collect($obj);

        // dd(($object->flatten(2))->values()->all());



        // $a = $content->toJson();
        // $a = collect($content);
        // $b = $a->find('data');
        // return $a;
    }
}
