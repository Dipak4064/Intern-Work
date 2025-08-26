import { useContext } from "react";
import { TodoItemContext } from "../store/items-store";
const welcomeMessage = () => {
  const list = useContext(TodoItemContext);
  return list.length === 0 && <h1>Enjoy Your Day!</h1>;
};
export default welcomeMessage;
