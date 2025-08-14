const URL = "https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/eur.json";
// (async () => {
//     let promise = await fetch(URL);
//     console.log(await promise.json());
// })();

const dropdowns = document.querySelectorAll(".country select");
const btn = document.querySelector("button");
const input = document.querySelector(".container input");
const fromCurr = document.querySelector(".from select");
const toCurr = document.querySelector(".to select");
const p = document.querySelector("p");

for (drop of dropdowns) {
    for (code in countryList) {
        let option = document.createElement("option");
        option.innerText = code;
        option.value = code;
        if (drop.name == "from" && option.value == "USD") {
            option.selected = "selected";
        } else if (drop.name == "to" && option.value == "INR") {
            option.selected = "selected";
        }
        drop.append(option);
    }
    drop.addEventListener("change", (ele) => {
        updateImg(ele.target);
    })
}

function updateImg(ele) {
    let countryCode = countryList[ele.value];
    console.log(countryCode);
    let newSrc = `https://flagsapi.com/${countryCode}/flat/64.png`;
    let img = ele.parentElement.querySelector("img");
    img.src = newSrc;

}

btn.addEventListener("click", async () => {
    let amount = input.value;
    if (amount == "" || amount < 1) {
        input.value = 1;
        amount = 1;
    }
    console.log(amount);
    let obj = await fetch(URL);
    let data = await obj.json();
    let fromCon = fromCurr.value.toLowerCase();
    let toCon = toCurr.value.toLowerCase();
    let fromAmount = data["eur"][fromCon];
    let toAmount = data["eur"][toCon];
    console.log(fromAmount, toAmount);

    let exchangeAmount = Math.round(amount * (toAmount / fromAmount));
    console.log(exchangeAmount);
    p.innerText = `${amount} ${fromCurr.value} = ${exchangeAmount} ${toCurr.value}`;
})