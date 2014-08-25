<div class="row-fluid">
    <div class="span16">
                                          
			<div id="dyntable_wrapper" class="dataTables_wrapper" role="grid">
      
      <table class="table table-bordered center" id="dyntable">
      	<tbody>
        	<tr>
          	<td align="center" class="center">
            
            <form method="get" style="padding: 20px 0;">
              <input type="search" placeholder="Masukkan kata kunci yang ingin anda cari" class="input-xxlarge" name="q" value="<?=isset($_GET['q']) ? CHtml::encode($_GET['q']) : '' ; ?>" />
              <select name="by">
              	<option value="">- Cari Berdasarkan -</option>
              	<option value="judul">Judul Penelitian</option>
                <option value="keywords">Keywords</option>
                <option value="isu_strategis">Isu Strategis</option>
              </select>
              <input type="submit" value="Cari" class="btn btn-success" />
              <a href="<?php echo Yii::app()->createUrl('penelitian/search/') ?>"><span class="btn btn-warning">Reset</span></a>
            </form>
            
            </td>
          </tr>
        </tbody>
      </table>
      
      <?php 
			
			$no = ($pages->getCurrentPage() * $pages->getPageSize()) + 1;
			
			if( !empty($data) ){
						
			?>
      <br />
      <p class="center"><center>Hasil Pencarian dengan kata kunci <i>"<?php echo $_GET['q'];?>"</i></center></p>     
      <table class="table table-bordered" id="dyntable">
                <colgroup>
                    <col class="con0" style="align: center; width: 4%" />
                    <col class="con1" />
                    <col class="con0" />
                    <col class="con1" />
                    <col class="con0" />
                    <col class="con1" />
                </colgroup>
                <thead>
                    <tr>
                        <th class="head0 nosort center">No</th>
                        <th class="head0 center" width="60%">Judul Penelitian</th>
                        <th class="head0 center" width="30%">Diajukan oleh</th>
                        <th class="head0 center" width="10%">Tahun Anggaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $index => $proposal) { ?>
                        <tr class="gradeX">
                            <td class="center"><?php echo $no; ?></td>
                            <td><a href="<?php echo Yii::app()->createUrl('/penelitian/proposalpenelitian/view/id/' . $proposal->id) ?>"><?php echo $proposal->nama_penelitian ?></a></td>
                            <td class="center"><?php echo $proposal->pegawai->nama ?></td>                            
                            <td class="center"><?php echo $proposal->tahun_anggaran ?></td>
                        </tr>
                    <?php $no++; }   ?>

                </tbody>
            </table>
            
            <div class="dataTables_info" >
                <?php
                //echo $pages->getPageCount();
                $this->widget('CLinkPager', array(
                    'pages' => $pages,
                ));
                ?>
            </div>
						
      		<?php } ?>
      </div><!-- form -->
            
    </div><!--span8-->
</div><!--row-fluid-->