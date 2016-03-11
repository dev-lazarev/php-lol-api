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

class League extends Requester
{
    protected $version = '2.5';

    /**
     * @return array
     */
    protected function getResponseCodes()
    {
        $responseCodes = parent::getResponseCodes();
        $responseCodes[404] = 'League not found';
        return $responseCodes;
    }

    /**
     * @param $region
     * @param array $summonerIds
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/985/3351
     */
    public function getByIds($region, array $summonerIds)
    {
        $ids = implode(',', $summonerIds);
        $data = "league/by-summoner/{$ids}";
        $url = $this->getUrl($region, $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }

    /**
     * @param $region
     * @param array $summonerIds
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/985/3352
     */
    public function getTeamByIds($region, array $teamIds)
    {
        $ids = implode(',', $teamIds);
        $data = "league/by-team/{$ids}";
        $url = $this->getUrl($region, $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }

    /**
     * @param $region
     * @param array $summonerIds
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/985/3356
     */
    public function getByIdEntry($region, array $summonerIds)
    {
        $ids = implode(',', $summonerIds);
        $data = "league/by-summoner/{$ids}/entry";
        $url = $this->getUrl($region, $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }

    /**
     * @param $region
     * @param array $summonerIds
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/985/3355
     */
    public function getTeamByIdEntry($region, array $summonerIds)
    {
        $ids = implode(',', $summonerIds);
        $data = "league/by-team/{$ids}/entry";
        $url = $this->getUrl($region, $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }

    /**
     * @param $region
     * @param string $type
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/985/3353
     */
    public function getChallenger($region, $type = 'RANKED_SOLO_5x5')
    {
        $data = "league/challenger?type={$type}";
        $url = $this->getUrl($region, $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }

    /**
     * @param $region
     * @param string $type
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/985/3354
     */
    public function getMaster($region, $type = 'RANKED_SOLO_5x5')
    {
        $data = "league/master?type={$type}";
        $url = $this->getUrl($region, $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }
}