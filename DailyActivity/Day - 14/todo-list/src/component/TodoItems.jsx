import TodoItem from "./TodoItem";
function TodoItems({ list, deleteItem }) {
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
