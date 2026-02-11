<?php
final class Magician extends Hero
{
    public function __construct(int $hp, int $atk, int $def, protected int $mana = 1)
    {
        parent::__construct($hp, $atk, $def);
    }

    public function getMana(): int
    {
        return $this->mana;
    }

    public function manaAttack(Personnage $cible): self
    {
        if ($this->mana > 0) {
            $damage = max(1, $this->atk * 3 - $cible->getDef());
            $this->mana--;
        } else {
            $damage = max(1, $this->atk - $cible->getDef());
        }

        return $cible->setHp($damage);
    }
}
