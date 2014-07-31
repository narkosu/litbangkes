	<?php
	/* @var $this ProposalPenelitianController */
	/* @var $model ProposalPenelitian */
	/* @var $form CActiveForm */
	?>
	
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'proposal-penelitian-form',
		'enableAjaxValidation'=>false,
	  'htmlOptions'=>array('class'=>'stdform stdform2', 'enctype'=>'multipart/form-data')
	)); ?>
	<?php 
	
		$pegawai = $model->pegawai;
		echo $form->hiddenField($model,'user_id',array('value'=>Yii::app()->user->id) );
	?>
		<?php //echo $form->errorSummary($model); ?>
	<?php /*
		<div class="par">
			<?php echo $form->labelEx($model,'user_id'); ?>
		  <span class="field">
			<?php echo $form->hiddenField($model,'user_id',array('value'=>Yii::app()->user->id) ); ?>
		  </span>
			<?php echo $form->error($model,'user_id'); ?>
		</div>
	*/?>
		<?php
		echo $form->hiddenField($model,'pegawai_id', array('value'=> $pegawai->id));
		?>
	
	    <div class="par">
        <label>Status</label>    
        <span class="field">
            <?php
                if ($modelProtokol->status == 3) {
                    $labelValidasi = 'label-success';
                } else if ($modelProtokol->status == 2) { // revisi
                    $labelValidasi = 'label-success';
                } else if ($modelProtokol->status == 4) { //ditolak
                    $labelValidasi = 'label-important';
                } else if ($modelProtokol->status == 1) { //progres
                    $labelValidasi = 'label-warning';
                } else {
                    $labelValidasi = 'label-info';
                }
                ?>
                <span class="label <?php echo $labelValidasi ?>">
                    <?php echo $modelProtokol->getStatus() ?>
                </span>
                :
                
                <!-- validasi Kabid -->
                <?php if (!empty($validasi->validasi_kabid)) { ?>
                    <?php
                    if ($validasi->validasi_kabid == 3) {
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_kabid == 2) { // revisi
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_kabid == 4) { //ditolak
                        $labelValidasi = 'label-important';
                    } else if ($model->status == 1) { //progres
                        $labelValidasi = 'label-warning';
                    } else {
                        $labelValidasi = 'label-info';
                    }
                    ?>
                    <span class="label <?php echo $labelValidasi ?>">
                        <?php
                        echo $validasi->getStatus('validasi_kabid');
                        ?>
                        Kabid
                    </span>
                <?php } ?>
                
                <!-- validasi Kabid -->
                <?php if (!empty($validasi->validasi_kasubbid)) { ?>
                    <?php
                    if ($validasi->validasi_kasubbid == 3) {
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_kasubbid == 2) { // revisi
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_kasubbid == 4) { //ditolak
                        $labelValidasi = 'label-important';
                    } else if ($model->status == 1) { //progres
                        $labelValidasi = 'label-warning';
                    } else {
                        $labelValidasi = 'label-info';
                    }
                    ?>
                    <span class="label <?php echo $labelValidasi ?>">
                        <?php
                        echo $validasi->getStatus('validasi_kasubbid');
                        ?>
                        Kasubbid
                    </span>
                <?php } ?>
                
                
                <?php if (!empty($validasi->validasi_ppi)) { ?>
                    <?php
                    if ($validasi->validasi_ppi == 3) {
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_ppi == 2) { // revisi
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_ppi == 4) { //ditolak
                        $labelValidasi = 'label-important';
                    } else if ($model->status == 1) { //progres
                        $labelValidasi = 'label-warning';
                    } else {
                        $labelValidasi = 'label-info';
                    }
                    ?>
                    <span class="label <?php echo $labelValidasi ?>">
                        <?php
                        echo $validasi->getStatus('validasi_ppi');
                        ?>
                        PPI
                    </span>
                <?php } ?>
                <?php if (!empty($validasi->validasi_ki)) { ?>
                    <?php
                    if ($validasi->validasi_ki == 3) {
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_ki == 2) { // revisi
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_ki == 4) { //ditolak
                        $labelValidasi = 'label-important';
                    } else if ($model->status == 1) { //progres
                        $labelValidasi = 'label-warning';
                    } else {
                        $labelValidasi = 'label-info';
                    }
                    ?>
                    <span class="label <?php echo $labelValidasi ?>">
                        <?php
                        echo $validasi->getStatus('validasi_ki');
                        ?>
                        KI
                    </span>
                <?php } ?>

                <?php if (!empty($validasi->validasi_ke)) { ?>
                    <?php
                    if ($validasi->validasi_ke == 3) {
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_ke == 2) { // revisi
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_ke == 4) { //ditolak
                        $labelValidasi = 'label-important';
                    } else if ($model->status == 1) { //progres
                        $labelValidasi = 'label-warning';
                    } else {
                        $labelValidasi = 'label-info';
                    }
                    ?>
                    <span class="label <?php echo $labelValidasi ?>">
                        <?php
                        echo $validasi->getStatus('validasi_ke');
                        ?>
                        KE
                    </span>
                <?php } ?>
            </span>
    </div>
		
	  <div class="par">
			<label>Nama</label>   
			<span class="field">
				<?php echo ucfirst($pegawai->nama) ?>
			</span>
		</div>
		<div class="par">
			<label>NIP</label>   
			<span class="field">
				<?php echo ucfirst($pegawai->nip) ?>
			</span>
		</div>
		<div class="par">
			<label>Satuan Kerja</label>   
			<span class="field">
				<?php ?>
			</span>
		</div>
	
	
		
		<div class="par">
			<label>Jabatan Fungsional</label>   
			<span class="field">
				<?php echo $model->jabatanfungsi->nama ?>
			</span>
		</div>
		<div class="par">
			<label>Sub Bidang</label>   
			<span class="field">
				<?php echo $model->subbidang->nama ?>
			</span>
		</div>
		<div class="par">
			<label>Judul Penelitian</label>   
			<span class="field">
				<?php echo $model->nama_penelitian ?>
			</span>
	
		</div>
	  <div class="par">
		  
			  <label>Upload TOR</label>   
		  <span class="field">
			  <?php if ( !empty($groupFile['tor']) ) { ?>
			   <a href="<?php echo Yii::app()->createUrl('penelitian/file/download').'?file='.$groupFile['tor']->filename ?>">
				<?php echo $groupFile['tor']->filename?>
			   </a>    
			  <?php } ?>
		  </span>
			
		</div>
	
	<div class="par">
		  
			  <label>Upload Protokol</label>   
		  <span class="field">
			  <?php if ( !empty($groupFile['protokol']) ) { ?>
			  <a href="<?php echo Yii::app()->createUrl('penelitian/file/download').'?file='.$groupFile['protokol']->filename ?>">
			  <?php echo $groupFile['protokol']->filename?>
			  </a>
			  <?php } ?>
		  </span>
			
		</div>
	
	
		<div class="par">
			<?php echo $form->labelEx($modelProtokol,'anggaran'); ?>
		  <span class="field">
			<?php echo $modelProtokol->anggaran; ?>
		  </span>
			
		</div>
	
		<div class="par">
		  
			  <label>Upload RAB</label>   
		  <span class="field">
			 
			  <?php if ( !empty($groupFile['rab']) ) { ?>
			  <a href="<?php echo Yii::app()->createUrl('penelitian/file/download').'?file='.$groupFile['rab']->filename ?>">
				<?php echo $groupFile['rab']->filename?>
			  </a>    
			  <?php } ?>
		  </span>
			
		</div>
	
	<?php $this->endWidget(); ?>
