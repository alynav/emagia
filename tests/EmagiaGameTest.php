<?php
namespace Tests;
use Emagia\EmagiaGame;
use Emagia\Players\Player;
use PHPUnit\Framework\TestCase;

final class EmagiaGameTest extends TestCase
{
    public function testPlayersAlive()
    {
        $game = new EmagiaGame();
        $hero = $this->createMock(Player::class);
        $hero->expects($this->once())
            ->method('isAlive')
            ->willReturn(true);
        $wildBeast = $this->createMock(Player::class);
        $wildBeast->expects($this->once())
            ->method('isAlive')
            ->willReturn(true);
    }

}