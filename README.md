League of Legends PHP API
=====================
 - Implemented almost all methods from https://developer.riotgames.com/api/methods
 - Only takes the data from the server riot.
 - Caching you should implement on its side.

#Requirements:

 - php5.4 + , php7+
 - libcurl

#Composer:
    composer require dev-lazarev/php-lol-api

#Example

    $lolapi = new LolApi(<LOL_API_KEY>);
    $summonerModel = $lolapi->getInstance('summoner');
    $summonerData = $summonerModel->getByIds($region, [$summonerId]);
    //or
    $summonersData = $summonerModel->getByIds($region, $summonerIds);

#Use medhots:
See https://developer.riotgames.com/api/methods

#License
The MIT License (MIT)

#For questions or comments
dev-lazarev.com

to@dev-lazarev.com