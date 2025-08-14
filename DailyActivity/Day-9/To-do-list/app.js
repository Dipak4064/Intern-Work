let input = document.querySelector("input");
let list = document.querySelector(".list-task");
let btn = document.querySelector("button");

btn.addEventListener("click", () => {
    let task = input.value.trim();
    if (task == "") {
        alert("you must write something!");
    } else {
        console.log(task);
        let todo = document.createElement("li");
        todo.textContent = task;
        list.appendChild(todo);
        let span = document.createElement("span");
        span.textContent = "X";
        todo.appendChild(span);
    }
    input.value = "";
    input.focus();
    saveData();
})

list.addEventListener("click", (e) => {
    if (e.target.tagName === "LI") {
        e.target.classList.toggle("checked");
        saveData();
    } else if (e.target.tagName == "SPAN") {
        e.target.parentElement.remove();
        saveData();
    }
    console.log(e);
}, false);

function saveData() {
    localStorage.setItem("data", list.innerHTML);
}
function showTask() {
    list.innerHTML = localStorage.getItem("data");
}
showTask();