let input = document.querySelector("input");
let gen = document.querySelector("button");
let length = document.querySelector("p span");
let lowercase = document.querySelector("#lowercase");
let uppercase = document.querySelector("#uppercase");
let specialsymbol = document.querySelector("#specialsymbol");
let slider = document.getElementById("slider");

let lowerChar = "abcdefghijklmnopqrstuvwxyz";
let upperChar = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
let symbol = "!#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
console.log(slider);
length.innerText = slider.value;
gen.addEventListener("click", () => {
    input.value = generatePassword();

    // let allChar = lowercase + uppercase + symbol;

})



function generatePassword() {
    let genPassword = "";
    let allChar = "";
    allChar += lowercase.checked ? lowerChar : "";
    allChar += uppercase.checked ? upperChar : "";
    allChar += specialsymbol.checked ? symbol : "";
    let i = 0;
    while (i < slider.value) {
        genPassword += allChar.charAt(Math.floor(Math.random() * allChar.length));
        i++;
    }
    return genPassword;
}