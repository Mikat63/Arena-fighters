<?php

abstract class Personnage
{

    public function __construct(protected int $hp, protected int $atk,protected int $def) 
    {

    }

    public function getHp(): Int
    {
        return $this->hp;
    }

       public function setHp(int $health): self
    {
        $this->hp  = $health;

        return $this;
    }


    public function getAtk(): Int
    {
        return $this->atk;
    }

       public function setAtk(int $attack): self
    {
        $this->atk  = $attack;

        return $this;
    }


    public function getDef(): Int
    {
        return $this->def;
    }

    public function setDef(int $defense): self
    {
        $this->def  = $defense;

        return $this;
    }
}
