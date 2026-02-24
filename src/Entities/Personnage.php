<?php

abstract class Personnage
{

    public function __construct(protected int $id, protected string $name, protected int $hp, protected int $atk, protected int $def, protected string $type, private string $characterImg) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHp(): Int
    {
        return $this->hp;
    }

    public function setHp(int $damage): self
    {
        if ($damage < 0) {
            $damage = 0;
        }

        $this->hp -= $damage;

        if ($this->hp < 0) {
            $this->hp = 0;
        }

        return $this;
    }

    public function getAtk(): Int
    {
        return $this->atk;
    }

    public function getDef(): Int
    {
        return $this->def;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getCharacterImg(): string
    {
        return $this->characterImg;
    }


    public function attack(Personnage $cible): self
    {
        $damage = max(1, $this->atk - $cible->getDef());



        return $cible->setHp($damage);
    }
}
