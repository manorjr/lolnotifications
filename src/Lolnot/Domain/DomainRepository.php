<?php

namespace Lolnot\Domain;

interface DomainRepository
{
    public function persist(/*DomainObject*/ $object);
}