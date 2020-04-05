<?php


namespace Tests;


use Emagia\Players\Player;
use Emagia\Skills\MagicShield;
use Emagia\Skills\RapidStrike;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    private $player;
    
    protected function setUp(): void 
    {
        $this->player = new Player();
    }

    public function testGetName()
    {
        $this->player->setName('Test');

        $this->assertEquals('Test', $this->player->getName());
    }

    public function testGetHealth()
    {
        $this->player->setHealth(90);

        $this->assertEquals(90, $this->player->getHealth());
    }

    public function testGetStrength()
    {
        $this->player->setStrength(80);

        $this->assertEquals(80, $this->player->getStrength());
    }

    public function testGetDefence()
    {
        $this->player->setDefence(100);

        $this->assertEquals(100, $this->player->getDefence());
    }

    public function testGetSpeed()
    {
        $this->player->setSpeed(83);

        $this->assertEquals(83, $this->player->getSpeed());
    }

    public function testGetLuck()
    {
        $this->player->setLuck(40);

        $this->assertEquals(40, $this->player->getLuck());
    }

    public function testGetSkills()
    {
        $magicShield = $this->createMock(MagicShield::class);
        $rapidStrike = $this->createMock(RapidStrike::class);
        $this->player
            ->addSkill($magicShield)
            ->addSkill($magicShield)
            ->addSkill($magicShield)
            ->addSkill($rapidStrike);

        $this->assertCount(2, $this->player->getSkills());
    }
}