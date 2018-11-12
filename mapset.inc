<?php
		$mapboxToken='pk.eyJ1Ijoia29yYXlsb2tlciIsImEiOiJjam1oaXA5OGY2djRsM2txdnl6eHVwa21qIn0.M6eMA1rO4HCYdLpshRaJkg';
		$thunderforestToken='309b83d1c0fa488db7e68410529a9b8e';
		$thunderforest='https://tile.thunderforest.com/light-all/{z}/{x}/{y}.png?apikey='.$thunderforestToken;
		$mapAttrib='<a href="http://mapbox.com/" target="_blank" rel="noopener noreferrer">Mapbox</a> | <a href="#" data-toggle="modal" data-lang="'.$lang.'" data-target="#staticContent" data-name="_cookie_policy">'.$language["cookie"].'</a>';
		$satelliteUrl='https://api.tiles.mapbox.com/v4/mapbox.streets-satellite/{z}/{x}/{y}.png?access_token='.$mapboxToken;
		$tileUrl='https://api.tiles.mapbox.com/v4/mapbox.streets/{z}/{x}/{y}.png?access_token='.$mapboxToken;
