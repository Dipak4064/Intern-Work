let user = [];
let seq = [];

const array = ["green", "red", "yellow", "orange"];
let started = false;
let level = 0;
let p = document.querySelector("p");

document.addEventListener("keypress", function () {
    if (started == false) {
        console.log("game started.");
        started = true;
        levelUp();
    }
});

function btnFlash(btn) {
    btn.classList.add("flash");
    setTimeout(function (){
        btn.classList.remove("flash");
    },300);
}
function userFlash(btn) {
    btn.classList.add("userflash");
    setTimeout(function (){
        btn.classList.remove("userflash");
    },300);
}

function levelUp() {
    user = [];
    level++;
    p.innerText = `Level ${level}`;
    const random = Math.floor(Math.random() * 4);
    let color = array[random];
    let btn = document.querySelector(`.${color}`);
    seq.push(color);
    console.log(seq);
    btnFlash(btn);
}

function btnPress() {
    let btn = this;
    userFlash(btn);
    let color = btn.getAttribute("id");
    user.push(color);
    ansCheck(user.length - 1);
}
function ansCheck(idx) {
        if (user[idx] == seq[idx]) {
        if(seq.length == user.length){
            // levelUp();
            setTimeout(levelUp, 1000);
        }
    } else {
            p.innerText = `You Scored ${level} Game over press any key to game start!`;
            document.querySelector("body").style.backgroundColor = "red";
            setTimeout(function () {
                document.querySelector("body").style.backgroundColor = "white";
            }, 500);
            reset();
    }
}
let allBtn = document.querySelectorAll(".btn");
for (btn of allBtn) {
    btn.addEventListener("click", btnPress);
}

function reset() {
    started = false;
    user = [];
    seq = [];
    level = 0;
}