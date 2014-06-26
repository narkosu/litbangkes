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
                        <th class="head0 nosort"><input type="checkbox" class="checkall" /></th>
                        <th class="head0">NIP</th>
                        <th class="head1">Nama Pegawai</th>
                        <th class="head0">Satuan Kerja</th>
                        <th class="head0">Jabatan</th>
                        <th class="head0">Bidang</th>
                        <th class="head0">Sub Bidang</th>
                        <th class="head0">Sebagai validasi</th>
                        <th class="head0">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $index=>$pegawai ){ ?>
                    <tr class="gradeX">
                      <td class="aligncenter"><span class="center">
                        <input type="checkbox" />
                      </span></td>
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
                            <a href="<?php echo Yii::app()->createUrl('/members/pegawai/update/id/'.$pegawai->id)?>">Edit</a> | 
                            <a  title="Setting sebagai validasi">Bag Validasi</a>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
            <div class="dataTables_info" id="dyntable_info">Showing 1 to 10 of 13 entries</div>
            <div class="dataTables_paginate paging_full_numbers" id="dyntable_paginate">
                <a tabindex="0" class="first paginate_button paginate_button_disabled" id="dyntable_first">First</a>
                <a tabindex="0" style="margin-left: -3px;" class="previous paginate_button paginate_button_disabled" id="dyntable_previous">Previous</a>
                <span style="margin-left: -3px;">
                    <a tabindex="0" class="paginate_active">1</a><a tabindex="0" class="paginate_button">2</a></span>
                <a style="margin-left: -3px;" tabindex="0" class="next paginate_button" id="dyntable_next">Next</a>
                <a style="margin-left: -3px;" tabindex="0" class="last paginate_button" id="dyntable_last">Last</a>
            </div>
            </div>
            <br>

            <!-- dynamic table end -->                                             

        </div><!--span8-->

    </div><!--row-fluid-->
</div>