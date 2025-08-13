const dropdowns = document.querySelectorAll(".country select");
const img = document.querySelectorAll(".country img");
console.log(img);

for (drop of dropdowns) {
    for (code in countryList) {
        let option = document.createElement("option");
        option.innerText = code;
        option.value = code;
        drop.append(option);
        if (drop == "from") {
            updateFlag(code);
        } else if (drop == "to") {
            updateFlag(code);
        }
    }
}
function updateFlag(code) {
    for (pic of img) {
        pic.src = `"https://flagsapi.com/${code}/flat/64.png"`;
    }
}

