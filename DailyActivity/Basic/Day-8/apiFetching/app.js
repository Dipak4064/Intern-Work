const url = "https://api.thecatapi.com/v1/images/search?limit=10";
let div = document.querySelector("div");
let button = document.querySelector("button");
console.log(div);

/*
//Way one for fetching the api
let getImg = async () => {
    console.log("Gettings Data.");
    let response = await fetch(url);
    let data = await response.json();
    console.log(data);
    for (let i = 0; i < 10; i++) {
        let img = document.createElement("img");
        img.src = data[i].url;
        div.appendChild(img);
    }
}
*/

// way two for fetching the api
let getImg = () => {
    fetch(url).then((response) => {
        console.log(response);
        return response.json();
    }).then((response) => {
        for (let i = 0; i < 10; i++) {
            let img = document.createElement("img");
            img.src = response[i].url;
            div.appendChild(img);
        }
    }).catch((err) => {
        button.innerText = err;
    })
}

button.addEventListener("click", () => {
    getImg();
})
