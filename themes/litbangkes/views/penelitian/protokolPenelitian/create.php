<?php
/* @var $this ProtokolPenelitianController */
/* @var $model ProtokolPenelitian */

$this->breadcrumbs=array(
	'Protokol Penelitians'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProtokolPenelitian', 'url'=>array('index')),
	array('label'=>'Manage ProtokolPenelitian', 'url'=>array('admin')),
);

?>

<div class="maincontent">
    <div class="contentinner content-dashboard">                

          <div class="row-fluid">
            <div class="span16">                        

               <div class="navbar">
                <div class="navbar-inner">
                  <ul class="nav">
                    <li class="haslink"><a href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian/view/id/'.$model->id)?>">
                      <span class="badge">1</span>&nbsp;&nbsp;Proposal Penelitian <i class="iconfa-ok"></i></a></li>
                    <li class="active"><a href="<?php echo Yii::app()->createUrl('penelitian/protokolpenelitian/create/id/'.$model->id)?>">
                      <span class="badge badge-success">2</span>&nbsp;&nbsp;Protokol Penelitian </a></li>
                    
                        <?php if ( $model->step >= 3 ) {?>
                            <li class="haslink">
                                <a href="upload_progress_triwulan_1.html">
                                    <span class="badge">3</span>&nbsp;&nbsp;Progress Penelitian
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="haslink">
                                <a >
                                    <span class="badge">3</span>&nbsp;&nbsp;Progress Penelitian
                                </a>
                            </li>
                        <?php } ?>
                    
                    <li><a><span class="badge">4</span>&nbsp;&nbsp;Output Penelitian</a></li>
                  </ul>
                </div>
              </div>

                <?php if ( Yii::app()->user->isSuperAdmin ) {?>
                  <div class="widgetcontent bordered shadowed nopadding">
                      <?php echo $this->renderPartial('_form', 
                        array('model'=>$model, 
                              'modelFile' => $modelFile,
                              'modelFile' => $modelFile,
                              'newModelFile'=>$newModelFile, 
                              'groupFile' => $groupFile,    
                              'modelProtokol' => $modelProtokol,
                        )); ?>
                  </div>
            <?php } else { ?>
                  <h4 class="widgettitle nomargin shadowed">Update Protokol Penelitian : <?php echo $model->nama_penelitian?></h4>

                  <div class="widgetcontent bordered shadowed nopadding">
                     <?php echo $this->renderPartial('_form', 
                        array('model'=>$model, 
                              'modelFile' => $modelFile,
                              'newModelFile'=>$newModelFile, 
                              'groupFile' => $groupFile,  
                              'modelProtokol' => $modelProtokol,
                        )); ?>
                  </div><!--widgetcontent-->
            <?php } ?>

              </div><!--span8-->

          </div><!--row-fluid-->
      </div><!--contentinner-->
  </div><!--maincontent-->
  
