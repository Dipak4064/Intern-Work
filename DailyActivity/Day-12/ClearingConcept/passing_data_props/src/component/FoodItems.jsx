import CreatingItem from "./CreatingItem";
import "../App.css";
import styles from "./CreatingItem.module.css";

let FoodItems = ({ items }) => {
  return (
    <ul className={`${styles["item"]}`}>
      {items.map((item) => {
        return <CreatingItem key={item} foodlist={item}></CreatingItem>;
      })}
    </ul>
  );
};
export default FoodItems;
