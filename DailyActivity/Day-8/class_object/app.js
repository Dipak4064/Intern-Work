const arr = ["dipak", "dipa", "sangam"]

const employe = {
    calTax() {
        console.log("tax rate is 10%");
    }
}

let dipak = {
    name: "dipak",
    calTax() {
        console.log("tax rate is 20%");
    }
}
dipak.__proto__ = employe;


class car {
    stop() {
        console.log("Stop");
    }
    start() {
        console.log("start");
    }
}

let furtuner = new car();
console.log(furtuner);


class user {
    constructor(name, email) {
        this.name = name;
        this.email = email;
    }
    dataView() {
        console.log("Name: ", this.name);
        console.log("Email: ", this.email);
    }
}

let dipa = new user("Dipak Tamang", "dt1414926@gmail.com");
console.log(dipa);