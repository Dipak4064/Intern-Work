import "bootstrap/dist/css/bootstrap.min.css";
import "./App.css";
import Header from "./components/header";
import Footer from "./components/Footer";
import Sidebar from "./components/sidebar";
import CreatePost from "./components/createPost";
import Post from "./components/Post";
import { useState } from "react";
import PostListProvider from "./store/post-list-store";

function App() {
  const [selectedTab, setSelectedTab] = useState("");
  return (
    <PostListProvider>
      <div className="app-layout">
        <Sidebar
          selectedTab={selectedTab}
          setSelectedTab={setSelectedTab}
        ></Sidebar>
        <div className="contenting">
          <Header></Header>
          {selectedTab === "Home" ? <Post></Post> : <CreatePost></CreatePost>}
          <Footer></Footer>
        </div>
      </div>
    </PostListProvider>
  );
}

export default App;
