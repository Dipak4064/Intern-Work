import "../App.css";
import { useContext, useRef } from "react";
import styles from "./AddItem.module.css";
import { BiSolidMessageAltAdd } from "react-icons/bi";
import { TodoItemContext } from "../store/items-store";

function AddItem() {
  let newItem = useRef();
  let newDate = useRef();
  let item = "";
  let date = "";
  let {getNewItem} = useContext(TodoItemContext);
  const callingParent = (event) => {
    event.preventDefault();
    item = newItem.current.value;
    date = newDate.current.value;
    newItem.current.value = "";
    newDate.current.value = "";
    getNewItem(item, date);
  };
  return (
    <div className="container">
      <div className="row">
        <div className="col-4">
          <input
            type="text"
            ref={newItem}
            placeholder="Enter The Task"
            className={styles.input}
          />
        </div>
        <div className="col-4 ">
          <input
            type="date"
            ref={newDate}
            className={styles.input}
          />
        </div>
        <div className="col-3">
          <button
            id="add"
            title="add"
            type="submit"
            className="btn btn-success"
            onClick={(event) => {
              if (
                newItem.current.value.length != 0 &&
                newDate.current.value.length != 0
              ) {
                callingParent(event);
              } else {
                window.alert("you need to put Item and Date!");
              }
            }}
          >
            <BiSolidMessageAltAdd />
          </button>
        </div>
      </div>
    </div>
  );
}
export default AddItem;
