<?php

//The MIT License (MIT)
//
//Copyright (c) 2016 dev-lazarev.com
//
//Permission is hereby granted, free of charge, to any person obtaining a copy
//of this software and associated documentation files (the "Software"), to deal
//in the Software without restriction, including without limitation the rights
//to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
//copies of the Software, and to permit persons to whom the Software is
//furnished to do so, subject to the following conditions:
//
//The above copyright notice and this permission notice shall be included in all
//copies or substantial portions of the Software.
//
//THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
//IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
//FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
//AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
//LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
//OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
//SOFTWARE.

namespace devLazarev\lolapi\methods;

class Status extends Requester
{
    protected $version = '1.0';
    protected $url = 'http://status.leagueoflegends.com/';

    /**
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/908/3143
     */
    public function getShards()
    {
        $data = "shards";
        $url = $this->getUrl('', $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }

    /**
     * @param $region
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/908/3142
     */
    public function getShardsForRegion($region)
    {
        $region = strtolower($region);
        $data = "shards/{$region}";
        $url = $this->getUrl('', $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }
}