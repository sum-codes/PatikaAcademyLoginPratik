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
    'password' => '12345',
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
        //kullanıcı bilgisi doğrulama ve giriş işlemi.
      if(array_key_exists(post(post:'username'), $user )){
        if($user[post(post:'username')]['password'] == post(post: 'password')){

          $_SESSION['login']=true;
          $_SESSION['kullanici_adi'] = post(post: 'username');
          $_SESSION['eposta'] = $user[post(post:'username')]['eposta'];
          header(header:'Location:index.php');

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

if(get(get:'islem')=='hakkimda'){

  $hakkimda=post(post:'hakkimda');

  $islem = file_put_contents('db/' . session('kullanici_adi') . '.txt', htmlspecialchars($hakkimda));

  if($islem){
    //metin gönderim işleminin true, false durumunu linkte gösterir.
  header(header:'Location:index.php?islem=true');
  }
  else header(header:'Location:index.php?islem=false');

}

if(get(get:'islem') == 'cikis'){
  session_destroy();
  session_start();
  $_SESSION['error'] = 'Oturum sonlandırıldı.';
  header(header: 'Location:login.php');
}

if(get(get:'islem') == 'renk'){

  setcookie('color', get(get:'color'), time() + (86400 * 360));
  //?? nedir: http referer varsa solu yaz yoksa sağ tarafı yaz.

  header(header:'Location:' .$_SERVER['HTTP_REFERER'] ?? 'index.php');
  
}

?>