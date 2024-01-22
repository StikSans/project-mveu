<?php
global $link;
include_once "../../db.php";

if (isset($_GET['update_category'])) $id = $_GET['update_category'];
$category = $link->query("select * from categories where id=$id")->fetch_array();

require_once "../../view/header.html";
?>
    <link rel="stylesheet" href="../../assets/styles/header.css">
    <main>
        <a href="/category">Назад</a>
        <form action="/controller/categories/updateController.php?category_id=<?=$_GET['update_category']?>" method="post">
            <input type="text" name="name" placeholder="Ведите имя" value="<?=$category['name']?>"><br>
            <input type="submit" name="update_category" >
        </form>
        <?php if (isset($_SESSION['error'])):?>
            <div><?=$_SESSION['error']?></div>
        <?php endif;?>
    </main>
<?php
require_once "../../view/footer.html";
unset($_SESSION['error']);

?>