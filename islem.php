<?php
session_start();
include 'fonksiyon/helper.php';

$user = [
'sahinersever' => '123456'
];

if(get(get:'islem') == 'giris'){
    
    //son girilen kullanıcı adı değerlerinin altta görünmesi için:
    $_SESSION['username'] = post(post:'username');
    $_SESSION['password'] = post(post:'password');

    if(!post(post:'username')){
        $_SESSION['error'] = 'Lütfen kullanıcı adınızı giriniz.';
        header(header:'Location:login.php');
        exit();
    }
    elseif(!post(post:'password')){
        $_SESSION['error'] = 'Lütfen kullanıcı şifrenizi giriniz.';
        header(header:'Location:login.php');
        exit();
    }
}



?>