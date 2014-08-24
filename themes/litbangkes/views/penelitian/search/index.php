<?php
$this->breadcrumbs = array(
    'Halaman Depan' => array('index'),
    'Proposal Penelitian',
);

$StatusColor = array(   '0'=>'label-info',
                        '1'=>'label-warning',
                        '2'=>'label-info',
                        '3'=>'label-success',
                        '4'=>'label-important'
                        
                    );
?>
<div class="row-fluid">
    <div class="span16">                                           
			<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelFile' => $modelFile)); ?>
      
      TESTING
      
    </div><!--span8-->
</div><!--row-fluid-->