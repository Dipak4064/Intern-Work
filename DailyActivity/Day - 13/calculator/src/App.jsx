import { useState } from "react";
import "./App.css";
import Button from "./component/button";
import Display from "./component/Display";
function App() {
  let arr = [
    "c",
    "1",
    "2",
    "+",
    "3",
    "4",
    "-",
    "5",
    "6",
    "*",
    "7",
    "8",
    "/",
    "=",
    "9",
    "0",
    ".",
  ];

  let [calVal, setVal] = useState("");

  const getVal = (item) => {
    let newVal = calVal + item;
    setVal(newVal);
  };
  return (
    <div className="container">
      <Display value={calVal} />
      <Button arr={arr} func={getVal}></Button>
    </div>
  );
}

export default App;
