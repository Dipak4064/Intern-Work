import CreatingItem from "./CreatingItem";

let FoodItems = ({ items }) => {
  return (
    <ul className="list-group">
      {items.map((item) => {
          return <CreatingItem key={item} foodlist={item} ></CreatingItem>;
      })}
    </ul>
  );
};
export default FoodItems;
