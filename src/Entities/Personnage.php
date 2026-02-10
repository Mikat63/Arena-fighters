<?php

abstract class Personnage
{

    public function __construct(protected int $hp, protected int $atk,protected int $def) 
    {

    }
}
