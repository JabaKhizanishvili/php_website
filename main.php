<?php

if (isset($_COOKIE["lang"]) && $_COOKIE['lang'] == "geo") {
    $lang = 'geo';
} else if (isset($_COOKIE["lang"]) && $_COOKIE['lang'] == "en") {
    $lang = "en";
} else {
    $lang = "geo";
}

if (isset($_GET['lang']) && $_GET['lang'] == "en") {
    setcookie("lang", "en", time() + (86400 * 30), "/");
    $lang = "en";
} else if (isset($_GET['lang']) && $_GET['lang'] == "geo") {
    setcookie("lang", "geo", time() + (86400 * 30), "/");
    $lang = "geo";
}

$language = [
    "en" => [
        "home" => "home",
        "products" => "products",
        "contact" => "contact",
        "login" => "login",
        "choose" => "choose language",
        "loginform" => [
            "signin" => "signin",
            "signup" => "signup",
            "username" => "username",
            "password" => "password",
            "forgetpass" => "forget password",
            "rpassword" => "rpassword",
            "email" => "email",
            "member" => "already member ?",
        ]
    ],
    "geo" => [
        "home" => "მთავარი",
        "products" => "პროდუქცია",
        "contact" => "კონტაქტი",
        "login" => "ავტორიზაცია",
        "choose" => "აირჩიეთ ენა",
        "loginform" => [
            "signin" => "ავტორიზაცია",
            "signup" => "რეგისტრაცია",
            "username" => "მომხმარებელი",
            "password" => "პაროლი",
            "forgetpass" => "დაგავიწყდა პაროლი ?",
            "rpassword" => "გაიმეორე პაროლი",
            "email" => "მეილი",
            "member" => "უკვე დარეგისტრირებილი ხარ ?",
        ]
    ]
];
