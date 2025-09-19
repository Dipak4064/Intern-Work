/*console.log("call back hell");
function getData(dataId, getNextData) {
    setTimeout(() => {
        console.log("Data: ", dataId);
        if (getNextData) {
            getNextData();
        }
    }, 1000);
}
getData(1, () => {
    getData(2, () => {
        getData(3, () => {
            getData(4);
        });
    })
});*/

/*
console.log("Promises");
function chaining(getData, nextData) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            console.log("Data: ", getData);
            resolve("success");
        }, 5000);
    })
}
let result = chaining(123, () => { });

console.log("Getting Status From API");
let getPromise = () => {
    return new Promise((resolve, reject) => {
        console.log("i am promise producer");
        // resolve("success");
        reject("Network Error");
    })
}
let promise = getPromise();
promise.then((res) => {
    console.log("Promises Fullfilled", res);
})
promise.catch((err) => {
    console.log("Promise Rejected!", err);
})*/


/*
console.log("Promise Chaining!");
//First Way
function asyncFunction() {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            console.log("Data1");
            resolve("success!");
        }, 1000);
    })
}
function asyncFunction2() {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            console.log("Data2");
            resolve("success!");
        }, 4000);
    })
}
let fetching = asyncFunction();
console.log("getting data1.........");
fetching.then((res) => {
    console.log(res);
    setTimeout(() => {
        console.log("getting data2.........");
    }, 1000);
    let fetching2 = asyncFunction2();
    fetching2.then((res) => {
        console.log(res);
    })
}) 
function getData(data) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            console.log("Data: ", data);
            resolve("Sucess!");
        }, 500);
    });
}
//Second Way
getData(1).then((res) => {
    console.log(res);
    console.log("Fetching Another Data.........");
    getData(2).then((res) => {
        console.log(res);
    })
})
//third way
getData(1).then((res) => {
    console.log(res);
    console.log("fething another data.............");
    return getData(2);
}).then((res) => {
    console.log(res);
    console.log("fething another data.............");
    return getData(3);
}).then((res) => {
    console.log(res);
    console.log("End The Data Fetching")
})*/

console.log("Async & Await!");
function api(data) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            console.log("weather data ",data);
            resolve("success!");
        }, 1000);
    })
}
async function getWeather() {
    await api(1);
    await api(2);
}
console.log(getWeather());