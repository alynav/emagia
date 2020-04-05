<?php


namespace Emagia\Players;


use Emagia\Skills\SkillInterface;

abstract class PlayerAbstract implements PlayerInterface
{
    /** @var string */
    private $name;

    /** @var float */
    private $health;

    /** @var float */
    private $strength;

    /** @var float */
    private $defence;

    /** @var float */
    private $speed;

    /** @var float */
    private $luck;

    /** @var array */
    private $skills;

    public function __construct()
    {
        $this->skills = [];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getHealth(): float
    {
        return $this->health;
    }

    /**
     * @param float $health
     * @return $this
     */
    public function setHealth(float $health): self
    {
        $this->health = $health;
        return $this;
    }

    /**
     * @return float
     */
    public function getStrength(): float
    {
        return $this->strength;
    }

    /**
     * @param float $strength
     * @return $this
     */
    public function setStrength(float $strength): self
    {
        $this->strength = $strength;
        return $this;
    }

    /**
     * @return float
     */
    public function getDefence(): float
    {
        return $this->defence;
    }

    /**
     * @param float $defence
     * @return $this
     */
    public function setDefence(float $defence): self
    {
        $this->defence = $defence;
        return $this;
    }

    /**
     * @return float
     */
    public function getSpeed(): float
    {
        return $this->speed;
    }

    /**
     * @param float $speed
     * @return $this
     */
    public function setSpeed(float $speed): self
    {
        $this->speed = $speed;
        return $this;
    }

    /**
     * @return float
     */
    public function getLuck(): float
    {
        return $this->luck;
    }

    /**
     * @param float $luck
     * @return $this
     */
    public function setLuck(float $luck): self
    {
        $this->luck = $luck;
        return $this;
    }

    /**
     * @return array
     */
    public function getSkills(): array
    {
        return $this->skills;
    }

    /**
     * @param SkillInterface $skill
     * @return $this
     */
    public function addSkill(SkillInterface $skill): self
    {
        if (!in_array($skill, $this->skills)){
            $this->skills[] = $skill;
        }
        return $this;
    }

    public function isAlive(): bool
    {
        return $this->getHealth() > 0;
    }
}
