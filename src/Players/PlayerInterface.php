<?php

namespace Emagia\Players;


interface PlayerInterface
{
    public function setHealth(float $health);
    public function isAlive(): bool;
}
