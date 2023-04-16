<?php
require('Models/Group.php');

$group = new Group;
$errors="";
$_SESSION['success_message'] = "";
$_SESSION['error_message'] = "";
if (isset($_POST['submit'])) {
    if ($errors == "") {
        $page = "groups";
        $name = $_POST['group_name'];
        $desc = $_POST['group_desc'];
        $data = [
            $name,
            $desc,
        ];
        $group->create_group($data);
        $_SESSION['success_message'] = "Group " . $name . " Created Successfully!!";
        $allGroups = $group->get_all_groups();
    } else {
        $page = "groupcreate";
        $_SESSION['error_message'] = $errors;
    }
    require 'views/index.php';
}