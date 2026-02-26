<?php

function sanitizeDatas(array $fetchDatas, $key)
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

        echo json_encode([
            'error' => 'wrong method'
        ]);

        exit();
    };

    if (!isset($fetchDatas[$key])) {
        echo json_encode([
            'error' => 'datas not exist'
        ]);

        exit();
    }

    if (!is_string($fetchDatas[$key])) {
        echo json_encode([
            'error' => 'datas format error'
        ]);

        exit();
    }

    if (empty(trim($fetchDatas[$key]))) {
        echo json_encode([
            'error' => "datas can't be empty"
        ]);

        exit();
    }
}