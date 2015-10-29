<?php

namespace Lolnot\Domain;

interface ReaderRepository
{
    public function fetchAll(/*DomainObject*/ $object);
}