<?php
require "./__autoload.php";
use sarassoroberto\usm\model\UserModel;

$model = new UserModel();
$users = $model->readAll();
print_r($users);

include './src/view/list_users_view.php';
?>
