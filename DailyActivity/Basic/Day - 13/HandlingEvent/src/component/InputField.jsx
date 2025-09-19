import styles from "./InputField.module.css";
const InputField = ({ handleOnChange }) => {
  return (
    <input
      type="text"
      placeholder="Enter the value"
      onKeyDown={handleOnChange}
    />
  );
};
export default InputField;
