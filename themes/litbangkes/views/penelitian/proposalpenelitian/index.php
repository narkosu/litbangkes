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
                    <a class="btn" href="<?php echo Yii::app()->createUrl('penelitian/proposalpenelitian/create') ?>">Upload Proposal Penelitian</a></label>
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
                        <th class="head0">Judul Penelitian</th>
                        <th class="head0">Diajukan oleh</th>
                        
                        <th class="head1">Jenis Penelitian</th>
                        <th class="head0">Tahun Anggaran</th>
                        <th class="head0">Position</th>
                        <th class="head0">status</th>
                        <th class="head0">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $index => $proposal) { ?>
                        <tr class="gradeX">
                            <td class="aligncenter"><span class="center">
                                    <input type="checkbox" />
                                </span></td>
                            <td><a href="<?php echo Yii::app()->createUrl('/penelitian/proposalpenelitian/view/id/' . $proposal->id) ?>"><?php echo $proposal->nama_penelitian ?></a></td>
                            <td><?php echo $proposal->pegawai->nama ?></td>
                            <td><?php echo $proposal->jenispenelitian->nama ?></td>
                            
                            <td><?php echo $proposal->tahun_anggaran ?></td>
                            <td><?php echo $proposal->getPosition() ?></td>
                            <td><span class="label <?php echo $StatusColor[$proposal->status]?>"><?php echo $proposal->getStatus() ?></span></td>
                            <td class="center">
                                <?php if (Yii::app()->user->isSuperAdmin || ( Yii::app()->user->getState('pegawai') && Yii::app()->user->getState('pegawai')->id == $proposal->pegawai_id)) { ?>
                                    <a href="<?php echo Yii::app()->createUrl('/penelitian/proposalpenelitian/update/id/' . $proposal->id) ?>" class="btn btn-primary btn-rounded">Edit</a> 
                                    <a href="<?php echo Yii::app()->createUrl('/penelitian/proposalpenelitian/delete/id/' . $proposal->id) ?>" class="btn btn-primary btn-rounded">Delete</a> 
                                <?php } ?>

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