const user = [];
const seq = [];

const array = ["green", "red", "yellow", "orange"];
let started = false;
let level = 0;

document.addEventListener("keypress", function () {
    if (started == false) {
        console.log("game started.");
        started = true;
        levelUp();
    }
});


function flash() {
    const random = Math.floor((Math.random() * 4));
    let node = document.getElementsByClassName(array[random]);
    node[0].classList.add('flash');
}

function levelUp() {
    
}