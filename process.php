<?php

$db = mysqli_connect('localhost', 'root', '', 'lol_notifications');
if (!$db) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';

$sql = 'SELECT * FROM subscription JOIN summoner sum ON sum.id = summoner_id';
if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}
while($row = $result->fetch_assoc()){
    $request = 'https://euw.api.pvp.net/observer-mode/rest/consumer/getSpectatorGameInfo/EUW1/' . $row['summoner_id'] . '?api_key=ae8ea5ed-97ca-45b7-803b-6ef3786d6cbc';
    $response = json_decode(file_get_contents($request));
    if ($response !== NULL) {
        $to      = $row['email'];
        $subject = 'LOL Notifications';
        $headers = 'From: notifications@lol.com';
        $message = $response->$row['name']->name . 'Is playing right now';
        mail($to, $subject, $message, $headers);
    }
}

exit('end');

$tos = [
    'pol.pereta@gmail.com',
];

$to      = implode(', ', $tos);
$subject = 'LOL Notifications';
$headers = 'From: manor@lol.com';

$request = 'https://euw.api.pvp.net/api/lol/euw/v1.4/summoner/by-name/' . 'manorjr' . '?api_key=ae8ea5ed-97ca-45b7-803b-6ef3786d6cbc';
$response = json_decode(file_get_contents($request));
$message = $response->manorjr->name . ' has been added into our database with id: ' . $response->manorjr->id;
mail($to, $subject, $message, $headers);