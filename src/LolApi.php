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

namespace devLazarev\lolapi;

use devLazarev\lolapi\methods\Champion;
use devLazarev\lolapi\methods\CurrentGame;
use devLazarev\lolapi\methods\FeaturedGames;
use devLazarev\lolapi\methods\Game;
use devLazarev\lolapi\methods\League;
use devLazarev\lolapi\methods\LolStaticData;
use devLazarev\lolapi\methods\Championmastery;
use devLazarev\lolapi\methods\Match;
use devLazarev\lolapi\methods\MatchList;
use devLazarev\lolapi\methods\Stats;
use devLazarev\lolapi\methods\Status;
use devLazarev\lolapi\methods\Summoner;
use devLazarev\lolapi\methods\Team;

class LolApi
{
    private $apiKey;

    /*
     * @var Champion
     */
    public $champion;

    /**
     * @var CurrentGame
     */
    public $currentGame;

    /**
     * @var FeaturedGames
     */
    public $featuredGames;

    /**
     * @var Game
     */
    public $game;

    /**
     * @var League
     */
    public $league;

    /**
     * @var Championmastery
     */
    public $championmastery;

    /**
     * @var LolStaticData
     */
    public $lolStaticData;

    /**
     * @var Championmastery
     */
    public $lolStatus;

    /**
     * @var Match
     */
    public $match;

    /**
     * @var MatchList
     */
    public $matchList;

    /**
     * @var Stats
     */
    public $stats;

    /**
     * @var Status
     */
    public $status;

    /**
     * @var Summoner
     */
    public $summoner;

    /**
     * @var Team
     */
    public $team;


    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getInstance($name)
    {
        if (property_exists($this, $name)) {
            if (!empty($this->$name)) {
                return $this->$name;
            } else {
                switch ($name) {
                    case 'champion' :
                        return $this->$name = new Champion($this->apiKey);
                        break;
                    case 'currentGame' :
                        return $this->$name = new CurrentGame($this->apiKey);
                        break;
                    case 'featuredGames' :
                        return $this->$name = new FeaturedGames($this->apiKey);
                        break;
                    case 'game' :
                        return $this->$name = new Game($this->apiKey);
                        break;
                    case 'league' :
                        return $this->$name = new League($this->apiKey);
                        break;
                    case 'lolStaticData' :
                        return $this->$name = new LolStaticData($this->apiKey);
                        break;
                    case 'championmastery' :
                        return $this->$name = new Championmastery($this->apiKey);
                        break;
                    case 'match' :
                        return $this->$name = new Match($this->apiKey);
                        break;
                    case 'matchList' :
                        return $this->$name = new MatchList($this->apiKey);
                        break;
                    case 'stats' :
                        return $this->$name = new Stats($this->apiKey);
                        break;
                    case 'status' :
                        return $this->$name = new Status($this->apiKey);
                        break;
                    case 'summoner' :
                        return $this->$name = new Summoner($this->apiKey);
                        break;
                    case 'team' :
                        return $this->$name = new Team($this->apiKey);
                        break;
                    default:
                        new \Exception("class {$name} not found!");
                        break;
                }
                return $this->$name;
            }

        } else {
            new \Exception("class {$name} not exist!");
        }
    }
}