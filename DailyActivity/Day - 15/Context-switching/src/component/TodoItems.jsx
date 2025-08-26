import TodoItem from "./TodoItem";
import { useContext } from "react";
import { TodoItemContext } from "../store/items-store";

function TodoItems({ deleteItem }) {
  const list = useContext(TodoItemContext);
  return (
    <>
      {list.map((item) => {
        return (
          <TodoItem
            date={item.date}
            name={item.name}
            key={item.name}
            deleteItem={deleteItem}
          ></TodoItem>
        );
      })}
    </>
  );
}
export default TodoItems;
