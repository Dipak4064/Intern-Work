let user = [];
let com = [];

let color = ["green", "red", "yellow", "orange"];
let started = false;
let level = 0;
let highScore = 0;
let p = document.querySelector("p");
let h2 = document.querySelector("h2");

document.addEventListener("keypress", () => {
    if (started == false) {
        console.log("game start");
        started = true;
        levelUP();
    }
})

function btnFlash(color) {
    let btn = document.querySelector(`.${color}`);
    btn.classList.add("gameFlash");
    setTimeout(function () {
        btn.classList.remove("gameFlash");
    }, 500);
}
function userFlash(color) {
    let btn = document.querySelector(`.${color}`);
    btn.classList.add("userFlash");
    setTimeout(function () {
        btn.classList.remove("userFlash");
    }, 100);
}

function levelUP() {
    user = [];
    h2.innerText = "";
    level++;
    p.innerText = `Level ${level}`;
    let rdm = Math.floor(Math.random() * 4);
    let btn = color[rdm];
    com.push(btn);
    console.log(com);
    btnFlash(btn);
}

let btns = document.querySelectorAll(".btn");
for (let btn of btns) {
    btn.addEventListener("click", () => {
        let color = btn.getAttribute("id");
        user.push(color);
        console.log(user);
        userFlash(color);
        checkAns(user.length - 1);
    })
}

function checkAns(idx) {
    if (com[idx] == user[idx]) {
        if (com.length == user.length) {
            setTimeout(levelUP, 500);
        }
    } else {
        if (highScore < level) {
            highScore = level;
            p.innerText = `High Score ${highScore}`;
            h2.innerHTML = "Game Over <br> Press Any Key to Start";
        } else {
            p.innerText = `Score ${level}`;
            h2.innerHTML = "Game Over <br> Press Any Key to Start";
        }
        document.querySelector("body").style.backgroundColor = "red";
        setTimeout(() => {
            document.querySelector("body").style.backgroundColor = "white";
        }, 600);
        reset();
    }
}

function reset() {
    started = false;
    level = 0;
    com = [];
    user = [];
}