let create = document.querySelector(".create");
let notes = document.querySelector(".notes")

function showInfo() {
    notes.innerHTML = localStorage.getItem("data");
}
showInfo();

create.addEventListener("click", () => {
    let p = document.createElement("p");
    let img = document.createElement("img");
    img.src = "images/delete.png";
    p.setAttribute("contenteditable", "true");
    img.setAttribute("id", "delete-img");
    notes.appendChild(p).appendChild(img);
    saveInfo();
})

notes.addEventListener("click", (e) => {
    if (e.target.tagName === "IMG") {
        e.target.parentElement.remove();
        saveInfo();
    } else if (e.target.tagName === "P") {
       let note = document.querySelectorAll("p");
        console.log(note);
        note.forEach(nt => {
            nt.onkeyup = function () {
                saveInfo();
            }
        })
    }
})

document.addEventListener("keydown", e => {
    if (e.key == "Enter") {
        document.execCommand("insertLineBreak");
        e.preventDefault();
    }
})

function saveInfo() {
    localStorage.setItem("data", notes.innerHTML);
}
