let h1 = document.querySelector("h1");
let pause = document.querySelector("#pause");
let play = document.querySelector("#play");
let reset = document.querySelector("#reset");
let second = 0;
let minute = 0;
let hour = 0;
let timer = null;

play.addEventListener("click", () => {
    startWatch();
})

function stopWatch() {
    second++;
    if (second == 60) {
        minute++;
        second = 0;
        if (minute == 60) {
            hour++;
            minute = 0;
        }
    }
    let s = second < 10 ? "0" + second : second;
    let m = minute < 10 ? "0" + minute : minute;
    let h = hour < 10 ? "0" + hour : hour;
    h1.innerText = h + ":" + m + ":" + s;
}

function startWatch() {
    if (timer !== null) {
        clearInterval(timer);
    }
    timer = setInterval(stopWatch, 1000);
}

pause.addEventListener("click", () => {
    stop();
})
function stop() {
    clearInterval(timer);
}

reset.addEventListener("click", () => {
    reseting();
})
function reseting() {
    clearInterval(timer);
    second = 0;
    minute = 0;
    hour = 0;
    h1.innerText = "00:00:00";
}