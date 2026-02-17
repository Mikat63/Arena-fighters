const heroCharacter = document.querySelectorAll(".heroCharacter");

heroCharacter.forEach((hero) => {
  hero.addEventListener("click", () => {
    console.log(hero.dataset.characterId);
    // window.location.href =
    //   "./fight.php?idCharacter=" + hero.dataset.characterId;
  });
});

heroCharacter.forEach((hero) => {
  hero.addEventListener("keydown", (event) => {
    if (event.key === "Enter") {
      window.location.href =
        "./fight.php?idCharacter=" + hero.dataset.characterId;
    }
  });
});
