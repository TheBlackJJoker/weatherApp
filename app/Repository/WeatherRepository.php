<?php

declare(scrict_types=1);

namespace App\Repository;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Str;


class WeatherRepository{

    private Request $request;
    public function __construct(Request $request){
        $this->request = $request;
    }


    public function get(): ?object{
        $content = null;
        if($this->request->city){
            $client = new Client();
            $search = Str::slug($this->request->city, '-');
            $response = $client->request("GET", "https://wttr.in/".$this->request->city."?lang=pl&format=j1");
            $content = json_decode($response->getBody()->getContents(), false);
        }

        return $content;
    }

}
