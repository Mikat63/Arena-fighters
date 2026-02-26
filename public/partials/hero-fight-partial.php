    <div class="flex flex-row">
        <div class="flex flex-col">
            <p class=" text-[20px] text-white font-family-oswald font-bold">ATK : <?= $hero->getAtk() ?></p>
            <p class=" text-[20px] text-white font-family-oswald font-bold">Def : <?= $hero->getDef() ?></p>
            <?php if ($hero instanceof Guerrier) { ?>
                <p id="hero-rage" class=" text-[20px] text-white font-family-oswald font-bold">Rage : <?= $hero->getRage() ?></p>
            <?php } ?>
            <?php if ($hero instanceof Magician) { ?>
                <p id="hero-mana" class=" text-[20px] text-white font-family-oswald font-bold">Mana : <?= $hero->getMana() ?></p>
            <?php } ?>
        </div>
        <div class="heroCharacter shrink-0">
            <div class="flex flex-col items-center justify-center mb-2">
                <h3 class="text-white font-family-oswald font-bold text-[20px] "><?= htmlspecialchars(strip_tags($hero->getName())) ?></h3>
                <p id="hero-hp" class=" text-[20px] text-white font-family-oswald font-bold">HP : <?= $hero->getHp() ?></p>
            </div>
            <img class="w-full h-auto max-h-60 md:max-h-80 object-contain" src="<?= htmlspecialchars(strip_tags($hero->getCharacterImg())) ?>" alt="Personnage <?= htmlspecialchars(strip_tags($hero->getName())) ?>">
        </div>
    </div>