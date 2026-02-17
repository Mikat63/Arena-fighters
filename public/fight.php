<?php
require_once "../utils/db_connect.php";
require_once "../utils/autoloader.php";

$title = "choice-character";
require_once "./partials/page-infos.php";

$heroRepo = new HeroRepository($db, new HeroMapper);

var_dump($_GET['idCharacter']);
die();
?>

<script defer src="./assets/scripts/fight.js"></script>
</head>

<body class="w-full min-h-svh bg-[url('public/assets/backgrounds/home-bg.gif')] bg-cover bg-center bg-no-repeat">