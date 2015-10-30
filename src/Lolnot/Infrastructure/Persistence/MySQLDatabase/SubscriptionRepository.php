<?php

namespace Lolnot\Infrastructure\MySQLDatabase;

use Lolnot\Domain\Subscription\SubscriptionRepository;

class SubscriptionRepository implements SubscriptionRepository
{
    public function fetchAll()
    {
        $db = mysqli_connect('localhost', 'root', '', 'lol_notifications');
        if (!$db) {
            die('Could not connect: ' . mysql_error());
        }
        echo 'Connected successfully';

        $sql = 'SELECT * FROM subscription JOIN summoner sum ON sum.id = summoner_id';
        if(!$result = $db->query($sql)){
            die('There was an error running the query [' . $db->error . ']');
        }

        $subscriptions = [];
        while($row = $result->fetch_assoc()) {
            $subscriptions[] = $row;
        }

        return $subscriptions;
    }
}