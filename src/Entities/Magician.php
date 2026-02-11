<?php
final class Magician extends Hero
{
    public function __construct(int $id, string $name, int $hp, int $atk, int $def, string $type, protected int $mana = 1)
    {
        parent::__construct($id, $name, $hp, $atk, $def, $type);
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
