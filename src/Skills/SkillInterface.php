<?php

namespace Emagia\Skills;


interface SkillInterface
{
    public function getChance(): float;
    public function getPower(): float;
    public function getActionType(): string;
    public function canBeUsed(string $action): bool;
}
