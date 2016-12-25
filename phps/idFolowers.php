<?php
//twiter api

//credenciales de twitter
$consumerKey    = 'consumerKey';
$consumerSecret = 'consumerSecret';
$oAuthToken     = 'oAuthToken';
$oAuthSecret    = 'oAuthSecret';

require_once('twitteroauth.php');
$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $oAuthToken, $oAuthSecret);

// consige los ultimos 100 followers
echo $tweet->get('followers/ids', array('screen_name' => 'javigafe', 'count'=> 100));
// javigafe puede ser cualquier usuario


?>
