<?php

class Monster extends Personnage
{

    public function __construct(int $id, string $name,int $hp,  int $atk,  int $def)
    {
        parent::__construct($id, $name,$hp, $atk, $def);
    }
}
