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

    public function setId($id)
    {
    	$this->id = $id;
    	 
    	return $this;
    }

    public function setSummonerId($summonerId)
    {
    	$this->summonerId = $summonerId;
    	
    	return $this;
    }
    
    public function setUserEmail($userEmail)
    {
    	$this->userEmail = $userEmail;
    	 
    	return $this;
    }
    
    public function setDate($date)
    {
    	$this->date = $date;
    
    	return $this;
    }
}