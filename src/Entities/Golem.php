<?php
final class Golem extends Monster
{
    public function __construct(int $hp, int $atk, int $def)
    {
        parent::__construct($hp, $atk, $def);
    }
}
