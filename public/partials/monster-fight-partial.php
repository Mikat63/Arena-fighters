<div class="flex flex-row">
    <div class="monsterCharacter shrink-0 ">
        <div class="flex flex-col items-center justify-center mb-2">
            <h3 class="text-white font-family-oswald font-bold  md:text-[20px] "><?= htmlspecialchars(strip_tags($monster->getName())) ?></h3>
            <p id="monster-hp-value" class=" text-[20px] font-family-oswald text-white font-bold">HP : <?= $monster->getHp() ?></p>
        </div>
        <img class="w-full h-auto max-h-60 md:max-h-80 object-contain" src="<?= htmlspecialchars(strip_tags($monster->getCharacterImg())) ?>" alt="Personnage <?= htmlspecialchars(strip_tags($monster->getName())) ?>">
    </div>

    <div class="flex flex-col">
        <p class=" text-[20px] text-white font-family-oswald font-bold">ATK : <?= $monster->getAtk() ?></p>
        <p class=" text-[20px] text-white font-family-oswald font-bold">Def : <?= $monster->getDef() ?></p>
    </div>
</div>