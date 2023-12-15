<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (($_POST['user_name'] == "admin") && ($_POST['pass_word'] == "admin")) {
        header("location: dashboard.html");
    }
    else{
    header("location: index.html");
}
}

?>