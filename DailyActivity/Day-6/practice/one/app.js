let userseq = [];
let gameseq = [];

let started = false;
let level = 0;
let highScore = 0;
let h2 = document.querySelector("h2");
let h1 = document.querySelector(".h1");
const colorArry = ["green", "red", "yellow", "orange"];


document.addEventListener("keypress", function () {
    if (started == false) {
        console.log("game start");
        started = true;
        levelUp();
    }
})

function levelUp() {
    userseq = [];
    level++;
    console.log("Level", level);
    h2.innerText = `Level ${level}`;
    let random = Math.floor(Math.random() * 4);
    let color = colorArry[random];
    gameseq.push(color);
    console.log(gameseq);
    gameflash(color);
}

function gameflash(color) {
    let btn = document.querySelector(`#${color}`);
    let colorr = btn.getAttribute("id");
    btn.classList.add("gameflash");
    setTimeout(function () {
        btn.classList.remove("gameflash");
    }, 300);
}
function userflash(color) {
    let btn = document.querySelector(`#${color}`);
    btn.classList.add("userflash");
    setTimeout(function () {
        btn.classList.remove("userflash");
    }, 300);
}

let btns = document.querySelectorAll(".btn");
for (let btn of btns) {
    btn.addEventListener("click", () => {
        let color = btn.getAttribute("id");
        userseq.push(color);
        userflash(color);
        let idx = userflash.length - 1;
        checkAns(idx);
    }
    );
}

function checkAns(idx) {
    if (userseq[idx] == gameseq[idx]) {
        if (userseq.length == gameseq.length) {
            setTimeout(levelUp, 800);
        }
    } else {
        if (highScore < level) {
            highScore = level;
            h2.innerHTML = `Highest Score ${level}`;
            h1.innerHTML = "Game Over<br>Press any key to start</h3>";
        } else {
            h2.innerHTML = `Your Score ${level}`;
            h1.innerHTML = "Game Over<br>Press any key to start";
        }
        document.querySelector("body").style.backgroundColor = "red";
        setTimeout(function () {
            document.querySelector("body").style.backgroundColor = "white";
        }, 300);
        resetGame();
    }
}

function resetGame() {
    gameseq = [];
    userseq = [];
    started = false;
    level = 0;
}


