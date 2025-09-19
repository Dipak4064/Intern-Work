import "./App.css";
import "bootstrap/dist/css/bootstrap.min.css";
import AddItem from "./component/AddItem";
import TodoHeading from "./component/todoHeading";
import TodoItems from "./component/TodoItems";
import WelcomeMessage from "./component/WelcomeMessage";
import TodoItemContextProvider from "./store/items-store";

function App() {
  return (
    <TodoItemContextProvider>
      <center>
        <TodoHeading />
        <AddItem></AddItem>
        <WelcomeMessage></WelcomeMessage>
        <TodoItems></TodoItems>
      </center>
    </TodoItemContextProvider>
  );
}

export default App;
