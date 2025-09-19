import "./App.css";
import "bootstrap/dist/css/bootstrap.min.css";
import Display from "./component/Display";
import List from "./component/List";
import Container from "./component/container";
import InputField from "./component/InputField";
import { useState } from "react";
function App() {
  let [textValue, setText] = useState();
  let [food, setFood] = useState(["Dhal", "Bhat", "tarkari", "masu"]);

  const handleOnChange = (event) => {
    if (event.key === "Enter") {
      setText(event.target.value);
      let newFood = event.target.value;
      let newItem = [...food, newFood];
      setFood(newItem);
      event.target.value = "";
    }
  };

  return (
    <Container>
      <Display></Display>
      <InputField handleOnChange={handleOnChange}></InputField>
      <p>{textValue}</p>
      <List food={food}></List>
    </Container>
  );
}

export default App;
