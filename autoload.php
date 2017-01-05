<?php

spl_autoload_register(function () {

    include_once './Services/Session.php';
    include_once './Services/Config.php';
    include_once './Services/Connection.php';
    include_once './Services/User.php';
    include_once './Services/Registration.php';
    include_once './Services/Post.php';
    //include_once './Services/like.php';
    include_once './Services/Comment.php';
    include_once './Services/Validation.php';
});
