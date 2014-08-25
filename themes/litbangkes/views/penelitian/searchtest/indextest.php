
<div class="row-fluid">
    <div class="span16">
                                          
			<div id="dyntable_wrapper" class="dataTables_wrapper" role="grid">
      
      <table class="table table-bordered center" id="dyntable">
      	<tbody>
        	<tr>
          	<td align="center" class="center">
            
            	<br />
             	
              <form name="search" method="get">
              <input type="search" placeholder="kata kunci" class="search-query" name="q" value="<?=isset($_GET['q']) ? CHtml::encode($_GET['q']) : '' ; ?>" /><br /><br />
              <select name="by">
              	<option value="">- Cari Berdasarkan -</option>
              	<option value="judul" <?php if ( isset($_GET['by']) && $_GET['by'] == 'judul' ) echo 'selected=selected'; ?> >Judul Penelitian</option>
                <option value="keywords" <?php if ( isset($_GET['by']) && $_GET['by'] == 'keywords' ) echo 'selected=selected'; ?> >Keywords</option>
                <option value="isu_strategis" <?php if ( isset($_GET['by']) && $_GET['by'] == 'isu_strategis' ) echo 'selected=selected'; ?> >Isu Strategis</option>
              </select>
              
              <select name="thn">
              <option value="">- Pilih Tahun -</option>
              <?php
							$yearNow = date("Y");
							for ( $year = 2009; $year <= $yearNow + 5; $year++){
									isset($_GET["thn"]) && $_GET["thn"] == "$year" ? $selected = "selected" : $selected = "";
									echo "<option value=$year $selected>$year</option>";
							}
							?>
              </select>
              
              <select name="user_id">
              <option value="">- Pilih Peneliti -</option>
              <?php
							
							$sql				=	"SELECT id, user_id, nama FROM tbl_pegawai";
							$connection	=	Yii::app()->db; 
							$command		=	$connection->createCommand($sql);
							$rowCount		=	$command->execute(); // execute the non-query SQL
							$dataReader	=	$command->query(); // execute a query SQL
						
							foreach( $dataReader as $index => $value ){
								isset($_GET["user_id"]) && $_GET["user_id"] == "$value[user_id]" ? $selected = "selected" : $selected = "";
								echo "<option value=$value[user_id] $selected>$value[nama]</option>"; 
							}
							
							?>
              </select>
              
              <br /><br />
              <input type="submit" value="Cari" class="btn btn-success" />
              <a href="<?php echo Yii::app()->createUrl('penelitian/search/') ?>"><span class="btn btn-warning">Reset</span></a>
            </form>
            <br /><br />
            </td>
          </tr>
        </tbody>
      </table>
      
      <?php 
			
			if( isset($_GET['q']) && $_GET['q'] != '' ){				
	
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
														<!-- <th class="head0 nosort center">No</th> -->
														<th class="head0 center" width="60%">Judul Penelitian</th>
														<th class="head0 center" width="30%">Diajukan oleh</th>
														<th class="head0 center" width="10%">Tahun Anggaran</th>
												</tr>
										</thead>
										<tbody>
												<?php foreach ($data as $index => $proposal) { ?>
														<tr class="gradeX">
																<!-- <td class="center">&nbsp;</td>-->
																<td>
																
																<?php /*<a href="<?php echo Yii::app()->createUrl('/penelitian/proposalpenelitian/view/id/' . $proposal->id) ?>">
																<?php echo $proposal->nama_penelitian ?></a>*/?><?php echo $proposal->nama_penelitian ?></td>
																<td class="center"><?php echo $proposal->pegawai->nama ?></td>                            
																<td class="center"><?php echo $proposal->tahun_anggaran ?></td>
														</tr>
												<?php } ?>
		
										</tbody>
								</table>
                
      		<?php 
					} else {
					?>	
					
          <!-- <p class="center"><center>Data tidak ditemukan</center></p>->
						
					<?php 
					} 
				}?>
      </div><!-- form -->
            
    </div><!--span8-->
</div><!--row-fluid-->
