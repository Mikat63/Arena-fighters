<?php
require_once "../utils/db_connect.php";
require_once "../utils/autoloader.php";

$title = "choice-character";
require_once "./partials/page-infos.php";

$heroRepo = new HeroRepository($db, new HeroMapper);

$herosArray = $heroRepo->findAllByType();


?>
</head>

<body class="w-full min-h-svh bg-[url('public/assets/backgrounds/home-bg.gif')] bg-cover bg-center bg-no-repeat">
    <main class="flex flex-col items-center pb-10 gap-8 pt-8">
        <h1 class="font-family-oswald text-white text-[32px]">Choose your character</h1>

        <div class="flex flex-col items-center gap-6 w-[90%] xl:flex-row xl:justify-center xl:items-start">
            <?php
            foreach ($herosArray as $key => $heroArray) { ?>

                <div class="flex flex-col gap-4 items-center">

                    <h2 class="font-family-oswald text-white text-[28px] "><?= $key ?></h2>
                    <div class="flex flex-row gap-4 md:gap-6 justify-center flex-wrap md:flex-nowrap">
                        <?php
                        foreach ($heroArray as $hero) { ?>
                            <div class="heroClass w-[calc(50%-0.5rem)] md:w-48 shrink-0" data-heroId="<?= $hero->getId() ?>">
                                <div class="flex flex-row items-center justify-center mb-2">
                                    <h3 class="text-white font-family-manrope font-semibold text-[18px] md:text-[20px] "><?= htmlspecialchars(strip_tags($hero->getName())) ?></h3>
                                </div>
                                <img class="w-full h-auto max-h-60 md:max-h-80 object-contain" src="<?= htmlspecialchars(strip_tags($hero->getCharacterImg())) ?>" alt="Personnage <?= htmlspecialchars(strip_tags($hero->getName())) ?>">
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </main>

</body>


<?php
require_once "./partials/footer.php";
?>