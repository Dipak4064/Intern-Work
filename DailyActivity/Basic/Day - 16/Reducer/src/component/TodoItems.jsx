import TodoItem from "./TodoItem";
import { useContext } from "react";
import { TodoItemContext } from "../store/items-store";

function TodoItems() {
  const {items} = useContext(TodoItemContext);
  return (
    <>
      {items.map((item) => {
        return (
          <TodoItem
            date={item.date}
            name={item.name}
            key={item.name}
          ></TodoItem>
        );
      })}
    </>
  );
}
export default TodoItems;
