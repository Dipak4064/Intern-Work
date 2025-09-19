import "bootstrap/dist/css/bootstrap.min.css";
import ErrorMessage from "./component/ErrorMessage";
import FoodItems from "./component/foodItems";
import "./App.css";

function App() {
  // let foodItems = [];
  let foodItem = ["Dal", "Green Vegetable", "Roti", "Salad", "Milk", "Ghee"];
  // let result = foodItems.length === 0 ? <h1>I am still hungry.</h1> : null;
  return (
    <>
      <h1 className="food-heading">Helthy Food</h1>
      <ErrorMessage items={foodItem}></ErrorMessage>
      <FoodItems items={foodItem}></FoodItems>
    </>
  );
}

export default App;
