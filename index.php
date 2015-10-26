<?php
/*
 * sudo apt-get install mailutils
 * 
 * CREATE DATABASE lol_notifications;
 * CREATE TABLE summoner (id INT(8), name VARCHAR(255));
 * INSERT INTO summoner VALUES('37766425', 'manorjr');
 * 
 * 
 * 
    HTTP Status Code	Reason
    400	Bad request
    401	Unauthorized
    404	Match not found
    429	Rate limit exceeded
    500	Internal server error
    503	Service unavailable
 */
const API_KEY = 'ae8ea5ed-97ca-45b7-803b-6ef3786d6cbc';

const MY_ID = '37766425';

use Silex\Application;
use Lolnot\MyFactory;

$a = require_once __DIR__.'/vendor/autoload.php';
$app = new Application();
$factory = new MyFactory();

$link = mysqli_connect('localhost', 'root', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';

var_dump('end!');exit();

$tos = [
    'pol.pereta@gmail.com',
    'sandrete66@gmail.com',
    'ccricab@gmail.com',
    'foldfiesta@gmail.com',
];

$to      = implode(', ', $tos);
$subject = 'LOL Notifications';
$headers = 'From: manor@lol.com';

foreach (['fiestau', 'hemlet'] as $input)
{
    $request = 'https://euw.api.pvp.net/api/lol/euw/v1.4/summoner/by-name/' . $input . '?api_key=ae8ea5ed-97ca-45b7-803b-6ef3786d6cbc';    
    $response = json_decode(file_get_contents($request));
    var_dump($response);exit();
    $message = $response->$input->name . ' has been added into our database with id: ' . $response->$input->id;
    mail($to, $subject, $message, $headers);
}

/*
$result = mysql_query('SELECT * WHERE 1=1');
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
*/


//mail ( 'pol.pereta@gmail.com', "Test mail", "Test mail from your server name", 'From: you@example.com');

mysql_close($link);
var_dump('done');exit();

/*
class User()
{
    private $email; // PK as id
    private $password;

    private $Summoner;
}

class Summoner()
{
    private $id; // PK
    private $region; // PK
    private $name;
}

class SubscribeService implements Service
{
    // Observer - Subject
    public function __construct(User $SubscriberUser, Summoner $Summoner)
    {
        
    }
    public function execute()
    {
        
    }
}

class CurrentGameInfo
{
    private $gameId;
    private $gameLength;
    private $gameMode;
    private $gameStartTime;
    
    // @var CurrentGameParticipant
    private $participants;
}

class LiveStatus() // aka subscription
{
    public function __construct(Summoner $Summoner, Match $Match)
    {
        
    }
}

class NotifiyService implements Service
{
    public function __construct(User $Subscriber)
    {
        
    }

    public function execute()
    {
        foreach ($subscriptions as $subscription)
        {
            sendEmail($info);
        }
    }
}
*/