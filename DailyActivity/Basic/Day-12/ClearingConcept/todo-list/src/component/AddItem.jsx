import "../App.css";
import styles from "./AddItem.module.css";
function AddItem() {
  return (
    <div className="container">
      <div className="row">
        <div className="col-4">
          <input
            type="text"
            placeholder="Enter The Task"
            className={styles.input}
          />
        </div>
        <div className="col-4 ">
          <input type="date" className={styles.input} />
        </div>
        <div className="col-3">
          <button type="button" className="btn btn-success">
            Add
          </button>
        </div>
      </div>
    </div>
  );
}
export default AddItem;
