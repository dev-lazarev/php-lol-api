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

class LolStaticData extends Requester
{
    protected $version = '1.2';
    protected $url = 'https://global.api.pvp.net/api/lol/static-data/{region}/v{version}/';

    /**
     * @param $region
     * @param string $locale
     * @param string $champData
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/1055/3633
     */
    public function getChampion($region, $locale = 'ru_RU', $champData = 'all')
    {
        $data = "champion?locale={$locale}&champData={$champData}";
        $url = $this->getUrl($region, $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }

    /**
     * @param $region
     * @param string $locale
     * @param string $itemListData
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/1055/3621
     */
    public function getItem($region, $locale = 'ru_RU', $itemListData = 'all')
    {
        $data = "item?locale={$locale}&itemListData={$itemListData}";
        $url = $this->getUrl($region, $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }

    /**
     * @param $region
     * @param string $locale
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/1055/3624
     */
    public function getLanguageStrings($region, $locale = 'ru_RU')
    {
        $data = "language-strings?locale={$locale}";
        $url = $this->getUrl($region, $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }

    /**
     * @param $region
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/1055/3631
     */
    public function getlanguages($region)
    {
        $data = "languages";
        $url = $this->getUrl($region, $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }

    /**
     * @param $region
     * @param string $locale
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/1055/3635
     */
    public function getMap($region, $locale = 'ru_RU')
    {
        $data = "map?locale={$locale}";
        $url = $this->getUrl($region, $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }

    /**
     * @param $region
     * @param string $locale
     * @param string $masteryListData
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/1055/3625
     */
    public function getMastery($region, $locale = 'ru_RU', $masteryListData = 'all')
    {
        $data = "mastery?locale={$locale}&masteryListData={$masteryListData}";
        $url = $this->getUrl($region, $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }

    /**
     * @param $region
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/1055/3632
     */
    public function getRealm($region)
    {
        $data = "realm";
        $url = $this->getUrl($region, $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }

    /**
     * @param $region
     * @param string $locale
     * @param string $runeListData
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/1055/3623
     */
    public function getRune($region, $locale = 'ru_RU', $runeListData = 'all')
    {
        $data = "rune?locale={$locale}&runeListData={$runeListData}";
        $url = $this->getUrl($region, $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }

    /**
     * @param $region
     * @param string $locale
     * @param string $spellData
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/1055/3634
     */
    public function getSummonerSpell($region, $locale = 'ru_RU', $spellData = 'all')
    {
        $data = "summoner-spell?locale={$locale}&spellData={$spellData}";
        $url = $this->getUrl($region, $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }

    /**
     * @param $region
     * @return array|mixed
     * @see https://developer.riotgames.com/api/methods#!/1055/3630
     */
    public function getVersions($region)
    {
        $data = "versions";
        $url = $this->getUrl($region, $data, $this->version);
        $response = $this->http_response($url);
        return $response;
    }
}