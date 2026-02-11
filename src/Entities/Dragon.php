<?php
final class Dragon extends Monster
{
    public function __construct(int $id, string $name,int $hp, int $atk, int $def, private int $megaAttack)
    {
        parent::__construct($id,$name, $hp, $atk, $def);
    }

    public function getMegaAttack(): int
    {
        return $this->megaAttack;
    }

    public function megaAttack(Personnage $cible): self
    {
        if ($this->megaAttack > 1) {
            $damage = max(1, $this->atk * 2.5 - $cible->getDef());
            $this->megaAttack--;
        } else {
            $damage = max(1, $this->atk - $cible->getDef());
        }

        return  $cible->setHp($damage);
    }
}
