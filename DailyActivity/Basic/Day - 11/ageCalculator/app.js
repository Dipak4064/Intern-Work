let dob = document.getElementById("date");
dob.max = new Date().toISOString().split("T")[0];
let btn = document.querySelector("button");
let p = document.querySelector("p");

function calculateAge() {
    let birthDate = new Date(dob.value);
    let day = birthDate.getDate();
    let month = birthDate.getMonth();
    let year = birthDate.getFullYear();

    let today = new Date();
    let tday = today.getDate();
    let tmonth = today.getMonth();
    let tyear = today.getFullYear();
    let cday, cmonth, cyear;
    
    cyear = tyear - year;

    if (tmonth >= month) {
        cmonth = tmonth - month;
    } else {
        tyear--;
        cmonth = 12 + tmonth - month;
    }
    if (tday >= day) {
        cday = tday - day;
    } else {
        cmonth--;
        cday = getDaysInMonth(year, month) + tday - day;
    }
    if (cmonth < 0) {
        cmonth = 11;
        cyear--;
    }
    p.innerHTML = `You are ${cyear} years, ${cmonth} months and ${cday} days old`
}

function getDaysInMonth(year, month) {
    //calculate the days of the month
    return new Date(year, month, 0).getDate();
}
btn.addEventListener("click", () => {
    calculateAge();
})