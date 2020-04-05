<?php


namespace Emagia\Players;


use Emagia\GameSetting;

class PlayerFactory
{
    public static function create(
        string $name,
        int $health,
        int $strength,
        int $defence,
        int $speed,
        int $luck
    ): Player
    {
        $player = new Player();
        $player->setName($name)
            ->setHealth($health)
            ->setStrength($strength)
            ->setDefence($defence)
            ->setSpeed($speed)
            ->setLuck($luck);

        return $player;
    }

    public static function createHero(): Player
    {
        $name = GameSetting::HERO_NAME;
        $health = mt_rand(GameSetting::HERO_ABILITIES['MIN_HEALTH'], GameSetting::HERO_ABILITIES['MAX_HEALTH']);
        $strength = mt_rand(GameSetting::HERO_ABILITIES['MIN_STRENGTH'], GameSetting::HERO_ABILITIES['MAX_STRENGTH']);
        $defence = mt_rand(GameSetting::HERO_ABILITIES['MIN_DEFENCE'], GameSetting::HERO_ABILITIES['MAX_DEFENCE']);
        $speed = mt_rand(GameSetting::HERO_ABILITIES['MIN_SPEED'], GameSetting::HERO_ABILITIES['MAX_SPEED']);
        $luck = mt_rand(GameSetting::HERO_ABILITIES['MIN_LUCK'], GameSetting::HERO_ABILITIES['MAX_LUCK']);

        return self::create($name, $health, $strength, $defence, $speed, $luck);
    }

    public static function createWildBeast(): Player
    {
        $name = GameSetting::WILD_BEAST_NAME;
        $health = mt_rand(GameSetting::WILD_BEAST_ABILITIES['MIN_HEALTH'], GameSetting::WILD_BEAST_ABILITIES['MAX_HEALTH']);
        $strength = mt_rand(GameSetting::WILD_BEAST_ABILITIES['MIN_STRENGTH'], GameSetting::WILD_BEAST_ABILITIES['MAX_STRENGTH']);
        $defence = mt_rand(GameSetting::WILD_BEAST_ABILITIES['MIN_DEFENCE'], GameSetting::WILD_BEAST_ABILITIES['MAX_DEFENCE']);
        $speed = mt_rand(GameSetting::WILD_BEAST_ABILITIES['MIN_SPEED'], GameSetting::WILD_BEAST_ABILITIES['MAX_SPEED']);
        $luck = mt_rand(GameSetting::WILD_BEAST_ABILITIES['MIN_LUCK'], GameSetting::WILD_BEAST_ABILITIES['MAX_LUCK']);

        return self::create($name, $health, $strength, $defence, $speed, $luck);
    }
}
