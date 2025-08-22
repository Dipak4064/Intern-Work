function TodoItem({ date, name }) {
  return (
    <>
      <div className="container">
        <div className="row">
          <div className="col-4 list-container">{name}</div>
          <div className="col-4 list-container">{date}</div>
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
