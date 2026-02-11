<?php
final class Guerrier extends Hero
{
    public function __construct(int $hp, int $atk, int $def, protected int $rage = 2)
    {
        parent::__construct($hp, $atk, $def);
    }

    public function rageAttack(Personnage $cible): self
    {
        if ($this->rage > 0) {
            $damage = max(1, $this->atk * 2 - $cible->getDef());
            $this->rage--;
        } else {
            $damage = max(1, $this->atk - $this->getDef());
        }

        return $cible->setHp($damage);
    }
}
