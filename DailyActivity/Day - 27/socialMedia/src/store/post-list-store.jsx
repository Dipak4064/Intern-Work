import { createContext } from "react";

const default_context = {
  postList: [],
  addPost: () => {},
  deletePost: () => {},
};
const PostList = createContext(default_context);

const postListReducer = (currPostList, action) => {
  return currPostList;
};

const PostListProvider = () => {
  const [postList, disptachPostList] = useReducer(postListReducer, []);
  const addPost = () => {};
  const deletePost = () => {};
  return (
    <PostList.Provider value={{ PostList, addPost, deletePost }}>
      {children}
    </PostList.Provider>
  );
};

export default PostListProvider;
