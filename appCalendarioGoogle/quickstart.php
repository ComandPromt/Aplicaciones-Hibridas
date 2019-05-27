
<?php
/**
 * Copyright 2018 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 */
// [START calendar_quickstart]

//Instalar composer, una vez que termina de descargar los paquetes los coloca dentro 
//de la carpeta vendor que está definida en nuestro archivo composer.json.
require __DIR__ . '/vendor/autoload.php';
/*if (php_sapi_name() != 'cli') {
    throw new Exception('This application must be run on the command line.');
}
/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Google Calendar API PHP Quickstart');
    $client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);
    $client->setAuthConfig('credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');
    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
    $tokenPath = 'token.json';
    $accessToken = null;
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }
    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            
            $_SESSION['url'] = $authUrl;
            
            $authCode = null;
            if(isset($_POST['submit']) && $_POST['code']!='')
            {
                $authCode = trim($_POST['code']);

                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                //print_r($accessToken);
                $client->setAccessToken($accessToken);
                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new Exception(join(', ', $accessToken));
                }
            }            
           
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath)) && isset($_POST['submit']) ) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        
        //echo json_encode($client->getAccessToken());
        if (isset($_POST['submit']) && $_POST['code']!=''){
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }
    }
    return $client;
}

    // Get the API client and construct the service object.
$client = getClient();
if(isset($_POST['submit']) && $_POST['code']!=''){    
    $service = new Google_Service_Calendar($client);
    // Print the next 10 events on the user's calendar.
    $calendarId = 'primary';
    $optParams = array(
    'maxResults' => 10,
    'orderBy' => 'startTime',
    'singleEvents' => true,
    'timeMin' => date('c'),
    );
    $results = $service->events->listEvents($calendarId, $optParams);
    $events = $results->getItems();
    if (empty($events)) {
        print '<p style="font-weight:bold; color:#551a8b">No hay eventos próximos.</p>';
    } else {
        print '<p style="font-weight:bold; color:#551a8b">Próximos eventos:</p>';
       
        
        echo "<table style='margin: 0 auto;'>";
        foreach ($events as $event) {
            $start = $event->start->dateTime;
            if (empty($start)) {
                $start = $event->start->date;
            }

            $dt = new DateTime($start);
            $dateE = $dt->format('d-m-Y H:i:s');
            echo "
                <tr>
                    <td>".$dateE."</td>
                    <td>".$event->getSummary()."</td>
                </tr>        
            ";            
        }
        print "</table>";
    }
}
// [END calendar_quickstart]

//https://developers.google.com/calendar/quickstart/php?refresh=1#step_3_set_up_the_sample

