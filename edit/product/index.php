<?php
global $link;
include_once "../../db.php";

if (isset($_GET['update_product'])) $id = $_GET['update_product'];
$product = $link->query("select * from products where id=$id")->fetch_array();
$categories = $link->query("select * from categories")->fetch_all(MYSQLI_ASSOC);

require_once "../../view/header.html";
?>
    <link rel="stylesheet" href="../../assets/styles/header.css">
    <main>
        <a href="/product">Назад</a>
        <form action="/controller/products/updateController.php?update_product=<?=$_GET['update_product']?>" method="post">
            <input type="text" name="title" placeholder="Ведите имя" value="<?=$product['title']?>"><br>
            <input type="number" name="price" placeholder="Ведите цену" value="<?=$product['price']?>"><br>
            <select name="category_id">
                <option value="base">выберите категорию</option>
                <?php foreach ($categories as $category):?>
                    <option <?=$category['id'] == $product['category_id'] ? 'selected': ''?> value="<?=$category['id']?>"><?=$category['name']?></option>
                <?php endforeach;?>
            </select><br>
            <input type="submit" name="update_product" >
        </form>
        <?php if (isset($_SESSION['error'])):?>
            <?php foreach ($_SESSION['error'] as $error):?>
                <div style="color: red">
                    <?=$error?>
                </div>
            <?php endforeach;?>
        <?php endif;?>
    </main>
<?php
require_once "../../view/footer.html";
unset($_SESSION['error']);

?>