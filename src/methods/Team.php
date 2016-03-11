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

class Team extends Requester
{
    protected $version = '2.4';

    /**
     * @return array
     */
    protected function getResponseCodes()
    {
        $responseCodes = parent::getResponseCodes();
        $responseCodes[404] = 'Team not found';
        return $responseCodes;
    }

    /**
     * @param $region
     * @param array $summonerIds
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/986/3358
     */
    public function getBySummonerIds($region, array $summonerIds)
    {
        $summonerIds = implode($summonerIds, ',');
        $data = "team/by-summoner/{$summonerIds}";
        $url = $this->getUrl($region, $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }

    /**
     * @param $region
     * @param array $teamIds
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/986/3357
     */
    public function getByIds($region, array $teamIds)
    {
        $teamIds = implode($teamIds, ',');
        $data = "team/{$teamIds}";
        $url = $this->getUrl($region, $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }
}