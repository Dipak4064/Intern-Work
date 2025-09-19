import "../App.css";
import { useRef } from "react";
import styles from "./AddItem.module.css";
import { BiSolidMessageAltAdd } from "react-icons/bi";
function AddItem({ passItem }) {
  // let [item, setItem] = useState("");
  // let [date, setDate] = useState("");
  let newItem = useRef();
  let newDate = useRef();
  // const itemGet = (event) => {
  //   setItem(event.target.value);
  // };
  // const dateGet = (event) => {
  //   setDate(event.target.value);
  // };
  const callingParent = (event) => {
    event.preventDefault();
    let item = newItem.current.value;
    let date = newDate.current.value;
    newItem.current.value = "";
    newDate.current.value = "";
    passItem(item, date);
    // setItem("");
    // setDate("");
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
            // onChange={itemGet}
            // value={item}
          />
        </div>
        <div className="col-4 ">
          <input
            type="date"
            ref={newDate}
            className={styles.input}
            // onChange={dateGet}
            // value={date}
          />
        </div>
        <div className="col-3">
          <button
            id="add"
            title="add"
            type="submit"
            className="btn btn-success"
            onClick={(event) => {
              if (newItem.length != 0 && newDate.length != 0) {
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
