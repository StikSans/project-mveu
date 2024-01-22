<?php
global $link;
include_once "db.php";

$users = $link->query('select * from users');

require_once "./view/header.html";
?>
<main>
    <form action="controller/users/createController.php" method="post">
        <input type="text" name="login" placeholder="Ведите логин"><br>
        <input type="text" name="name" placeholder="Ведите имя"><br>
        <input type="text" name="sur_name" placeholder="Ведите фамилию"><br>
        <input type="radio" name="sex" value="m">М<br>
        <input type="radio" name="sex" value="f">Ж<br>
        <input type="password" name="pass" placeholder="Ведите пароль"><br>
        <input type="password" name="rpass" placeholder="повторите пароль"><br>
        <input type="submit" name="create_user" >
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
            <th>login</th>
            <th>name</th>
            <th>role_id</th>
            <th>sur_name</th>
            <th>sex</th>
            <th>password</th>
            <th>create_at</th>
            <th>update_at</th>
            <th colspan="2">Изменить</th>
        </tr>
        <?php foreach ($users as $user):?>
            <tr class="sex-<?=$user['sex']?>">
                <td><?=$user['id']?></td>
                <td><?=$user['login']?></td>
                <td><?=$user['name']?></td>
                <td><?=$user['role_id']?></td>
                <td><?=$user['sur_name']?></td>
                <td><?=$user['sex']=='f' ? 'Женский' : 'Мужской'?></td>
                <td><?=$user['password']?></td>
                <td><?=$user['create_at']?></td>
                <td><?=$user['update_at']?></td>
                <td><a href="/controller/users/deleteController.php?del_user=<?=$user['id']?>">Удалить</a></td>
                <td><a href="/edit/user?edit_user_id=<?=$user['id']?>">Редактировать</a></td>
            </tr>
        <?php endforeach;?>
    </table>
</main>
<?php
require_once "./view/footer.html";
unset($_SESSION['error']);

?>
