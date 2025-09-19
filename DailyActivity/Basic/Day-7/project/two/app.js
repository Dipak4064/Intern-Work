let btns = document.querySelectorAll("img");
let h1 = document.querySelector("h1");
let newG = document.querySelector("button");
let p = document.querySelector(".p");

let option = ["rock", "paper", "scissor"];
let winner = "";
let count = 0;

btns.forEach((btn) => {
    btn.addEventListener("click", () => {
        let userChoice = btn.getAttribute("id");
        evaluate(userChoice);
    })
})

let evaluate = (userChoice) => {
    let idx = Math.floor(Math.random() * 3);
    let comChoice = option[idx];
    if (userChoice == comChoice) {
        h1.innerText = "Draw Game";
        h1.removeAttribute("class");
    } else {
        if (userChoice == "rock") {
            winner = comChoice == "paper" ? false : true;
            winner = comChoice == "scissor" ? true : false;
        } else if (userChoice == "paper") {
            winner = comChoice == "scissor" ? false : true;
            winner = comChoice == "rock" ? true : false;
        } else {
            winner = comChoice == "paper" ? true : false;
            winner = comChoice == "rock" ? false : true;
        }
        determineWinner(winner);
    }
}

function determineWinner(winner) {
    if (winner) {
        count++;
        p.style.display = "block";
        h1.innerText = "You Win";
        h1.classList.remove("lost");
        h1.classList.add("won");
        p.innerHTML = `Your Score<br>${count}`;
        // p.innerText = `Your Score<br>${count}`;
    } else {
        h1.innerText = "You Lost";
        h1.classList.remove("win");
        h1.classList.add("lost");
    }
}

let newGame = () => {
    count = 0;
    h1.removeAttribute("class");
    p.style.display = "none";
}

newG.addEventListener("click", () => {
    newGame();
})