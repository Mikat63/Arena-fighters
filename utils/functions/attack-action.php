<?php

function AttackAction($db, $action, $hero, $monster)
{

    $monstersArray = [];
    $monstersArray[] = $monster->getId();

    if ($action === 'attack') {

        $hero->attack($monster);

        if ($monster->getHp() <= 0) {
            $monsterRepo = new MonsterRepository($db, new MonsterMapper);

            $monsters = $monsterRepo->findAll();
            shuffle($monsters);
            $monsterShuffle = $monsters[0];

            if ($monsterShuffle instanceof Dragon) {
                $monsterMegaAttackArray = [];
                $monsterMegaAttackArray[] = $monsterShuffle->attack($hero);
                $monsterMegaAttackArray[] = $monsterShuffle->megaAttack($hero);
                shuffle($monsterMegaAttackArray);
                $monsterAttack = $monsterMegaAttackArray[0];
            }

            // If the selected monster has already been fought, we shuffle the list again to pick a different one.
            if (in_array($monsterShuffle->getId(), $monstersArray)) {
                shuffle($monsters);
                $monsterShuffle = $monsters[0];
            }

            if (count($monsters) === count(array_unique($monstersArray))) {
                // if all monsters are defeated the game is finish
                echo json_encode([
                    'combatStatus' => 'You have beat all monsters, congratulations !'
                ]);
                exit();
            }

            $monstersArray[] = $monsterShuffle->getId();
            $_SESSION['monsterCharacter'] = $monsterShuffle;

            // Reset ressources selon le type
            $resetData = [
                'updateHeroHp' => $hero->getHp(),
                'updateMonsterHp' => $monster->getHp(),
                'resetHeroHp' => $hero->getMaxHp(),
                'combatStatus' => 'You win',
                'nextMonsterName' => $monsterShuffle->getName(),
                'nextMonsterHp' => $monsterShuffle->getHp(),
                'nextMonsterAtk' => $monsterAttack,
                'nextMonsterDef' => $monsterShuffle->getDef(),
                'nextMonsterType' => $monsterShuffle->getType(),
                'nextMonsterBackground' => $monsterShuffle->getBackgroundFight(),
                'nextMonsterCharacterImg' => $monsterShuffle->getCharacterImg(),
            ];

            if ($hero instanceof Guerrier) {
                $hero->setRage($hero->getMaxRage());
                $resetData['resetHeroRage'] = $hero->getRage();
            }
            if ($hero instanceof Magician) {
                $hero->setMana($hero->getMaxMana());
                $resetData['resetHeroMana'] = $hero->getMana();
            }
            echo json_encode($resetData);
            exit();
        }

        $monster->attack($hero);

        if ($hero->getHp() <= 0) {
            echo json_encode([
                'updateHeroHp' => $hero->getHp(),
                'updateMonsterHp' => $monster->getHp(),
                'combatStatus' => 'You lose'
            ]);
            exit();
        }


        echo json_encode([
            'updateHeroHp' => $hero->getHp(),
            'updateMonsterHp' => $monster->getHp(),
            'combatStatus' => 'in process'
        ]);
        exit();
    }


    // actions with rage
    if ($action === 'rage') {

        $hero->rageAttack($monster);

        if ($monster->getHp() <= 0) {
            $monsterRepo = new MonsterRepository($db, new MonsterMapper);
            $monsters = $monsterRepo->findAll();
            shuffle($monsters);
            $monsterShuffle = $monsters[0];

            if ($monsterShuffle instanceof Dragon) {
                $monsterMegaAttackArray = [];
                $monsterMegaAttackArray[] = $monsterShuffle->attack($hero);
                $monsterMegaAttackArray[] = $monsterShuffle->megaAttack($hero);
                shuffle($monsterMegaAttackArray);
                $monsterAttack = $monsterMegaAttackArray[0];
            }

            if (in_array($monsterShuffle->getId(), $monstersArray)) {
                shuffle($monsters);
                $monsterShuffle = $monsters[0];
            }



            if (count($monsters) === count(array_unique($monstersArray))) {
                // if all monsters are defeated the game is finish
                echo json_encode([
                    'combatStatus' => 'You have beat all monsters, congratulations !'
                ]);
                exit();
            }

            $monstersArray[] = $monsterShuffle->getId();
            $_SESSION['monsterCharacter'] = $monsterShuffle;

            $resetData = [
                'updateHeroHp' => $hero->getHp(),
                'updateMonsterHp' => $monster->getHp(),
                'resetHeroHp' => $hero->getMaxHp(),
                'combatStatus' => 'You win',
                'nextMonsterName' => $monsterShuffle->getName(),
                'nextMonsterHp' => $monsterShuffle->getHp(),
                'nextMonsterAtk' => $monsterAttack,
                'nextMonsterDef' => $monsterShuffle->getDef(),
                'nextMonsterType' => $monsterShuffle->getType(),
                'nextMonsterBackground' => $monsterShuffle->getBackgroundFight(),
                'nextMonsterCharacterImg' => $monsterShuffle->getCharacterImg(),
            ];

            if ($hero instanceof Guerrier) {
                $hero->setRage($hero->getMaxRage());
                $resetData['resetHeroRage'] = $hero->getRage();
            }

            echo json_encode($resetData);
            exit();
        }

        $monster->attack($hero);

        if ($hero->getHp() <= 0) {
            echo json_encode([
                'updateHeroHp' => $hero->getHp(),
                'updateMonsterHp' => $monster->getHp(),
                'updateHeroRageAttack' => $monster->getRage(),
                'combatStatus' => 'You lose'
            ]);
            exit();
        }


        echo json_encode([
            'updateHeroHp' => $hero->getHp(),
            'updateHeroRageAttack' => $hero->getRage(),
            'updateMonsterHp' => $monster->getHp(),
            'combatStatus' => 'in process'
        ]);
        exit();
    }

    // actions with mana
    if ($action === 'mana') {

        $hero->manaAttack($monster);

        if ($monster->getHp() <= 0) {
            $monsterRepo = new MonsterRepository($db, new MonsterMapper);
            $monsters = $monsterRepo->findAll();

            shuffle($monsters);
            $monsterShuffle = $monsters[0];

            if ($monsterShuffle instanceof Dragon) {
                $monsterMegaAttackArray = [];
                $monsterMegaAttackArray[] = $monsterShuffle->attack($hero);
                $monsterMegaAttackArray[] = $monsterShuffle->megaAttack($hero);
                shuffle($monsterMegaAttackArray);
                $monsterAttack = $monsterMegaAttackArray[0];
            }

            if (in_array($monsterShuffle->getId(), $monstersArray)) {
                shuffle($monsters);
                $monsterShuffle = $monsters[0];
            }

            if (count($monsters) === count(array_unique($monstersArray))) {
                // if all monsters are defeated the game is finish
                echo json_encode([
                    'combatStatus' => 'You have beat all monsters, congratulations !'
                ]);
                exit();
            }

            $monstersArray[] = $monsterShuffle->getId();
            $_SESSION['monsterCharacter'] = $monsterShuffle;

            $resetData = [
                'updateHeroHp' => $hero->getHp(),
                'updateMonsterHp' => $monster->getHp(),
                'resetHeroHp' => $hero->getMaxHp(),
                'combatStatus' => 'You win',
                'nextMonsterName' => $monsterShuffle->getName(),
                'nextMonsterHp' => $monsterShuffle->getHp(),
                'nextMonsterAtk' => $monsterAttack,
                'nextMonsterDef' => $monsterShuffle->getDef(),
                'nextMonsterType' => $monsterShuffle->getType(),
                'nextMonsterBackground' => $monsterShuffle->getBackgroundFight(),
                'nextMonsterCharacterImg' => $monsterShuffle->getCharacterImg(),
            ];

            if ($hero instanceof Magician) {
                $hero->setMana($hero->getMaxMana());
                $resetData['resetHeroMana'] = $hero->getMana();
            }
            echo json_encode($resetData);
            exit();
        }

        $monster->attack($hero);

        if ($hero->getHp() <= 0) {
            echo json_encode([
                'updateHeroHp' => $hero->getHp(),
                'updateMonsterHp' => $monster->getHp(),
                'combatStatus' => 'You lose'
            ]);
            exit();
        }


        echo json_encode([
            'updateHeroHp' => $hero->getHp(),
            'updateHeroManaAttack' => $hero->getMana(),
            'updateMonsterHp' => $monster->getHp(),
            'combatStatus' => 'in process'
        ]);
        exit();
    }
}
