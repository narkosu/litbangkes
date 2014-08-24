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
        <div id="dyntable_wrapper" class="dataTables_wrapper" role="grid">


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
                        <th class="head0">Judul Penelitian</th>
                        <th class="head0 center">Diajukan oleh</th>
                        <th class="head1 center">Sumber Dana</th>
                        <th class="head0 center">Tahun Anggaran</th>
                        <th class="head0 center">Position</th>
                        <th class="head0 center">Status</th>
                        <th class="head0 center">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = ($pages->getCurrentPage() * $pages->getPageSize()) + 1;
                    if ( !empty($data) )
                    foreach ($data as $index => $proposal) { ?>
                        <tr class="gradeX">
                            <td class="center"><?php echo $no ?></td>
                            <td><a href="<?php echo Yii::app()->createUrl('/penelitian/proposalpenelitian/view/id/' . $proposal->id) ?>"><?php echo $proposal->nama_penelitian ?></a></td>
                            <td class="center"><?php echo $proposal->pegawai->nama ?></td>
                            <td class="center">
                                <?php 
                                $textSumberDana ='';
                                if ( !empty($proposal->sumberdana) ){
                                    $textSumberDana = $proposal->sumberdana->name;
                                    if ( !empty($proposal->detailsumberdana))
                                        $textSumberDana .= ' - '.$proposal->detailsumberdana->nama;
                                } 
                                echo $textSumberDana;
                                ?>
                            </td>
                            
                            <td class="center"><?php echo $proposal->tahun_anggaran ?></td>
                            <td class="center"><?php echo ucfirst($proposal->getPosition()) ?></td>
                            <td class="center"><span class="label <?php echo $StatusColor[$proposal->status]?>"><?php echo $proposal->getStatus() ?></span></td>
                            <td class="center">
                                <?php if (Yii::app()->user->isSuperAdmin || ( Yii::app()->user->getState('pegawai') && Yii::app()->user->getState('pegawai')->id == $proposal->pegawai_id)) { ?>
                                    <a href="<?php echo Yii::app()->createUrl('/penelitian/proposalpenelitian/update/id/' . $proposal->id) ?>" class="btn btn-warning">Ubah</a> 
                                <?php } ?>    
                                    <?php if (Yii::app()->user->isSuperAdmin ) { ?>
                                    <a href="<?php echo Yii::app()->createUrl('/penelitian/proposalpenelitian/delete/id/' . $proposal->id) ?>" class="btn btn-danger">Hapus</a> 
                                <?php } ?>

                            </td>
                        </tr>
                    <?php 
                        $no++;
                    } ?>

                </tbody>
            </table>
            
            <div class="pagination pagination-centered pagination-small" >
                <?php
                
                $this->widget('CLinkPager', array(
                    'pages' => $pages,
                ));
                ?>
            </div>
						
            
            <?php /*  <div class="pagination pagination-centered pagination-small">
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
              */?>
            </div>

        <!-- dynamic table end -->                                             

    </div><!--span8-->

</div><!--row-fluid-->