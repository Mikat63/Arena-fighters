<?php
final class Archer extends Hero
{
    public function __construct(int $id, string $name,int $hp, int $atk, int $def, string $type,string $characterImg)
    {
        parent::__construct($id, $name,$hp, $atk, $def,$type,$characterImg);
    }
}
