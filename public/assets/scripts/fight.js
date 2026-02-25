// global variables
const descriptionScreen = document.querySelector("#description-screen");

// btn variables
const atkBtn = document.querySelector("#atk-btn");
const rageBtn = document.querySelector("#rage-btn");
const manaBtn = document.querySelector("#mana-btn");

// textContent Variables
const heroHpValue = document.querySelector("#hero-hp");
const heroManaValue = document.querySelector("#hero-mana");
const heroRageValue = document.querySelector("#hero-rage");
const monsterHpValue = document.querySelector("#monster-hp");
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

function updateScreenInfos(data) {
  // error message
  if (data["error"]) {
    window.location = "./choice-character.php";
  }

  //   update if exist
  if (data["updateHeroRageAttack"] !== undefined) {
    heroRageValue.textContent = `Rage: ${data["updateHeroRageAttack"]}`;
    
    if (data["updateHeroRageAttack"] === 0) {
      rageBtn.disabled = true;
      rageBtn.classList.add("opacity-50", "cursor-not-allowed");
    }
  }

  if (data["updateHeroManaAttack"] !== undefined) {
    heroManaValue.textContent = `Mana: ${data["updateHeroManaAttack"]}`;
    if (data["updateHeroManaAttack"] === 0) {
      manaBtn.disabled = true;
      manaBtn.classList.add("opacity-50", "cursor-not-allowed");
    }
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
      finalResult.textContent = "";
      atkBtn.disabled = false;
      atkBtn.classList.remove("opacity-50", "cursor-not-allowed");

      if (rageBtn) {
        rageBtn.disabled = false;
        rageBtn.classList.remove("opacity-50", "cursor-not-allowed");
      }

      if (manaBtn) {
        manaBtn.disabled = false;
        manaBtn.classList.remove("opacity-50", "cursor-not-allowed");
      }
    }, 4000);
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
  }, 1000);
}

function nextFight(data) {
  document.querySelector("#hero-hp").textContent = data["resetHeroHp"];

  if (data["resetHeroMana"] !== undefined) {
    document.querySelector("#hero-mana").textContent =
      `Mana: ${data["resetHeroMana"]}`;
  }

  if (data["resetHeroRage"] !== undefined) {
    document.querySelector("#hero-rage").textContent =
      `Rage: ${data["resetHeroRage"]}`;
  }

  document.body.style.backgroundImage = `url('${data["nextMonsterBackground"]}')`;
  document.querySelector("#monster-img").src = data["nextMonsterCharacterImg"];
  document.querySelector("#monster-name").textContent = data["nextMonsterName"];
  document.querySelector("#monster-hp").textContent = data["nextMonsterHp"];
  document.querySelector("#monster-atk").textContent = data["nextMonsterAtk"];
  document.querySelector("#monster-def").textContent = data["nextMonsterDef"];
}
