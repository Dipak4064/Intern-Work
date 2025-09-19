import "./App.css";
import "bootstrap/dist/css/bootstrap.min.css";
import AddItem from "./component/addItem";
import TodoHeading from "./component/todoHeading";
import TodoItems from "./component/TodoItems";
import WelcomeMessage from "./component/WelcomeMessage";
import { TodoItemContext } from "./store/items-store";
import { useState } from "react";

function App() {
  let [items, setItems] = useState([]);
  const getNewItem = (item, date) => {
    setItems((currValue) => [...currValue, { name: item, date: date }]);
  };
  const deleteItem = (name) => {
    let newItemList = items.filter((item) => item.name !== name);
    window.alert(name + " was deleted.");
    setItems(newItemList);
  };
  return (
    <TodoItemContext.Provider
      value={{ items: items, getNewItem: getNewItem, deleteItem: deleteItem }}
    >
      <center>
        <TodoHeading />
        <AddItem ></AddItem>
        <WelcomeMessage ></WelcomeMessage>
        <TodoItems></TodoItems>
      </center>
    </TodoItemContext.Provider>
  );
}

export default App;
