import style from "./Button.module.css";
function Button({arr}) {
  return (
    <div className="btn-container">
      {arr.map((btn) => {
          return <button key={btn}>{btn}</button>;
      })}
    </div>
  );
}
export default Button;
