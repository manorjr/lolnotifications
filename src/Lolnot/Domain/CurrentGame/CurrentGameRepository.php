<?php

namespace Lolnot\Domain\CurrentGame;

use Lolnot\Domain\ReaderRepository;

interface CurrentGameRepository extends ReaderRepository
{
    public function fetchAll($object);

    public function fetchBySummonerId($summonerId);
}