<?php

namespace Lolnot\Domain\Notification;

class Notification
{
	const STATUS_SENT     = 1;
	const STATUS_NOT_SENT = 2;

	private $id;
	
	/**
	 * Email
	 * @var string
	 */
	private $userNotified;
	
	/**
	 * Subscription id.
	 * @var int
	 */
	private $subscriptionId;
	
	/**
	 * 
	 * @var int
	 */
	private $status;

	private $sentOn;

	private $content;
	
	public function setUserNotified($userNotified)
	{
		$this->userNotified = $userNotified;
		
		return $this;
	}
	
	public function setSubscriptionId($subscriptionId)
	{
		$this->subscriptionId = $subscriptionId;
	
		return $this;
	}

	public function setStatus($status)
	{
		$this->status = $status;
	
		return $this;
	}
}