<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>SISTEM INFORMASI BADAN PENELITIAN LITBANGKES SURABAYA</title>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/style.default.css" type="text/css" />
<link id="addonstyle" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/style.dark.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrap-fileupload.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/prettify/prettify.css" type="text/css" />
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/prettify/prettify.js"></script>
<?php /*<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery-1.9.1.min.js"></script>*/?>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/custom.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.uniform.min.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>

<body>
<!-- START OF HEADER -->

    	

<div class="mainwrapper fullwrapper">
		
    <div class="headerpanel">
        	<h1></h1>
          <span class="litbangkes-small-title"></span>
            
            <div class="headerright">
                
    					<div class="dropdown userinfo">
              			<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/photo/pic1.png" >
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="/page.html">Hi,
                        <?php echo ucfirst(Yii::app()->user->name)?>! <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo Yii::app()->createUrl('members/pegawai/edit')?>"><span class="icon-edit"></span> Edit Profile</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('site/changepassword')?>"><span class="icon-wrench"></span> Ganti Password</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo Yii::app()->createUrl('site/logout')?>"><span class="icon-off"></span> Keluar</a></li>
                    </ul>
                </div><!--dropdown-->
    		
            </div><!--headerright-->
            
    	</div><!--headerpanel-->
      
      <?php /*
      <div class="breadcrumbwidget">
     <?php
        $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
            'htmlOptions'=>array('class'=>'breadcrumb'),
            'separator'=> '<span class="divider" style="padding:0px 5px;">/</span>'));
     ?>
        
      </div><!--breadcrumbs-->
      */ ?>
      <!-- menu utama start -->
      <div class="pagetitle">
      
      	<?php if ( Yii::app()->user->isMember ) { ?>
          <a class="btn btn-info" href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian/create')?>">Pengajuan Penelitian</a>
          <a class="btn btn-success" href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian')?>">Daftar Penelitian</a>
          
          <?php if (Yii::app()->user->isKasubbid ) { ?>
          	<a class="btn btn-success" href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian/validasi')?>">Daftar Validasi</a>
          <?php } ?>
          
          <?php if (Yii::app()->user->isKabid ) { ?>
          	<a class="btn btn-success" href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian/validasi')?>">Daftar Validasi</a>
          <?php } ?>
          
          <?php if (Yii::app()->user->isPPI ) { ?>
          	<a class="btn btn-success" href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian/validasi')?>">Daftar Validasi</a>
          <?php } ?>
          
          <?php if (Yii::app()->user->isKapuslit ) { ?>
          	<a class="btn btn-success" href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian/validasi')?>">Daftar Validasi</a>
          <?php } ?>
          
          <a class="btn btn-success" href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian/create') ?>">Sejarah</a>
             
        
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn btn-success dropdown-toggle">Pencarian <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="<?php echo Yii::app()->createUrl('penelitian/search')?>">Cari Proposal Penelitian</a></li>
            <li><a href="#">Cari Protokol Penelitian</a></li>
            <li><a href="#">Cari Output Penelitian</a></li>
          </ul>
        </div>
        
        <?php } ?> 
        
        <?php if ( Yii::app()->user->isSuperAdmin ) { ?>
          <a class="btn btn-info" href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian/create')?>">Pengajuan Penelitian</a>
          <a class="btn btn-success" href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian')?>">Daftar Penelitian</a>
          <a class="btn btn-success" href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian/validasi')?>">Daftar Validasi</a>
          
          <div class="btn-group">
            <button data-toggle="dropdown" class="btn btn-success dropdown-toggle">Pencarian <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="<?php echo Yii::app()->createUrl('penelitian/search')?>">Cari Proposal Penelitian</a></li>
              <li><a href="#">Cari Protokol Penelitian</a></li>
              <li><a href="#">Cari Output Penelitian</a></li>
            </ul>
          </div>
          
          <div class="btn-group">
          <button data-toggle="dropdown" class="btn btn-success dropdown-toggle">Data Master <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="#">Master Jabatan Fungsional</a></li>
            <li><a href="#">Master Bidang</a></li>
            <li><a href="#">Master Sub Bidang</a></li>
            <li><a href="#">Master Kepakaran</a></li>
            <li><a href="#">Master Sumber Dana</a></li>
            <li><a href="#">Master Isu Strategis</a></li>
            <li><a href="#">Master Klien</a></li>
          </ul>
        </div>
        
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn btn-success dropdown-toggle">Kepegawaian <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="<?php echo Yii::app()->createUrl('members/pegawai')?>">Daftar Pegawai</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('members/pegawai/create')?>">Tambah Pegawai</a></li>
          </ul>
        </div>
        
        <?php } ?>
        <div class="btn-group">
        	<a class="btn btn-danger" href="<?php echo Yii::app()->createUrl('site/logout')?>">Keluar</a>
        </div>
        
      </div>
      <!-- menu utama end -->
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">	
      
      
      <?php if ( !empty($this->pageTitle) ) { ?>
        <div><br>
            <h3 class="text-center"><?php echo $this->pageTitle?></h3>
        </div><!--pagetitle-->  
      <?php } ?>
        <div class="maincontent">
        	<div class="contentinner content-dashboard">                
                <?php echo $content?>
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
    
    <div class="footer">
    	&copy; <?php echo date("Y");?> Pusat Humaniora, Kebijakan Kesehatan dan Pemberdayaan Masyarakat. All Rights Reserved.
    </div><!--footer-->

    
</div><!--mainwrapper-->

</body>
</html>
<?php
$cs=Yii::app()->clientScript;

$cs->registerScriptFile( Yii::app()->theme->baseUrl .'/js/jquery-1.9.1.min.js', CClientScript::POS_HEAD);
$cs->scriptMap=array(
    'jquery.js'=>'//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js',
);
?>

