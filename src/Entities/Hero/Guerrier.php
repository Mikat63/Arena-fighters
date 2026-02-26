<?php
final class Guerrier extends Hero
{
    private int $maxRage;

    public function __construct(int $id, string $name, int $hp, int $atk, int $def, string $type, string $characterImg, protected int $rage = 2)
    {
        parent::__construct($id, $name, $hp, $atk, $def, $type, $characterImg);
        $this->maxRage = $rage;
    }

       public function getMaxRage(): int
    {
        return $this->maxRage;
    }

    public function getRage(): int
    {
        return $this->rage;
    }

    public function setRage(int $resetRage): self
    {
        $this->rage = $resetRage;

        return $this;
    }


    public function rageAttack(Personnage $cible): void
    {
        if ($this->rage >= 0) {
            $damage = max(1, $this->atk * 2 - $cible->getDef());
            $this->rage--;
        } else {
            $damage = max(1, $this->atk - $cible->getDef());
        }
        $cible->setHp($damage);
    }
}
