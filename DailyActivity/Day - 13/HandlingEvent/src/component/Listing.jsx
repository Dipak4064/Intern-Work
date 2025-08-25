import styles from "./Listing.module.css";
const Listing = ({ fd,bought, clickedBtn }) => {
  return (
    <li className={`list-group-item ${bought ? "active":""}`}>
      {fd}
      <button className={`${styles.button} btn btn-info `} onClick={clickedBtn}>
        {/* Function is defined by parent. child to parent communication */}
        Buy
      </button>
    </li>
  );
};
export default Listing;
