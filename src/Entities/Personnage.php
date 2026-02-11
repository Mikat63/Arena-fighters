<?php

abstract class Personnage
{

    public function __construct(protected int $id, protected string $name, protected int $hp, protected int $atk, protected int $def, protected string $type) {}

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
        $this->hp -= $damage;
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


    public function attack(Personnage $cible): self
    {
        $damage = max(1, $this->atk - $cible->getDef());

        return $cible->setHp($damage);
    }
}
