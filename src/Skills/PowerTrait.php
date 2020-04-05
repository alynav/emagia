<?php


namespace Emagia\Skills;


trait PowerTrait
{
    /** @var float */
    private $chance;

    /**
     * @return float
     */
    public function getChance(): float
    {
        return $this->chance;
    }

    /**
     * @param float $chance
     * @return $this
     */
    public function setChance(float $chance): self
    {
        $this->chance = $chance;
        return $this;
    }
}
