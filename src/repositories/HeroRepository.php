<?php

class HeroRepository
{
    public function __construct(private PDO $db, private HeroMapper $mapper) {}

    public function findAllByType(): array
    {
        $request = $this->db->prepare(
            'SELECT
                *
            FROM
                heros
            ORDER BY
                type'
        );

        $request->execute();

        $HerosDatas = $request->fetchAll(PDO::FETCH_ASSOC);

        $herosByTypesArray = [];

        foreach ($HerosDatas as $HeroData) {
            $hero =  $this->mapper->mapToObject($HeroData);
            $herosByTypesArray[strtolower($hero->getType())][] = $hero;
        }

        return  $herosByTypesArray;
    }


    public function findOneById(int $idHero): Hero
    {
        $request = $this->db->prepare(
            'SELECT
                *
            FROM
                heros
            WHERE  
                id = :id'
        );

        $request->execute([
            ':id' => $idHero
        ]);

        $hero = $request->fetch(PDO::FETCH_ASSOC);


        $hero =  $this->mapper->mapToObject($hero);

        return  $hero;
    }
}
