// global variables
const descriptionScreen = document.querySelector("#description-screen");

// btn variables
const atkBtn = document.querySelector("#atk-btn");
const rageBtn = document.querySelector("#rage-btn");
const manaBtn = document.querySelector("#mana-btn");

// textContent Variables
const heroHpValue = document.querySelector("#hero-hp-value");
const heroManaValue = document.querySelector("#hero-rage-value");
const heroRageValue = document.querySelector("#hero-mana-value");
const monsterHpValue = document.querySelector("#monster-hp-value");
const finalResult = document.querySelector("#final-result");

//  btn click listener
if (atkBtn) {
  atkBtn.addEventListener("click", () => {
    console.log("atk");

    sendAction("attack");
  });
}

if (rageBtn) {
  rageBtn.addEventListener("click", () => {
    sendAction("rage");
  });
}

if (manaBtn) {
  manaBtn.addEventListener("click", () => {
    console.log("atk");
    sendAction("mana");
  });
}

// keydown listener
window.addEventListener("keydown", (event) => {
  console.log("atk");
  const key = event.key.toLowerCase();

  if (key === "q") {
    sendAction("attack");
  }

  if (key === "s") {
    sendAction("rage");
  }

  if (key === "d") {
    sendAction("mana");
  }
});

// functions
function sendAction(type) {
  fetch("../process/fight.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      action: type,
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      updateScreenInfos(data);
    });
}

function nextFight(data) {
  document.body.style.backgroundImage = `url('${data["nextMonsterBackground"]}')`;
  document.querySelector("#monster-img").src = data["nextMonsterCharacterImg"];
  document.querySelector("#monster-name").textContent = data["nextMonsterName"];
  document.querySelector("#monster-atk").textContent = data["nextMonsterAtk"];
  document.querySelector("#monster-def").textContent = data["nextMonsterDef"];
}

function updateScreenInfos(data) {
  // error message
  if (data["error"]) {
    window.location = "./choice-character.php";
  }

  //   update if exist
  if (data["rageAttack"]) {
    heroRageValue.textContent = data["heroRage"];
  }

  if (data["manaAttack"]) {
    heroManaValue.textContent = data["heroMana"];
  }

  //   Combat result
  if (data["combatStatus"] === "You win") {
    atkBtn.disabled = true;
    atkBtn.classList.add("opacity-50", "cursor-not-allowed");

    if (rageBtn) {
      rageBtn.disabled = true;
      rageBtn.classList.add("opacity-50", "cursor-not-allowed");
    }

    if (manaBtn) {
      manaBtn.disabled = true;
      manaBtn.classList.add("opacity-50", "cursor-not-allowed");
    }

    finalResult.textContent = data["combatStatus"];
    finalResult.classList.add("text-green-900");

    setTimeout(() => {
      nextFight(data);
    }, 5000);
  }

  if (data["combatStatus"] === "You lose") {
    atkBtn.disabled = true;
    atkBtn.classList.add("opacity-50", "cursor-not-allowed");

    if (rageBtn) {
      rageBtn.disabled = true;
      rageBtn.classList.add("opacity-50", "cursor-not-allowed");
    }

    if (manaBtn) {
      manaBtn.disabled = true;
      manaBtn.classList.add("opacity-50", "cursor-not-allowed");
    }

    finalResult.textContent = data["combatStatus"];
    finalResult.classList.add("text-red-900");

    setTimeout(() => {
      window.location = "./choice-character.php";
    }, 5000);
  }

  //   combat attack
  monsterHpValue.textContent = data["updateMonsterHp"];

  setTimeout(() => {
    heroHpValue.textContent = data["updateHeroHp"];
  }, 1500);
}
