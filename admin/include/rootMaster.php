<?php
if (isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1')) {
    define("HOST_URL", "http://localhost/Projects/bovicon/");
} else {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)) ? "https://" : "http://";
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'bovican.epsilon-technology.com';
    define("HOST_URL", $protocol . $host . "/");
}
define("WEB_TITLE", "Bovica");

define("IMAGE_URL", HOST_URL . "assets/images/");
define("PROFILE_URL", IMAGE_URL . "instructorprofile/");
define("COURSE_URL", IMAGE_URL . "courseimage/");
define("ABOUT_URL", IMAGE_URL . "about/");
define("NOTIFICATION_URL", IMAGE_URL . "notification/");
define("EVENTS_URL", IMAGE_URL . "events/");
define("CERTIFICATE_URL", IMAGE_URL . "certificate/");
define("USERPROFILE_URL", IMAGE_URL . "userProfile/");
define("POPUP_URL", IMAGE_URL . "popup/");
define("BLOG_URL", IMAGE_URL . "blog/");
define("TEAM_URL", IMAGE_URL . "team/");

define("ADMIN_URL", HOST_URL . "admin/");
define("ADMIN_IMAGE_URL", ADMIN_URL . "image/");
define("ADMIN_BACKGROUND_URL", ADMIN_IMAGE_URL . "background/");
?>