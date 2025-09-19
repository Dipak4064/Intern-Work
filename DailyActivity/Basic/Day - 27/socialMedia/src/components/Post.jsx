const Post = () => {
  return (
    <div className="card" style={{ width: "18rem" }}>
      <img
        className="card-img-top"
        src="https://th.bing.com/th/id/R.c7e89b930f8aa73cf72d5f167d1d16ed?rik=3obl%2fhI6QdNIMA&riu=http%3a%2f%2fthewowstyle.com%2fwp-content%2fuploads%2f2015%2f01%2ffree-beautiful-place-wallpaper-hd-173.jpg&ehk=92RRpT4hrYheMDBZkK0HhLLXx9%2fGDjnafeDmbgjE1K8%3d&risl=&pid=ImgRaw&r=0"
        alt="Card image cap"
      />
      <div className="card-body">
        <h5 className="card-title">Card title</h5>
        <p className="card-text">
          Some quick example text to build on the card title and make up the
          bulk of the card's content.
        </p>
        <a href="#" className="btn btn-primary">
          Go somewhere
        </a>
      </div>
    </div>
  );
};
export default Post;
