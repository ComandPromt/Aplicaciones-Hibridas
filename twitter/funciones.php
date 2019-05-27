<meta charset="utf-8">
<?php
class Twitter{

    function getTweets($user, $num){
        ini_set('display_errors', 1);
        require_once('TwitterAPIExchange.php');

        $settings = array(
            'oauth_access_token' => "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
            'oauth_access_token_secret' => "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
            'consumer_key' => "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
            'consumer_secret' => "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
        );

        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $getfield = '?screen_name='.$user.'&count='.$num;        
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $json =  $twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();
        return $json;

    }
    
    function getArrayTweets($jsonraw){
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
            $rawdata[$i]["FECHA"]=$fecha;
            $rawdata[$i][1]=$imagen;
            $rawdata[$i]["imagen"]=$imagen;
            $rawdata[$i][2]=$name;
            $rawdata[$i]["screen_name"]=$name;
            $rawdata[$i][3]=$tweet;
            $rawdata[$i]["tweet"]=$tweet;
        }
        return $rawdata;
    }

    function displayTable($rawdata){

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
        echo "<br>";
        echo '<a href="index.php">Volver</a>';
    }

    function sendTweet($mensaje){
        ini_set('display_errors', 1);
        require_once('TwitterAPIExchange.php');
        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/ 
        $settings = array(
            'oauth_access_token' => "xxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
            'oauth_access_token_secret' => "xxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
            'consumer_key' => "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
            'consumer_secret' => "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
        );
        /** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
        $url = 'https://api.twitter.com/1.1/statuses/update.json';
        // $url = 'https%3A%2F%2Fapi.twitter.com%2F1.1%2Fstatuses%2Fupdate.json';
        $requestMethod = 'POST';
        /** POST fields required by the URL above. See relevant docs as above **/
        $postfields = array( 'status' => $mensaje, );
        /** Perform a POST request and echo the response **/
        $twitter = new TwitterAPIExchange($settings);
        return $twitter->buildOauth($url, $requestMethod)->setPostfields($postfields)->performRequest();
    }
}
?>
