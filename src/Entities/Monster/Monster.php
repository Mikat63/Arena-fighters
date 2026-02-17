<?php

class Monster extends Personnage
{

    public function __construct(int $id, string $name, int $hp,  int $atk,  int $def,  string $type, private string $backgroundFight, string $characterImg)
    {
        parent::__construct($id, $name, $hp, $atk, $def, $type,$characterImg);
    }

    public function getBackgroundFight():string
    {
        return $this->backgroundFight;
    }
}
