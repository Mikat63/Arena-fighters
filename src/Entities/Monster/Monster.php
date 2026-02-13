<?php

class Monster extends Personnage
{

    public function __construct(int $id, string $name, int $hp,  int $atk,  int $def,  string $type, private string $backgroundFight)
    {
        parent::__construct($id, $name, $hp, $atk, $def, $type);
    }

    public function getBackgroundFight():string
    {
        return $this->backgroundFight;
    }
}
