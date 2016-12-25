<?php
//twiter api

//credenciales de twitter
$consumerKey    = 'consumerKey';
$consumerSecret = 'consumerSecret';
$oAuthToken     = 'oAuthToken';
$oAuthSecret    = 'oAuthSecret';

require_once('twitteroauth.php');
$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $oAuthToken, $oAuthSecret);

$json = $tweet->get('/statuses/home_timeline'); // obtiene tweets

function getArrayTweets($jsonraw){ //chopea los tweets en un array
    $rawdata = "";
    $json = json_decode($jsonraw);
    $num_items = count($json);
    for($i=0; $i<$num_items; $i++){

        $user = $json[$i];

        $fecha = $user->created_at;
        $url_imagen = $user->user->profile_image_url;
        $screen_name = $user->user->screen_name;
        $tweet = $user->text;

        $imagen = "<a href='https://twitter.com/".$screen_name."' target=_blank><img src=".$url_imagen."></img></a>";
        $name = "<a href='https://twitter.com/".$screen_name."' target=_blank>@".$screen_name."</a>";

        $rawdata[$i][0]=$fecha;
        $rawdata[$i]["fecha"]=$fecha;
        $rawdata[$i][1]=$imagen;
        $rawdata[$i]["imagen"]=$imagen;
        $rawdata[$i][2]=$name;
        $rawdata[$i]["usuario"]=$name;
        $rawdata[$i][3]=$tweet;
        $rawdata[$i]["tweet"]=$tweet;
    }
    return $rawdata;
}

  function displayTable($rawdata){ // dibuja los tweets chopeados

      //DIBUJAMOS LA TABLA
      echo '<table border=1>';
      $columnas = count($rawdata[0])/2;
      //echo $columnas;
      $filas = count($rawdata);
      //echo "<br>".$filas."<br>";
      //Añadimos los titulos

      for($i=1;$i<count($rawdata[0]);$i=$i+2){
          next($rawdata[0]);
          echo "<th><b>".key($rawdata[0])."</b></th>";
          next($rawdata[0]);
      }
      for($i=0;$i<$filas;$i++){
          echo "<tr>";
          for($j=0;$j<$columnas;$j++){
              echo "<td>".$rawdata[$i][$j]."</td>";

          }
          echo "</tr>";
      }
      echo '</table>';
  }



$rawdata =  getArrayTweets($json);
displayTable($rawdata);

?>
