<?php
global $link;
include_once "../../db.php";

if (isset($_GET['edit_user_id'])) $id = $_GET['edit_user_id'];
$user = $link->query("select * from users where id=$id")->fetch_array();

require_once "../../view/header.html";
?>
    <link rel="stylesheet" href="../../assets/styles/header.css">
<main>
    <a href="/">Назад</a>
    <form action="/controller/users/updateController.php?edit_user_id=<?=$_GET['edit_user_id']?>" method="post">
        <input type="text" name="login" placeholder="Ведите логин" value="<?=$user['login']?>"><br>
        <input type="text" name="name" placeholder="Ведите имя" value="<?=$user['name']?>"><br>
        <input type="text" name="sur_name" placeholder="Ведите фамилию" value="<?=$user['sur_name']?>"><br>
        <input type="radio" name="sex" value="m" <?= $user['sex'] == 'm' ? 'checked' : ''?>>М<br>
        <input type="radio" name="sex" value="f" <?= $user['sex'] == 'f' ? 'checked' : ''?>>Ж<br>
        <input type="submit" name="edit_user" >
    </form>
</main>
<?php
require_once "../../view/footer.html";
unset($_SESSION['error']);

?>