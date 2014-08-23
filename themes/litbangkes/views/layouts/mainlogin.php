<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Login SIR - Pusat Humaniora, Kebijakan Kesehatan dan Pemberdayaan Masyarakat</title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl .'/css/login.css'?>" />	
</head>

<body>

	<div id="wrapper_login">
		
    <div id="left_login">
    	<span class="login_h2">Silahkan masukkan username dan password anda<br>untuk masuk ke halaman SIR.</span>
      <?php echo $content ?>
      
    </div>  
  	
    <?php /*
    <div id="right_login">
    	<img src="<?php echo Yii::app()->theme->baseUrl ?>/img/iMac.png" alt="login sistem informasi riset"  />
    </div>
  	*/?>
    
  </div>
  
  <?php /*
  <div id="login_footer">
  	&copy; <?php echo date('Y');?> Pusat Humaniora, Kebijakan Kesehatan dan Pemberdayaan Masyarakat. All rights reserved.
  </div>
	*/ ?>
  
</body>
</html>