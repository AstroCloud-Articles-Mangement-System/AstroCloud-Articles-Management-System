<?php
require('Core/validation.php');

$group = new Group;
$errors;
$_SESSION['success_message'] = "";
$_SESSION['error_message'] = "";

try {
    if (isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
        $group_id = intval($_POST['group_id']);
        $errors = validate_group();
        if ($errors == "") {
            $page = "groups";
            $data = [
                $_POST['group_name'],
                $_POST['group_desc'],
            ];
            $group->update_user($group_id, $data);
            $allGroups = Group::get_all_groups();
            $_SESSION['success_message'] = "Group" . $_POST['group_name'] . " Updated Successfully!!";
        } else {
            $page = "group_edit";
            $group = $group->get_group_by_id($group_id);
            $_SESSION['error_message'] = $errors;
        }
        $redirect_url = dirname(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php');
        header('Location: ' . $redirect_url);
        exit;
    }
} catch (\Throwable $th) {
    write_to_log_file($th->getMessage(), $th->getFile(), $th->getLine());
}
