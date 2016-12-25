<?php
//twiter api

//credenciales de twitter
$consumerKey    = 'consumerKey';
$consumerSecret = 'consumerSecret';
$oAuthToken     = 'oAuthToken';
$oAuthSecret    = 'oAuthSecret';

require_once('twitteroauth.php');
$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $oAuthToken, $oAuthSecret);

//muestra todos los seguidors
// (request limit 180 per 15 min)
$buffer="";
$cursor = "-1";

$t = json_decode($tweet->get('followers/list', array('screen_name' => 'microsoft', 'count' => 200)), true);
if (isset($t['errors'])) {
	echo "ERRORS !!!!! ";
	print_r($t['errors']);
	die();
}

$cursor = $t['next_cursor_str'];
while ($cursor != 0) {
	foreach ($t['users'] as $user) {
	    //$tweet->post('direct_messages/new', array('screen_name' => $user['screen_name'], 'text' => 'Hello!'));
	    $buffer = $buffer.$user['screen_name']."<br>";
	}
	$buffer = $buffer."NEXTPART";
	sleep(1);
	$t = json_decode($tweet->get('followers/list', array('screen_name' => 'microsoft', 'cursor' => $cursor, 'count' => 200)),true);
	$cursor = $t['next_cursor_str'];
}

echo $buffer;

?>
