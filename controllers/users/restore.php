<?php
$user_id = intval($_GET['id']); // cast the id parameter to an integer
$_SESSION['error_message'] = "";
$user = new User();
if ($user->check_id_existence($user_id)) {
    try {
        $user = $user->restore_user($user_id);
        $_SESSION['success_message'] = "";
        $_SESSION['success_message'] = "This User Restored Successfully!!";
    } catch (mysqli_sql_exception $exception ) {
        $_SESSION['error_message'] = "ERROR! You can't Restore this user";
    }

} else {
    $_SESSION['error_message'] = "You can't Restore user does not exist in db";
}
header("Location: " . $_SERVER['HTTP_REFERER']);