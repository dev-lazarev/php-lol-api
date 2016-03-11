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

class Championmastery extends Requester
{
    use RegionsPlatform;
    protected $url = 'https://{region}.api.pvp.net/';

    /**
     * @return array
     */
    protected function getResponseCodes()
    {
        $responseCodes = parent::getResponseCodes();
        $responseCodes[404] = 'Not Found';
        return $responseCodes;
    }

    /**
     * @param $region
     * @param $summonerId
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/1071/3696
     */
    public function getChampions($region, $summonerId)
    {
        $response = ['error' => 'error'];
        $platform = $this->getPlatform($region);
        if (!empty($platform)) {
            foreach ($platform as $server) {
                $data = "championmastery/location/{$server}/player/{$summonerId}/champions";
                $url = $this->getUrl($region, $data, $this->version);
                $response = $this->http_response($url);
                if (!isset($response['error'])) {
                    break;
                }
            }
        }
        return $response;
    }

    /**
     * @param $region
     * @param $summonerId
     * @param $championId
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/1071/3697
     */
    public function getChampion($region, $summonerId, $championId)
    {
        $response = ['error' => 'error'];
        $platform = $this->getPlatform($region);
        if (!empty($platform)) {
            foreach ($platform as $server) {
                $data = "championmastery/location/{$server}/player/{$summonerId}/champion/{$championId}";
                $url = $this->getUrl($region, $data, $this->version);
                $response = $this->http_response($url);
                if (!isset($response['error'])) {
                    break;
                }
            }
        }
        return $response;
    }

    /**
     * @param $region
     * @param $summonerId
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/1071/3698
     */
    public function getScore($region, $summonerId)
    {
        $response = ['error' => 'error'];
        $platform = $this->getPlatform($region);
        if (!empty($platform)) {
            foreach ($platform as $server) {
                $data = "championmastery/location/{$server}/player/{$summonerId}/score";
                $url = $this->getUrl($region, $data, $this->version);
                $response = $this->http_response($url);
                if (!isset($response['error'])) {
                    break;
                }
            }
        }
        return $response;
    }

    /**
     * @param $region
     * @param $summonerId
     * @param int $count
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/1071/3692
     */
    public function getTopChampions($region, $summonerId, $count = 3)
    {
        $response = ['error' => 'error'];
        $platform = $this->getPlatform($region);
        if (!empty($platform)) {
            foreach ($platform as $server) {
                $data = "championmastery/location/{$server}/player/{$summonerId}/topchampions?count={$count}";
                $url = $this->getUrl($region, $data, $this->version);
                $response = $this->http_response($url);
                if (!isset($response['error'])) {
                    break;
                }
            }
        }
        return $response;
    }

}