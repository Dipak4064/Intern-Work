import "./App.css";
import "bootstrap/dist/css/bootstrap.min.css";
import AddItem from "./component/addItem";
import TodoHeading from "./component/todoHeading";
import TodoItems from "./TodoItems";
function App() {
  const list = [
    {
      name: "Buy Milk",
      date: "2023/11/3",
    },
    {
      name: "Go To College",
      date: "2045/11/2",
    },
    {
      name: "Buy Vegetable",
      date: "2020/12/12",
    },
  ];
  return (
    <>
      <center>
        <TodoHeading />
        <AddItem></AddItem>
        <TodoItems list={list}></TodoItems>
      </center>
    </>
  );
}

export default App;
