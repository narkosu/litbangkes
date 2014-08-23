<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Login</title>
	<link rel="stylesheet" type="text/css" href="login.css" />	
</head>

<body>

	<div id="wrapper_login">
		
    <div id="left_login">
    	<h1 class="login_h1">
      	Selamat Datang di<br />
        <span class="login_h2">Sistem Informasi Riset</span>
      </h1>
      
      <h3>PUSAT HUMANIORA, KEBIJAKAN KESEHATAN DAN PEMBERDAYAAN MASYARAKAT</h3>
      
      <form name="login_form" action="#" method="post">
      	<p>
        	<input type="text" class="login_text" name="username" />
        </p>
        <p>
        	<input type="password" class="login_text" name="password" />
        </p>
        <p>
        	<input type="submit" value="Login" class="login_btn" />
        </p>
      </form>
    </div>  
  	
    <div id="right_login">
    	<img src="iMac.png" alt="login sistem informasi riset"  />
    </div>
  
  </div>
  
  <div id="login_footer">
  	&copy; <?php echo date('Y');?> Pusat Humaniora, Kebijakan Kesehatan dan Pemberdayaan Masyarakat. All rights reserved.
  </footer>
  
</body>
</html>