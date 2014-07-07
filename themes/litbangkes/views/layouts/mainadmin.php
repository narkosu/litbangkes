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
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>

<body>
<!-- START OF HEADER -->

    	

<div class="mainwrapper fullwrapper">
		
    <div class="headerpanel">
        	<h1>SISTEM INFORMASI RISET</h1>
          <span class="litbangkes-small-title">BADAN PENELITIAN DAN PENGEMBANGAN KESEHATAN </span>
            
            <div class="headerright">
                
    					<div class="dropdown userinfo">
              			<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/photo/pic1.png" >
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="/page.html">Hi,
                        <?php echo ucfirst(Yii::app()->user->name)?>! <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo Yii::app()->createUrl('members/pegawai/edit')?>"><span class="icon-edit"></span> Edit Profile</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('site/changepassword')?>"><span class="icon-wrench"></span> Ganti Password</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo Yii::app()->createUrl('site/logout')?>"><span class="icon-off"></span> Sign Out</a></li>
                    </ul>
                </div><!--dropdown-->
    		
            </div><!--headerright-->
            
    	</div><!--headerpanel-->
		
		
    <!-- START OF LEFT PANEL -->
    <div class="leftpanel">
        
        <div class="datewidget">Hari ini, <?php echo date('d M Y')?></div>
        
        <div class="plainwidget">
            <h6>Nama:<strong> <?php echo ucfirst(Yii::app()->user->name)?></strong></h6>
            <?php if ( Yii::app()->user->getState('pegawai') ) {?>
            <h6>NIP:<strong> <?php echo ucfirst(Yii::app()->user->getState('pegawai')->nama)?></strong></h6>
            <h6>Satker:<strong> <?php echo ucfirst(Yii::app()->user->getState('pegawai')->satuan_kerja)?></strong></h6>
            <?php } ?>
        </div><!--plainwidget-->
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
                <li class="nav-header">MENU UTAMA</li>
                <?php if ( Yii::app()->user->isSuperAdmin ) { ?>
                
                    <li <?php echo ($this->menuactive == 'pegawai' ? 'class="active"' : '')?>>
                        <a href="<?php echo Yii::app()->createUrl('members/pegawai')?>">
                            <span class="icon-upload"></span> Anggota</a>
                    </li>
                
                    <li <?php echo ($this->menuactive == 'penelitian' ? 'class="active"' : '')?>><a href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian')?>"><span class="icon-align-justify"></span> Daftar Penelitian</a></li>
                    <li <?php echo ($this->menuactive == 'validasipenelitian' ? 'class="active"' : '')?>><a href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian/validasi')?>"><span class="icon-align-justify"></span> Daftar Validasi Penelitian</a></li>
                    <li <?php echo ($this->menuactive == 'pengajuan' ? 'class="active"' : '')?>><a href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian/create')?>"><span class="icon-upload"></span> Pengajuan Penelitian</a></li>
                    <?php /*
                    <li <?php echo ($this->menuactive == 'progress' ? 'class="active"' : '')?>><a href="progress.html"><span class="icon-indent-left"></span> Progres Penelitian</a></li>
                    <li <?php echo ($this->menuactive == 'outputpenilaian' ? 'class="active"' : '')?>><a href="output.html"><span class="icon-book"></span> Output Penelitian</a></li>*/ ?>
                <?php } ?>
                    
                <?php if ( Yii::app()->user->isMember ) { ?>
                    <li <?php echo ($this->menuactive == 'penelitian' ? 'class="active"' : '')?>><a href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian')?>"><span class="icon-align-justify"></span> Daftar Penelitian</a></li>
                    <li <?php echo ($this->menuactive == 'pengajuan' ? 'class="active"' : '')?>><a href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian/create')?>"><span class="icon-upload"></span> Pengajuan Penelitian</a></li>
                    <?php if (Yii::app()->user->isPPI ) { ?>
                        <li <?php echo ($this->menuactive == 'validasipenelitian' ? 'class="active"' : '')?>><a href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian/validasi')?>"><span class="icon-align-justify"></span> Daftar Validasi Penelitian</a></li>
                    <?php } ?>
                    <?php if (Yii::app()->user->isKabid ) { ?>
                        <li <?php echo ($this->menuactive == 'validasipenelitian' ? 'class="active"' : '')?>><a href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian/validasi')?>"><span class="icon-align-justify"></span> Daftar Validasi Penelitian</a></li>
                    <?php } ?>
                    <?php if (Yii::app()->user->isKasubbid ) { ?>
                        <li <?php echo ($this->menuactive == 'validasipenelitian' ? 'class="active"' : '')?>><a href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian/validasi')?>"><span class="icon-align-justify"></span> Daftar Validasi Penelitian</a></li>
                    <?php } ?>    
                    <?php /*
                    <li <?php echo ($this->menuactive == 'progress' ? 'class="active"' : '')?>><a href="#"><span class="icon-indent-left"></span> Progres Penelitian</a></li>
                    <li <?php echo ($this->menuactive == 'outputpenilaian' ? 'class="active"' : '')?>><a href="#"><span class="icon-book"></span> Output Penelitian</a></li>
                <?php */ } ?>
                    
                <li><a href="">&nbsp;</a></li>
                <li <?php echo ($this->menuactive == 'editprofil' ? 'class="active"' : '')?>><a href="<?php echo Yii::app()->createUrl('members/pegawai/edit')?>"><span class="icon-user"></span> Edit Profil</a></li>
                <li <?php echo ($this->menuactive == 'gantipassword' ? 'class="active"' : '')?>><a href="<?php echo Yii::app()->createUrl('site/changepassword')?>"><span class="icon-cog"></span> Ganti Password</a></li>
                <li ><a href="<?php echo Yii::app()->createUrl('site/logout')?>"><span class="icon-off"></span> Logout</a></li>
            </ul>
        </div><!--leftmenu-->
        
    </div><!--mainleft-->
    <!-- END OF LEFT PANEL -->
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">	
      
      <div class="breadcrumbwidget">
     <?php
        $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
            'htmlOptions'=>array('class'=>'breadcrumb'),
            'separator'=> '<span class="divider" style="padding:0px 5px;">/</span>'
)       );
     ?>
        
      </div><!--breadcrumbs-->
      <?php if ( !empty($this->pageTitle) ) { ?>
        <div class="pagetitle">
            <h1><?php echo $this->pageTitle?></h1>
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
    	<div class="footerleft">&copy; Litbangkes 2014. All Rights Reserved.</div>
    	<div class="footerright"></div>
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

