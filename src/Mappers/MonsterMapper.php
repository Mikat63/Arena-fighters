<?php

final class MonsterMapper
{
    public function mapToObject(array $data): Monster
    {
        return match (strtolower($data['type'])) {
            'dragon' => new Dragon(
                id: $data['id'],
                name: $data['name'],
                hp: $data['hp'],
                atk: $data['atk'],
                def: $data['def'],
                type: $data['type'],
                backgroundFight: $data['fight_background'],
                characterImg: $data['character_img'],
                megaAttackCharged: $data['mega_attack']
            ),
            'orc' => new Orc(
                id: $data['id'],
                name: $data['name'],
                hp: $data['hp'],
                atk: $data['atk'],
                def: $data['def'],
                type: $data['type'],
                backgroundFight: $data['fight_background'],
                characterImg: $data['character_img']


            ),
            'golem' => new Golem(
                id: $data['id'],
                name: $data['name'],
                hp: $data['hp'],
                atk: $data['atk'],
                def: $data['def'],
                type: $data['type'],
                backgroundFight: $data['fight_background'],
                characterImg: $data['character_img']

            ),
            default => throw new Exception("Type de monstres inconnu : {$data['type']}")
        };
    }
}
