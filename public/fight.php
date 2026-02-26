<?php
session_start();
require_once "../utils/db_connect.php";
require_once "../utils/autoloader.php";

$title = "Fight";
require_once "./partials/page-infos.php";

if (!isset($_GET['idCharacter']) || empty(trim($_GET['idCharacter'])) || !ctype_digit($_GET['idCharacter'])) {
    header('location: ./choice-character.php');
    exit();
};

$heroId = (int)$_GET['idCharacter'];
$heroRepo = new HeroRepository($db, new HeroMapper);
$hero = $heroRepo->findOneById($heroId);

$_SESSION['heroCharacter'] = $hero;

$monsterRepo = new MonsterRepository($db, new MonsterMapper);
$monsters = $monsterRepo->findAll();

shuffle($monsters);
$monster = $monsters[0];

$_SESSION['monsterCharacter'] = $monster;

/** @var Monster $monster */

?>

<script defer src="./assets/scripts/fight.js"></script>
</head>

<body style="background-image: url('<?= $monster->getBackgroundFight() ?>')" class="w-full min-h-svh bg-cover bg-center bg-no-repeat">

    <p id="description-screen" class="sr-only"> Le combat commence, touche q pour attaquer, s pour la rage si vous avez choisi guerrier ou d pour le mana des magiciens.</p>
    <main class="w-full min-h-svh flex flex-col items-center justify-between pb-10 gap-8 pt-8">

        <!-- buttons partials for play -->
        <?php
        require_once "./partials/fight-buttons.php";
        ?>

        <div>
            <p id="final-result" class="text-[96px] text-font-oswald font-bold"></p>
        </div>

        <div class="w-full flex flex-row justify-around ">
            <!-- Hero partial with stats and character img -->
            <?php
            require_once "./partials/hero-fight-partial.php";
            ?>

            <!-- monster partial with stats and character img -->
            <?php
            require_once "./partials/monster-fight-partial.php";
            ?>
        </div>
    </main>

    <?php
    require_once "./partials/footer.php";
    ?>