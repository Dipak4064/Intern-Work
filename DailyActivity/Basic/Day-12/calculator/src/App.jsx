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
  return (
    <div className="container">
      <Display/>
      <Button arr={arr}></Button>
    </div>
  );
}

export default App;
