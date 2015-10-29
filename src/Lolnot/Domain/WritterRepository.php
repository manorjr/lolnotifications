<?php

namespace Lolnot\Domain;

interface WritterRepository
{
    public function persist(/*DomainObject*/ $object);
}