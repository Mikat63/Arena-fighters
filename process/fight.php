<?php
require_once "../utils/db_connect.php";
require_once "../utils/autoloader.php";
session_start();

// require functions
require_once "../utils/functions/sanitize-datas.php";
require_once "../utils/functions/attack-action.php";

// fetch access
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');


$json = file_get_contents('php://input');
$data = json_decode($json, true);


// fetch sanitize datas
sanitizeDatas($data, 'action');


// combat logic
/** @var Hero $hero*/
/** @var Monster $monster*/

$hero = $_SESSION['heroCharacter'];
$monster = $_SESSION['monsterCharacter'];
$monstersArray = [];
$monstersArray[] = $monster->getId();


// actions attacks
AttackAction($db, $data['action'], $hero, $monster);
