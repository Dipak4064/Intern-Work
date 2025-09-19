let url = "https://opentdb.com/api.php?amount=5&type=multiple";
let btn = document.querySelectorAll(".btn");
let nextBtn = document.querySelector(".next");
let qn = document.querySelector("h2");
let div = document.querySelector(".option");
let no = 0;
let start = false;
let data = "";
let correctAns = "";
let score = 0;

let getQn = async () => {
    let promise = await fetch(url);
    data = await promise.json();
    showQuestion(data);
    start = true;
}

nextBtn.addEventListener("click", () => {
    if (start) {
        nextQn(data);
    } else {
        getQn();
    }
})

function showQuestion(arr) {
    console.log(arr);
    no++;
    let participiant = "";
    let question = arr.results[0].question;
    qn.innerText = `${no}. ${question}`;
    nextBtn.innerText = "next";
    let optionAns = arr.results[0].incorrect_answers;
    correctAns = arr.results[0].correct_answer;
    optionAns.push(correctAns);
    optionAns.sort(() => Math.random() - 0.5);
    optionAns.forEach((opt) => {
        let btn = document.createElement("button");
        btn.innerText = opt;
        div.appendChild(btn);
    })
    console.log(correctAns);
}

div.addEventListener("click", (ele) => {
    if (ele.target.tagName == "BUTTON") {
        let participiant = ele.target;
        console.log(participiant);
        let userAns = participiant.innerText;
        let button = document.querySelectorAll(".option button");
        button.forEach((ele) => {
            if (ele.innerText == correctAns) {
                ele.classList.toggle("correct");
            }
            ele.disabled = true;
        })
        checkAns(userAns, participiant);
    }
})


function checkAns(userAns, btn) {
    if (userAns.trim() == correctAns.trim()) {
        score++;
        console.log(score);
    } else {
        btn.classList.toggle("incorrect");
    }
}

function nextQn(arr) {
    console.log(arr);
    let lengthy = arr.results.length;
    if (no < lengthy) {
        let arrayQn = arr.results[no];
        let question = arrayQn.question;
        no++;
        qn.innerText = `${no}. ${question}`;
        let optionAns = arrayQn.incorrect_answers;
        correctAns = arrayQn.correct_answer;
        optionAns.push(correctAns);
        optionAns.sort(() => Math.random() - 0.5);
        let button = document.querySelectorAll(".option button");
        button.forEach((btn) => {
            div.removeChild(btn);
        })
        optionAns.forEach((opt) => {
            let btn = document.createElement("button");
            btn.innerText = opt;
            div.appendChild(btn);
        })
        console.log(correctAns);
    } else {
        showScore();
    }
}

function showScore() {
    no = 0;
    let button = document.querySelectorAll(".option button");
    button.forEach((btn) => {
        div.removeChild(btn);
    })
    qn.innerText = `Your Score is ${score} out of 5`;
    nextBtn.innerText = "Start";
    start = false;
    score = 0;
}



