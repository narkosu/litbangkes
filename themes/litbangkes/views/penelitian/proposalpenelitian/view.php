<?php
/* @var $this ProposalPenelitianController */
/* @var $model ProposalPenelitian */

$this->breadcrumbs=array(
	'Halaman Depan'=>array('index'),
	$model->nama_penelitian,
);

?>

<?php
/* @var $this ProposalPenelitianController */
/* @var $model ProposalPenelitian */
/* @var $form CActiveForm */
?>

<div class="maincontent">
    <div class="contentinner content-dashboard">                

          <div class="row-fluid">
            <div class="span16">                        

               <div class="navbar">
                <div class="navbar-inner">
                  <ul class="nav">
                    <li class="active"><a href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian')?>">
                      <span class="badge badge-success">1</span>&nbsp;&nbsp;Proposal Penelitian <i class="iconfa-ok"></i></a></li>
                    <li class="haslink"><a href="<?php echo Yii::app()->createUrl('penelitian/protokolpenelitian/create/id/'.$model->id)?>">
                      <span class="badge">2</span>&nbsp;&nbsp;Protokol Penelitian </a></li>
                    <li class="haslink"><a href="upload_progress_triwulan_1.html">
                      <span class="badge">3</span>&nbsp;&nbsp;Progress Penelitian</a></li>
                    <li><a><span class="badge">4</span>&nbsp;&nbsp;Output Penelitian</a></li>
                  </ul>
                </div>
              </div>

                <?php if ( Yii::app()->user->isSuperAdmin ) {?>
                  <div class="widgetcontent bordered shadowed nopadding">
                      <?php echo $this->renderPartial('_view_admin', array('model'=>$model,'validasi'=>$validasi)); ?>
                  </div>
            <?php } else { ?>
                  <h4 class="widgettitle nomargin shadowed">Proposal Penelitian : <?php echo $model->nama_penelitian?></h4>

                  <div class="widgetcontent bordered shadowed nopadding">
                    <?php echo $this->renderPartial('_view', array('model'=>$model,'validasi'=>$validasi)); ?>
                  </div><!--widgetcontent-->
            <?php } ?>

              </div><!--span8-->

          </div><!--row-fluid-->
      </div><!--contentinner-->
  </div><!--maincontent-->


