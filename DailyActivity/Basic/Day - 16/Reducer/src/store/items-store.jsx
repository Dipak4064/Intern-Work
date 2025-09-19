import { createContext } from "react";
export const TodoItemContext = createContext({
  items: [],
  getNewItem: () => {},
  deleteItem: () => {},
});
const TodoItemContextProvider = ({ children }) => {
  const [items, dispatchTodoItems] = useReducer(todoITemsReducer, []);

  const getNewItem = (item, date) => {
    const newItemAction = {
      type: "New_ITEM",
      payload: {
        item,
        date,
      },
    };
    dispatchTodoItems(newItemAction);
  };

  const deleteItem = (item) => {
    const newItemAction = {
      type: "DELETE_ITEM",
      payload: {
        item,
      },
    };
    dispatchTodoItems(deleteItem);
  };

  return (
    <TodoItemContext.Provider
      value={{ items: items, getNewItem: getNewItem, deleteItem: deleteItem }}
    >
      {children}
    </TodoItemContext.Provider>
  );
};

function todoITemsReducer(currValue, action) {
  let newItem = currValue;
  if (action.type === "NEW_ITEM") {
    newItem = [
      ...currValue,
      { name: action.payload.item, date: action.payload.date },
    ];
  } else if (action.type === "DELETE_ITEM") {
    newItem = currValue.filter((items) => items.name !== action.payload.item);
    window.alert(item + " item deleted.");
  }
  return newItem;
}

export default TodoItemContextProvider;
