<?php
session_start();

require_once "../utils/db_connect.php";
require_once "../utils/autoloader.php";

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

if (!isset($data['type']) || empty(trim($data['type'])) || !is_string($data['type'])) {
    echo json_encode([
        'error' => 'datas not exist'
    ]);

    exit();
}

if (empty(trim($data['type']))) {
    echo json_encode([
        'error' => "datas can't be empty"
    ]);

    exit();
}

if (!is_string($data['type'])) {
    echo json_encode([
        'error' => 'datas format error'
    ]);

    exit();
}

