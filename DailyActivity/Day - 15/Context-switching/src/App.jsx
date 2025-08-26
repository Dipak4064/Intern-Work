import "./App.css";
import "bootstrap/dist/css/bootstrap.min.css";
import AddItem from "./component/addItem";
import TodoHeading from "./component/todoHeading";
import TodoItems from "./component/TodoItems";
import WelcomeMessage from "./component/WelcomeMessage";
import { TodoItemContext } from "./store/items-store";
import { useState } from "react";
function App() {
  // const list = [
  //   {
  //     name: "Buy Milk",
  //     date: "2023/11/3",
  //   },
  //   {
  //     name: "Go To College",
  //     date: "2045/11/2",
  //   },
  //   {
  //     name: "Buy Vegetable",
  //     date: "2020/12/12",
  //   },
  // ];
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
    <TodoItemContext.Provider value={items}>
      <center>
        <TodoHeading />
        <AddItem passItem={getNewItem}></AddItem>
        {<WelcomeMessage items={items}></WelcomeMessage>}
        <TodoItems list={items} deleteItem={deleteItem}></TodoItems>
      </center>
    </TodoItemContext.Provider>
  );
}

export default App;
