<?php

class Hero extends Personnage
{
     public function __construct( int $hp, int $atk, int $def) 
    {
        parent::__construct($hp,$atk,$def);
    }
} 