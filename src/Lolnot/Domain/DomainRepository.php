<?php

namespace Lolnot\Domain;

interface DomainRepository extends ReaderRepository, WritterRepository
{
    public function fetchAll(/*DomainObject*/ $object);

    public function persist(/*DomainObject*/ $object);
}