let ErrorMessage = ({ items }) => {
  return <>{items.length === 0 && <h1>I am still hungry.</h1>}</>;
};

export default ErrorMessage;
