<?php


namespace Emagia;


class GameSetting
{
    const HERO_NAME = 'Orderus';
    const HERO_ABILITIES = [
        'MIN_HEALTH'    => 70,
        'MAX_HEALTH'    => 100,
        'MIN_STRENGTH'  => 70,
        'MAX_STRENGTH'  => 100,
        'MIN_DEFENCE'   => 45,
        'MAX_DEFENCE'   => 55,
        'MIN_SPEED'     => 40,
        'MAX_SPEED'     => 50,
        'MIN_LUCK'      => 10,
        'MAX_LUCK'      => 30,
    ];

    const MAGIC_SHIELD = [
        'POWER' => 0.5,
        'CHANCE' => 20,
    ];

    const RAPID_STRIKE = [
        'POWER' => 2,
        'CHANCE' => 10,
    ];

    const WILD_BEAST_NAME = 'Mummy Claws';
    const WILD_BEAST_ABILITIES = [
        'MIN_HEALTH'    => 60,
        'MAX_HEALTH'    => 90,
        'MIN_STRENGTH'  => 60,
        'MAX_STRENGTH'  => 90,
        'MIN_DEFENCE'   => 40,
        'MAX_DEFENCE'   => 60,
        'MIN_SPEED'     => 40,
        'MAX_SPEED'     => 60,
        'MIN_LUCK'      => 25,
        'MAX_LUCK'      => 40,
    ];

    const ROUNDS = 20;
}