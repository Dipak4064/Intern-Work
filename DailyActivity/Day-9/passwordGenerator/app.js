let input = document.querySelector("#password");
let gen = document.querySelector("button");
let length = document.querySelector("p span");
let lowercase = document.querySelector("#lowercase");
let uppercase = document.querySelector("#uppercase");
let specialsymbol = document.querySelector("#specialsymbol");
let slider = document.getElementById("slider");
let clipboard = document.querySelector(".input-field span");

let lowerChar = "abcdefghijklmnopqrstuvwxyz";
let upperChar = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
let symbol = "!#$%&'()*+,-./:;<=>?@[\]^_`{|}~";

length.innerText = slider.value;
slider.addEventListener("input", () => {
    length.innerText = slider.value;
});

gen.addEventListener("click", () => {
    input.value = generatePassword();
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

clipboard.addEventListener("click", () => {
    if (input.value != "" && input.value.length >= 1) {
        navigator.clipboard.writeText(input.value);
        clipboard.innerText = "check";
        clipboard.title = "copied!";
        setTimeout(() => {
            clipboard.innerText = "content_copy";
        }, 500);
    }
})