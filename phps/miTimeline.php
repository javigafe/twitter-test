<?php
//twiter api

//credenciales de twitter
$consumerKey    = 'consumerKey';
$consumerSecret = 'consumerSecret';
$oAuthToken     = 'oAuthToken';
$oAuthSecret    = 'oAuthSecret';

require_once('twitteroauth.php');
$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $oAuthToken, $oAuthSecret);

echo $tweet->get('/statuses/home_timeline');


?>
