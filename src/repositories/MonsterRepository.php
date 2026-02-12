<?php

class MonsterRepository
{
    public function __construct(private PDO $db, private MonsterMapper $mapper) {}

    public function findAllByType(): array
    {
        $request = $this->db->prepare(
            'SELECT
                *
            FROM
                monsters
            ORDER BY
                type'
        );

        $request->execute();

        $monstersDatas = $request->fetchAll(PDO::FETCH_ASSOC);

        $monstersByTypesArray = [];

        foreach ($monstersDatas as $monsterData) {
            $monster =  $this->mapper->mapToObject($monsterData);
            $monstersByTypesArray[strtolower($monster->getType())][] = $monster;
        }

        return  $monstersByTypesArray;
    }

    public function findOneById(int $idMonster): Monster
    {
        $request = $this->db->prepare(
            'SELECT
                *
            FROM
                monsters
            WHERE  
                id = :id'
        );

        $request->execute([
            ':id' => $idMonster
        ]);

        $monster = $request->fetch(PDO::FETCH_ASSOC);


        $monster =  $this->mapper->mapToObject($monster);

        return  $monster;
    }
}
