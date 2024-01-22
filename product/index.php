<?php
global $link;
include_once "../db.php";

$products = $link->query('select * from products')->fetch_all(MYSQLI_ASSOC);
$categories = $link->query('select * from categories')->fetch_all(MYSQLI_ASSOC);
require_once "../view/header.html";
?>

<main>
    <form action="/controller/products/createController.php" method="post">
        <input type="text" name="title" placeholder="Ведите название продукта"><br>
        <input type="number" name="price" placeholder="Ведите цену"><br>
        <select name="category_id">
            <option value="base" selected>выберите категорию</option>
            <?php foreach ($categories as $category):?>
            <option value="<?=$category['id']?>"><?=$category['name']?></option>
            <?php endforeach;?>
        </select>
        <input type="submit" name="create_product" >
    </form>
    <div>
        <?php if (isset($_SESSION['error'])):?>
            <?php foreach ($_SESSION['error'] as $error):?>
                <div style="color: red">
                    <?=$error?>
                </div>
            <?php endforeach;?>
        <?php endif;?>
    </div>
    <table border="1">
        <tr>
            <th>id</th>
            <th>title</th>
            <th>price</th>
            <th>category_id</th>
            <th>create_at</th>
            <th>update_at</th>
            <th colspan="2">Изменить</th>
        </tr>
        <?php foreach ($products as $product):?>
            <tr>
                <td><?=$product['id']?></td>
                <td><?=$product['title']?></td>
                <td><?=$product['price']?></td>
                <td><?=$product['category_id']?></td>
                <td><?=$product['create_at']?></td>
                <td><?=$product['update_at']?></td>
                <td><a href="/controller/products/deleteController.php?del_product=<?=$product['id']?>">Удалить</a></td>
                <td><a href="/edit/product?update_product=<?=$product['id']?>">Редактировать</a></td>
            </tr>
        <?php endforeach;?>
    </table>
</main>
<?php
require_once "../view/footer.html";
unset($_SESSION['error']);

?>
