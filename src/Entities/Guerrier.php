<?php
final class Guerrier extends Hero
{
    public function __construct(int $hp, int $atk, int $def, protected int $rage) 
    {
        parent::__construct($hp, $atk, $def);
    }
}