<?php

  require_once("facebook-php-sdk/src/facebook.php");

  $config = array(
      'appId' => '241964169342731',
      'secret' => 'd733f5b545d7c743b5f4359142f6a1f7',
      'fileUpload' => false, // optional
      'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
  );

  $facebook = new Facebook($config);
  
  $uid = $facebook->getUser();

  if ($uid) {
    echo "Logged in!";
  }
?><!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
</head>
<body>
  <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '241964169342731',
          status     : true,
          cookie     : true,
          xfbml      : true
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/all.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>

  
</body>
</html>