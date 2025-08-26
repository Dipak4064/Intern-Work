import styles from "./TodoItem.module.css";
import { RiDeleteBin6Fill } from "react-icons/ri";

function TodoItem({ date, name, deleteItem }) {

  return (
    <>
      <div className="container">
        <div className="row">
          <div className={`col-4 ${styles.listContainer}`}>{name}</div>
          <div className={`col-4 ${styles.listContainer}`}>{date}</div>
          <div className="col-3">
            <button
              type="button"
              className="btn btn-danger"
              onClick={() => {
                deleteItem(name);
              }}
              title="name"
            >
              <RiDeleteBin6Fill />
            </button>
          </div>
        </div>
      </div>
    </>
  );
}
export default TodoItem;
