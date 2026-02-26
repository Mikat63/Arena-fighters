<?php
final class Magician extends Hero
{

private int $maxMana;

    public function __construct(int $id, string $name, int $hp, int $atk, int $def, string $type,string $characterImg, protected int $mana = 1)
    {
        parent::__construct($id, $name, $hp, $atk, $def, $type,$characterImg);
        $this->maxMana =  $mana;
    }

    public function getMana(): int
    {
        return $this->mana;
    }

       public function setMana(int $resetMana): self
    {
        $this->mana = $resetMana;

        return $this;
    }

    public function getMaxMana(): int
    {
        return $this->maxMana;
    }

    public function manaAttack(Personnage $cible): void
    {
        if ($this->mana > 0) {
            $damage = max(1, $this->atk * 3 - $cible->getDef());
            $this->mana--;
        } else {
            $damage = max(1, $this->atk - $cible->getDef());
        }

        $cible->setHp($damage);
    }
}
