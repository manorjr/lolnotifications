<?php

namespace Lolnot\Domain\CurrentGame;

use Lolnot\Domain\DomainRepository;

interface  CurrentGameRepository
{
    public function fetchBySummonerId($summonerId);
}