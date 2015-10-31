<?php

namespace Lolnot\Infrastructure\Persistence\MySQLDatabase;

use Lolnot\Domain\Subscription\SubscriptionRepository;
use Lolnot\Domain\Subscription\SubscriptionCollection;
use Lolnot\Domain\Subscription\Subscription;

class MySQLSubscriptionRepository implements SubscriptionRepository
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
        while ($row = $result->fetch_assoc()) {
        	$subscription = new Subscription();
        	$subscription->setId($row['id'])
        				 ->setSummonerId($row['summoner_id'])
        				 ->setUserEmail($row['email'])
        				 ->setDate($row['date_subscription']);
        	
            $subscriptions[] = $subscription;
        }

        return new SubscriptionCollection($subscriptions);
    }
}