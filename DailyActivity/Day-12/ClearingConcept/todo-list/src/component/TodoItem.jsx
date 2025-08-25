import styles from "./TodoItem.module.css";
function TodoItem({ date, name }) {
  return (
    <>
      <div className="container">
        <div className="row">
          <div className={`col-4 ${styles.listContainer}`}>{name}</div>
          <div className={`col-4 ${styles.listContainer}`}>{date}</div>
          <div className="col-3">
            <button type="button" className="btn btn-danger">
              Delete
            </button>
          </div>
        </div>
      </div>
    </>
  );
}
export default TodoItem;
