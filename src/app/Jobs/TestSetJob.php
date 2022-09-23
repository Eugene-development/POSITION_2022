<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;


use App\Models\Position;

class TestSetJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {


        $domain = "novostroy.org";
        $query = 'ремонт квартир в Дзержинске';
        $url = "https://api.megaindex.ru/scan_yandex_position?user=indexpro24@gmail.com&password=megaINDEX2022!&lr=47&results=150&request=" . $query . "&show_title=1";
        $getData = file_get_contents($url);
        $jsonData = json_decode($getData);
        $allPositions = $jsonData->data;
        $first = Arr::first($allPositions, function ($value, $key) {
            return $value->domain == $this->domain;
        });


        $data = [
            'key' => 1,
            'value' => $first->position,
        ];
        Position::create($data);
    }
}
