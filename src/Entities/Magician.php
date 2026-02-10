<?php
final class Magician extends Hero
{
    public function __construct(int $hp, int $atk, int $def, protected int $mana) 
    {
        parent::__construct($hp, $atk, $def);
    }
}