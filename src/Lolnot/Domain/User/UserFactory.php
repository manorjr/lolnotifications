<?php

namespace Lolnot\Domain\User;

interface UserFactory
{
    public function create($email, $password);
}