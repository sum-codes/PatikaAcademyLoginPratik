<?php
session_start();
include 'fonksiyon/helper.php';

$user = [
'sahinersever' => [
    'eposta' => 'sahin@stebilsim.com',
    'password' => "123456",
],
'fatmaersever' =>[
    'eposta' => 'fatma@stebilsim.com',
    'password' => '654321',
],
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
    else{
        //kullanıcı bilgisi doğrulama.
      if(array_key_exists(post(post:'username'), $user )){
        if($user[post(post:'username')]['password'] == post(post: 'password')){

          $_SESSION['login']=true;
          $_SESSION['kullanici_adi'] = post(post: 'username');
          $_SESSION['eposta'] = $user[post(post:'username')]['eposta'];

        }
        else {
            $_SESSION['error'] = 'Kayıtlı kullanıcı bulunamadı.';
            header(header:'Location:login.php');
            exit();     
        }
      }
      else{
        $_SESSION['error'] = 'Kayıtlı kullanıcı bulunamadı.';
        header(header:'Location:login.php');
        exit(); 
      }
    }
}



?>