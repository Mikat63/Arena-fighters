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

function updateScreenInfos(data) {
    if(data['error'])
        {
            window.location = './choice-character.php' 
        }


  if (data["fighterDamage"] === "hero") {
    heroHpValue.textContent = data["updateHp"];
  } else {
    monsterHpValue.textContent = data["updateHp"];
  }

  if (heroRageValue) {
    heroRageValue.textContent = data["heroRage"];
  }

  if (heroManaValue) {
    heroManaValue.textContent = data["heroMana"];
  }

  if (data["combatStatus"] === "heroWin") {
    finalResult.textContent = data["combatStatus"];
    finalResult.classList.add("text-green-900");

    setTimeout(() => {
      window.location = "./choice-character.php";
    }, 3000);
  }

  if (data["combatStatus"] === "heroLose") {
    finalResult.textContent = data["combatStatus"];
    finalResult.classList.add("text-red-900");

    setTimeout(() => {
      window.location = "./choice-character.php";
    }, 3000);
  }
}
