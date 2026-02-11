<?php

class HeroRepository 
{
    public function __construct(private PDO $db, private HeroMapper $mapper)
    {

    }

    public function finAllByType(): array
    {
        $request = $this->db->prepare
        (
            'SELECT
                *
            FROM
                hero
            ORDER BY
                type'
        );

        $request->execute();

        $HerosByType = $request->fetchAll();

        
    }
} 