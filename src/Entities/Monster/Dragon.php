<?php
final class Dragon extends Monster
{
    public function __construct(int $id, string $name, int $hp, int $atk, int $def,  string $type, string $backgroundFight, private int $megaAttackCharged)
    {
        parent::__construct($id, $name, $hp, $atk, $def, $type, $backgroundFight);
    }

    public function getMegaAttack(): int
    {
        return $this->megaAttackCharged;
    }

    public function megaAttack(Personnage $cible): self
    {
        if ($this->megaAttackCharged > 0) {
            $damage = max(1, $this->atk * 2.5 - $cible->getDef());
            $this->megaAttackCharged--;
        } else {
            $damage = max(1, $this->atk - $cible->getDef());
        }

        return  $cible->setHp($damage);
    }
}
