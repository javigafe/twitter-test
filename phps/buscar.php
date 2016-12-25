<?php
//twiter api

//credenciales de twitter
$consumerKey    = 'consumerKey';
$consumerSecret = 'consumerSecret';
$oAuthToken     = 'oAuthToken';
$oAuthSecret    = 'oAuthSecret';

require_once('twitteroauth.php');
$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $oAuthToken, $oAuthSecret);

// busca y sigue
function searchAndFollow($tweet, $search = "fxstareu"){
	$users = $tweet->get('users/search', array('q' => $search));
	$a = json_decode($users, true);
	foreach ($a as $key => $user) {
		echo $user['screen_name']." Follow user <br>";
		$ret = $tweet->post('friendships/create', array('user_id' => $user['id']));
	}
	//print_r($a);
}

// buscar y seguir a UPCVilanova
searchAndFollow($tweet, "UPCVilanova");


?>
