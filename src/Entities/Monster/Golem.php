<?php
final class Golem extends Monster
{
    public function __construct(int $id, string $name,int $hp, int $atk, int $def,string $type,string $backgroundFight,string $characterImg)
    {
        parent::__construct($id, $name,$hp, $atk, $def,$type,$backgroundFight, $characterImg);
    }
}
