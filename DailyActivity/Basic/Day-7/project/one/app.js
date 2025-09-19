let game = document.querySelectorAll("button");
let newGame = document.querySelector("a");
let h1 = document.querySelector("h1");
let trun = false;
let combination = [
    [0, 1, 2],
    [0, 3, 6],
    [0, 4, 8],
    [1, 4, 7],
    [2, 5, 8],
    [2, 4, 6],
    [3, 4, 5],
    [6, 7, 8]
]
game.forEach((e) => {
    e.addEventListener("click", () => {
        if (trun == false) {
            e.innerText = "X";
            trun = true;
        } else {
            e.innerText = "O";
            trun = false;
        }
        e.disabled = true;
        winner();
    })
})

let winner = () => {
    for (pattern of combination) {
        let one = game[pattern[0]].innerText;
        let two = game[pattern[1]].innerText;
        let three = game[pattern[2]].innerText;
        console.log(pattern[0], pattern[1], pattern[2]);
        console.log(one, two, three);
        
        if (one != "" && two != "" && three != "") {
            if (one == two && two == three) {
                console.log("game win", one);
                h1.innerText = `Game Won by ${one}`;
                disabledbox();
            } else {
                console.log("draw the game");
            }
        }
    }
}

function disabledbox() {
    for (let btn of game) {
        btn.disabled = true;
    }
}
function enablebox() {
    for (let btn of game) {
        btn.disabled = false;
        btn.innerText = "";
    }
}

let resetGame = () => {
    turn = false;
    enablebox();
}

newGame.addEventListener("click", () => {
    resetGame();
})