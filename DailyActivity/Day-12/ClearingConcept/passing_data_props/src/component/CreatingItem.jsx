const CreatingItem = ({foodlist}) => {
  console.log(foodlist);
  return (
    <li className="list-group-item" >
      {foodlist}
    </li>
  );
};

export default CreatingItem;
