<?php
final class Golem extends Monster
{
    public function __construct(int $id, string $name,int $hp, int $atk, int $def,string $type)
    {
        parent::__construct($id, $name,$hp, $atk, $def,$type);
    }
}
