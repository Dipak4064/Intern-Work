import { useState } from "react";
import Listing from "./Listing";
const List = ({ food }) => {
  let [foody, setFoody] = useState([]);
  let checkActive = (item) => {
    setFoody((prev) => {
      if (prev.includes(item)) {
        return prev.filter((f) => f !== item); // remove
      } else {
        return [...prev, item]; // add
      }
    });
  };
  return (
    <ul className="list-group">
      {food.length === 0 ? <h1>I am still hungry.</h1> : null}
      {food.map((fd) => {
        return (
          <Listing
            fd={fd}
            key={fd}
            bought={foody.includes(fd)}
            clickedBtn={(event) => checkActive(fd, event)}
          ></Listing>
        );
      })}
    </ul>
  );
};
export default List;
