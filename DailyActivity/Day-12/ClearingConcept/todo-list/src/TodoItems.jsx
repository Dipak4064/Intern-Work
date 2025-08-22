import TodoItem from "./component/TodoItem";
function TodoItems({ list }) {
  return (
    <>
      {list.map((item) => {
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
