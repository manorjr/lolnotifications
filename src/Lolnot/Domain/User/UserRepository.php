<?php

namespace Lolnot\Domain\User;

use Lolnot\Domain\DomainRepository;

interface UserRepository extends DomainRepository
{
    public function fetchUserByEmail($email);
}