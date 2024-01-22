<?php
global $link;
include_once "../db.php";

$categories = $link->query('select * from categories');

require_once "../view/header.html";
?>

<main>
    <form action="/controller/categories/createController.php" method="post">
        <input type="text" name="name" placeholder="Ведите имя категории"><br>
        <input type="submit" name="create_category" >
    </form>
    <div>
        <?php if (isset($_SESSION['error'])):?>
            <div><?=$_SESSION['error']?></div>
        <?php endif;?>
    </div>
    <table border="1">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>create_at</th>
            <th>update_at</th>
            <th colspan="2">Изменить</th>
        </tr>
        <?php foreach ($categories as $category):?>
            <tr>
                <td><?=$category['id']?></td>
                <td><?=$category['name']?></td>
                <td><?=$category['create_at']?></td>
                <td><?=$category['update_at']?></td>
                <td><a href="/controller/categories/deleteController.php?del_category=<?=$category['id']?>">Удалить</a></td>
                <td><a href="/edit/category?update_category=<?=$category['id']?>">Редактировать</a></td>
            </tr>
        <?php endforeach;?>
    </table>
</main>
<?php
require_once "../view/footer.html";
unset($_SESSION['error']);

?>
