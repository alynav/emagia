<?php

namespace Emagia\Skills;


use Emagia\Actions\Attack;

class RapidStrike implements SkillInterface
{
    use ChanceTrait;
    use PowerTrait;

    public function getActionType(): string
    {
        return Attack::class;
    }

    public function canBeUsed(string $action): bool
    {
        if ($action == $this->getActionType() &&
            $this->getRandom() <= $this->getChance()
        ){
            return true;
        }

        return false;
    }
}
