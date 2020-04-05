<?php


namespace Emagia\Skills;


trait ChanceTrait
{
    /** @var float */
    private $power;

    /**
     * @return float
     */
    public function getPower(): float
    {
        return $this->power;
    }

    /**
     * @param float $power
     * @return $this
     */
    public function setPower(float $power): self
    {
        $this->power = $power;
        return $this;
    }

    public function getRandom(): float
    {
        return mt_rand(0, 100);
    }
}
