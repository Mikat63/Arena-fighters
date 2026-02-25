<?php

class Hero extends Personnage
{
    protected int $maxHp;

    public function __construct(int $id, string $name, int $hp, int $atk, int $def, string $type, string $characterImg)
    {
        parent::__construct($id, $name, $hp, $atk, $def, $type, $characterImg);
        $this->maxHp = $hp;
    }

    public function getMaxHp(): int
    {
        return $this->maxHp;
    }
}
