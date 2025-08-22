import "../App.css";
function Item1() {
  return (
    <div className="container">
      <div className="row ">
        <div className="col-4 list-container">Buy Milk</div>
        <div className="col-4 list-container">2025/10/4</div>
        <div className="col-3">
          <button type="button" className="btn btn-danger">
            Delete
          </button>
        </div>
      </div>
    </div>
  );
}
export default Item1;
