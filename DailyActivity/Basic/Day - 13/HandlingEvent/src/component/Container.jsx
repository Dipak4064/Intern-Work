import styles from "./Container.module.css"
const Container = (Props) => {
  return <div className={styles.container}>{Props.children}</div>;
};
export default Container;
