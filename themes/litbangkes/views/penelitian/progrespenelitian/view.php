<div class="row-fluid">
    <div class="span16">                        

        <div class="navbar">
            <div class="navbar-inner">
                <ul class="nav">
                    <li class="haslink"><a href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian/view/id/'.$model->id)?>">
                            <span class="badge">1</span>&nbsp;&nbsp;Proposal Penelitian <i class="iconfa-ok"></i></a></li>
                    <li class="haslink"><a href="<?php echo Yii::app()->createUrl('penelitian/protokolpenelitian/view/id/'.$model->id)?>">
                            <span class="badge">2</span>&nbsp;&nbsp;Protokol Penelitian <i class="iconfa-ok"></i></a></li>
                    <li class="active"><a href="<?php echo Yii::app()->createUrl('penelitian/progrespenelitian/create/id/'.$model->id)?>">
                            <span class="badge badge-success">3</span>&nbsp;&nbsp;Progress Penelitian</a></li>
                    <li><a><span class="badge">4</span>&nbsp;&nbsp;Output Penelitian</a></li>
                </ul>
            </div>
        </div>

        <?php echo $this->renderPartial('_form', array('model'=>$model, 'modelProgres' => $modelProgres,
            'modelFile' => $modelFile)); ?>                    

    </div><!--span8-->

</div><!--row-fluid-->