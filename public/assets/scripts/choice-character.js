const heroCharacter = document.querySelectorAll(".heroCharacter");

heroCharacter.forEach((hero) => {
  hero.addEventListener("click", () => {
    window.location.href =
      "./fight.php?idCharacter=" + hero.dataset.characterid;
  });
});

heroCharacter.forEach((hero) => {
  hero.addEventListener("keydown", (event) => {
    if (event.key === "Enter") {
      window.location.href =
        "./fight.php?idCharacter=" + hero.dataset.characterid;
    }
  });
});
