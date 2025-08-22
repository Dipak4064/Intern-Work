import "../App.css"
function AddItem() {
  return (
    <div className="container">
      <div className="row">
        <div className="col-4">
          <input type="text" placeholder="Enter The Task" />
        </div>
        <div className="col-4 ">
          <input type="date" />
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
