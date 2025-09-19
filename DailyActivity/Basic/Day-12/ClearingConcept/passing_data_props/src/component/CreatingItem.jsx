import styles from "./CreatingItem.module.css";
const CreatingItem = ({ foodlist }) => {
  return <li className={`${styles["list"]} list-group-item`}>{foodlist}</li>;
};

export default CreatingItem;
