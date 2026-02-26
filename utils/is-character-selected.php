<?php

if (!isset($_SESSION['heroCharacter']) || !is_object($_SESSION['heroCharacter']) || !($_SESSION['heroCharacter'] instanceof Hero)) {

    header('location: ./choice-character.php');
    exit();
}
