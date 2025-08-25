import "./App.css";
import "bootstrap/dist/css/bootstrap.min.css";
import List from "./component/list";
import Heading from "./component/Heading";
import Container from "./component/Container";

function App() {
  return (
    <>
      <Container>
        <Heading></Heading>
        <List></List>
      </Container>
      <Container>
        <h5>This Food is best for the healthy health and well being.</h5>
      </Container>
    </>
  );
}
export default App;
