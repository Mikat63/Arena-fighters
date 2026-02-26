<?php

if (!isset($_SESSION['heroCharacter']) || empty(trim($_SESSION['heroCharacter'])) || !is_object($_SESSION['heroCharacter'])) {
    header('location: ./choice-character.php');
    exit();
}
