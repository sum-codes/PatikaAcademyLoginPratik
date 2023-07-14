<?php

include 'fonksiyon/helper.php';

$user = [
'sahinersever' => '123456'
];

if(get(get:'islem') == 'giris'){
    if(!post(post:'username')){
        $_SESSION['error'] = 'Lütfen kullanıcı adınızı giriniz.';
        header(header:'Location:login.php');
    }
    }
}


?>