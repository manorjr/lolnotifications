<?php

namespace Lolnot\Domain\Subscription;

class Subscription
{
    private $id;
    private $userEmail;
    private $summonerId;
    private $date;
    
    public function getSummonerId()
    {
        return $this->summonerId;
    }

    public function getUserEmail()
    {
        return $this->userEmail;
    }
}