<?php
$this->breadcrumbs=array(
	'Halaman Depan'=>array('index'),
	'Pegawai',
);
?>
<div class="contentinner content-dashboard">
    <div class="row-fluid">
      <div class="span16">
          <!--
          <ul class="widgeticons row-fluid">
                <li class="one_fifth"><a href="pengajuan.html"><img src="img/gemicon/edit.png" alt="" /><span>Pengajuan Penelitian</span></a></li>
                <li class="one_fifth"><a href="penelitian.html"><img src="img/gemicon/list.png" alt="" /><span>Daftar Penelitian</span></a></li>
                <li class="one_fifth"><a href=""><img src="img/gemicon/archive.png" alt="" /><span>Status Penelitian</span></a></li>
                <li class="one_fifth"><a href=""><img src="img/gemicon/reports.png" alt="" /><span>Progress Report</span></a></li>
                <li class="one_fifth last"><a href=""><img src="img/gemicon/files.png" alt="" /><span>Output</span></a></li>
            </ul>

            <!-- dynamic table start-->
            
            <div id="dyntable_wrapper" class="dataTables_wrapper" role="grid">
                
                <?php /*
                <div id="dyntable_length" class="dataTables_length">
                    <label style="display: inline-block">Show <select size="1" name="dyntable_length" aria-controls="dyntable">
                            <option value="10" selected="selected">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> entries</label>
                    <label  style="display: inline-block">
                        <a class="btn" href="<?php echo Yii::app()->createUrl('members/pegawai/create')?>">Pegawai baru</a></label>
                </div>

                <div class="dataTables_filter" id="dyntable_filter">
                   <label>Search: <input type="text" aria-controls="dyntable"></label>
                </div>
								*/ ?>

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
                        <th class="head0 center">NIP</th>
                        <th class="head1 center">Nama Pegawai</th>
                        <th class="head0 center">Satuan Kerja</th>
                        <th class="head0 center">Jabatan</th>
                        <th class="head0 center">Bidang</th>
                        <th class="head0 center">Sub Bidang</th>
                        <th class="head0 center">Validasi</th>
                        <th class="head0 center">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $index=>$pegawai ){ ?>
                    <tr class="gradeX">
                      <td class="aligncenter">1</td>
                        <td><a href="<?php echo Yii::app()->createUrl('/members/pegawai/update/id/'.$pegawai->id)?>"><?php echo $pegawai->nip ?></a></td>
                        <td><?php echo $pegawai->nama ?></td>
                        <td><?php echo $pegawai->satuan_kerja ?></td>
                        <td><?php echo ( $pegawai->isJabatan() ? $pegawai->getJabatan()->nama_jabatan : '') ?></td>
                        <td><?php echo ( $pegawai->isBidang() ? $pegawai->getBidang()->nama_bidang : '') ?></td>
                        <td><?php echo ($pegawai->isSubBidang() ? $pegawai->getSubbidang()->nama : '') ?></td>
                        <td>
                            <?php $groups = $pegawai->getValidasiGroup();
                            if ( !empty($groups) )
                                foreach ( $groups as $group){
                                ?>
                                    <span><?php echo $group->group_name?></span>  
                            <?php
                                }
                            ?>
                        </td>
                        <td class="center">
                            <a href="<?php echo Yii::app()->createUrl('/members/pegawai/update/id/'.$pegawai->id)?>"  class="btn btn-warning">Edit</a> 
                            <!-- <a  title="Setting sebagai validasi">Bag Validasi</a>-->
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>

            <!-- dynamic table end -->
            
             <div class="pagination pagination-centered pagination-small">
                <ul>
                	<li><a href="#">Previous</a></li>
                	<li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">6</a></li>
                  <li><a href="#">Next</a></li>
                </ul>
              </div>                                          

        </div><!--span8-->

    </div><!--row-fluid-->
</div>