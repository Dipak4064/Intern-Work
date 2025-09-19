function Items(list) {
    return (
      <div className="container">
        <div className="row ">
          {list.map((item, index) => (
            <React.Fragment key={index}>
              <div className="col-4 list-container">{item.name}</div>
              <div className="col-4 list-container">{item.date}</div>
              <div className="col-3">
                <button type="button" className="btn btn-danger">
                  Delete
                </button>
              </div>
            </React.Fragment>
          ))}
        </div>
      </div>
    );
}
export default Items;