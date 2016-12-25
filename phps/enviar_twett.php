<?php
//twiter api

//credenciales de twitter
$consumerKey    = 'consumerKey';
$consumerSecret = 'consumerSecret';
$oAuthToken     = 'oAuthToken';
$oAuthSecret    = 'oAuthSecret';

require_once('twitteroauth.php');
$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $oAuthToken, $oAuthSecret);

// Nuevo mensaje Tweet
$tweetMessage = 'Hola clase de PMUD';

// comprueba que no sean mas de 140 characters
if(strlen($tweetMessage) <= 140)
{
   echo  $tweet->post('statuses/update', array('status' => $tweetMessage)); // enviamos el mensaje
}

?>
