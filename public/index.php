<?php
require_once "../utils/db_connect.php";
require_once "../utils/autoloader.php";


$heroRepo = new HeroRepository($db, new HeroMapper);
var_dump($heroRepo->findOneById(2));
die();
