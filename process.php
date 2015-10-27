<?php
const API_KEY = 'ae8ea5ed-97ca-45b7-803b-6ef3786d6cbc';

const MY_ID = '37766425';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


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