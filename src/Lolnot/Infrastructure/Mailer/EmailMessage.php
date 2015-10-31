<?php

namespace Lolnot\Infrastructure\Mailer;

use Lolnot\Application\Message;

class EmailMessage implements Message
{

    public $to;
    public $from;
    public $subject;
    public $body;

    public function __construct($to, $from, $subject, $body)
    {
        $this->to = $to;
        $this->from = $from;
        $this->subject = $subject;
        $this->body = $body;
    }
}