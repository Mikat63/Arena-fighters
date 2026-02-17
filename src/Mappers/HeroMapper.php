<?php

final class HeroMapper
{
    public function mapToObject(array $data): Hero
    {
        return match (strtolower($data['type'])) {
            'guerrier' => new Guerrier(
                id: $data['id'],
                name: $data['name'],
                hp: $data['hp'],
                atk: $data['atk'],
                def: $data['def'],
                type: $data['type'],
                characterImg:$data['character_img'],
                rage: $data['rage']
            ),
            'mage' => new Magician(
                id: $data['id'],
                name: $data['name'],
                hp: $data['hp'],
                atk: $data['atk'],
                def: $data['def'],
                type: $data['type'],
                characterImg:$data['character_img'],
                mana: $data['mana']
            ),
            'archer' => new Archer(
                id: $data['id'],
                name: $data['name'],
                hp: $data['hp'],
                atk: $data['atk'],
                def: $data['def'],
                type: $data['type'],
                characterImg:$data['character_img'],
            ),
             default => throw new Exception("Type de héros inconnu : {$data['type']}")
        };
    }
}
