import style from "./Display.module.css";
function Display({ value }) {
  return <input type="text" placeholder="Value" readOnly value={value} />;
}
export default Display;
