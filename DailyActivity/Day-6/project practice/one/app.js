let input = document.querySelector("input");
// console.log(input);

let btn = document.querySelectorAll("button");
// console.log(btn);
let result = "";
let cal = "";

let arr = Array.from(btn);

arr.forEach((button) => {
    button.addEventListener("click", (e) => {
        if (e.target.innerHTML == "=") {
            cal = eval(result);
            input.value = cal;
            result = cal;
        } else if (e.target.innerHTML == "AC") {
            result = "";
            input.value = result;
        } else if (e.target.innerHTML == "DEL") {
            result = result.substring(0, result.length - 1);
            input.value = result;
        } else if (e.target.innerHTML == "0") {
            if (cal > 0) {
                result = "";
            }
            result += e.target.innerHTML;
            input.value = result;

        }
        else if (e.target.innerHTML == "1") {
            if (cal > 0) {
                result = "";
            }
            result += e.target.innerHTML;
            input.value = result;

        } else if (e.target.innerHTML == "2") {
            if (cal > 0) {
                result = "";
            }
            result += e.target.innerHTML;
            input.value = result;

        } else if (e.target.innerHTML == "3") {
            if (cal > 0) {
                result = "";
            }
            result += e.target.innerHTML;
            input.value = result;

        } else if (e.target.innerHTML == "4") {
            if (cal > 0) {
                result = "";
            }
            result += e.target.innerHTML;
            input.value = result;

        } else if (e.target.innerHTML == "5") {
            if (cal > 0) {
                result = "";
            }
            result += e.target.innerHTML;
            input.value = result;

        } else if (e.target.innerHTML == "6") {
            if (cal > 0) {
                result = "";
            }
            result += e.target.innerHTML;
            input.value = result;

        } else if (e.target.innerHTML == "7") {
            if (cal > 0) {
                result = "";
            }
            result += e.target.innerHTML;
            input.value = result;

        } else if (e.target.innerHTML == "8") {
            if (cal > 0) {
                result = "";
            }
            result += e.target.innerHTML;
            input.value = result;

        } else if (e.target.innerHTML == "9") {
            if (cal > 0) {
                result = "";
            }
            result += e.target.innerHTML;
            input.value = result;

        } else {
            result += e.target.innerHTML;
            cal = 0;
            input.value = result;
        }
    })
})

