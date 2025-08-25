import style from "./Button.module.css";
function Button({ arr, func }) {
  return (
    <div className="btn-container">
      {arr.map((btn) => {
        return (
          <button key={btn} onClick={() => func(btn)}>
            {btn}
          </button>
        );
      })}
    </div>
  );
}
export default Button;
