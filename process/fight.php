<?php
require_once "../utils/db_connect.php";
require_once "../utils/autoloader.php";
session_start();



header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');


$json = file_get_contents('php://input');
$data = json_decode($json, true);

// fetch treatment datas
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    echo json_encode([
        'error' => 'wrong method'
    ]);

    exit();
};

if (!isset($data['action'])) {
    echo json_encode([
        'error' => 'datas not exist'
    ]);

    exit();
}

if (empty(trim($data['action']))) {
    echo json_encode([
        'error' => "datas can't be empty"
    ]);

    exit();
}

if (!is_string($data['action'])) {
    echo json_encode([
        'error' => 'datas format error'
    ]);

    exit();
}

// combat logic
/** @var Hero $hero*/
/** @var Monster $monster*/

$hero = $_SESSION['heroCharacter'];
$monster = $_SESSION['monsterCharacter'];
$monstersArray = [];
$monstersArray[] = $monster->getId();


// actions with attack
if ($data['action'] === 'attack') {

    $hero->attack($monster);

    if ($monster->getHp() <= 0) {
        $monsterRepo = new MonsterRepository($db, new MonsterMapper);

        $monsters = $monsterRepo->findAll();
        shuffle($monsters);
        $monsterShuffle = $monsters[0];

        if (in_array($monsterShuffle->getId(), $monstersArray)) {
            shuffle($monsters);
            $monsterShuffle = $monsters[0];
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
            'nextMonsterAtk' => $monsterShuffle->getAtk(),
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
if ($data['action'] === 'rage') {

    $hero->rageAttack($monster);

    if ($monster->getHp() <= 0) {
        $monsterRepo = new MonsterRepository($db, new MonsterMapper);
        $monsters = $monsterRepo->findAll();
        shuffle($monsters);
        $monsterShuffle = $monsters[0];

        if (in_array($monsterShuffle->getId(), $monstersArray)) {
            shuffle($monsters);
            $monsterShuffle = $monsters[0];
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
            'nextMonsterAtk' => $monsterShuffle->getAtk(),
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
if ($data['action'] === 'mana') {

    $hero->manaAttack($monster);

    if ($monster->getHp() <= 0) {
        $monsterRepo = new MonsterRepository($db, new MonsterMapper);
        $monsters = $monsterRepo->findAll();

        shuffle($monsters);
        $monsterShuffle = $monsters[0];

        if (in_array($monsterShuffle->getId(), $monstersArray)) {
            shuffle($monsters);
            $monsterShuffle = $monsters[0];
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
            'nextMonsterAtk' => $monsterShuffle->getAtk(),
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
