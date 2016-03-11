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

class Requester
{
    protected $version = '1.4';
    protected $apiKey = '';
    protected $url = 'https://{region}.api.pvp.net/api/lol/{region}/v{version}/';

    /**
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param $region
     * @param $data
     * @param $version
     * @return mixed|string
     */
    protected function getUrl($region, $data, $version)
    {

        $replaceArray = [
            'search' => [
                '{region}',
                '{version}'
            ],
            'replace' => [
                strtolower($region),
                $version
            ]
        ];

        $url = str_replace($replaceArray['search'], $replaceArray['replace'], $this->url);
        $url .= $data;

        $parse = parse_url($url);
        if (!empty($parse['query'])) {
            $url .= '&api_key=' . $this->apiKey;
        } else {
            $url .= '?api_key=' . $this->apiKey;
        }
        return $url;
    }

    /**
     * @param $code
     * @return mixed
     */
    protected function getResponse($code)
    {
        return $this->getResponseCodes()[$code];
    }

    /**
     * @return array
     */
    protected function getResponseCodes()
    {
        return [
            '400' => 'Bad request',
            '401' => 'Unauthorized',
            '403' => 'Forbidden',
            '404' => '404',
            '429' => 'Rate limit exceeded',
            '500' => 'Internal server error',
            '503' => 'Service unavailable',
        ];
    }


    /**
     * @param $url
     * @return array|mixed
     */
    protected function http_response($url)
    {
        try {
            $ch = curl_init();

            if (FALSE === $ch)
                throw new \Exception('failed to initialize');

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            //curl_setopt($ch, CURLOPT_VERBOSE, 1);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout in seconds

            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                throw new \Exception('API Service unavailable... try again later...');
            }
            $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $body = substr($response, $header_size);

            if ($statusCode == 200) {
                return json_decode($body, true);
            } else {
                return ['error' => $this->getResponse($statusCode)];
            }

        } catch (\Exception $e) {
            return ['error' => 'API Service unavailable... try again later...'];
        }
    }
}
