<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Seoquery;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class GetPositionsController extends Controller
{
    public function get()
    {
        $key = "1";
        $seoqueries = Seoquery::where('key', $key)->get();
        // dd($seoqueries);
        $api = "https://api.megaindex.ru";
        $scanPosition = "scan_yandex_position";
        $user = "indexpro24@gmail.com";
        $pass = "megaINDEX2022!";
        $domain = "xn----7sbc2ahzelejid.xn--p1ai";
        // $domain = "orbita-stroy.com";
        // $domain = "novostroy.org";
        // $region = 47; //Нижний Новгород
        $region = "972"; //Дзержинск
        $depth = "150";

        foreach ($seoqueries as $item) {
            $query = $item->value;
            $url = "" . $api . "/" . $scanPosition . "?user=" . $user . "&password=" . $pass . "&lr=" . $region . "&results=" . $depth . "&request=" . $query . "&show_title=1";
            $getData = file_get_contents($url);
            $jsonData = json_decode($getData);
            $allPositions = $jsonData->data;

            $first = Arr::first($allPositions, function ($value, $key) use ($domain) {
                return $value->domain == $domain;
            });

            $data = [
                'key' => 1,
                'parentable_type' => 'seoquery',
                'parentable_id' => $item->id,
                'value' => $first ? $first->position : 151
            ];

            Position::create($data);
        }
    }
}
