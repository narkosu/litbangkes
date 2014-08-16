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
                        <th class="head0 center">Posisi Proposal</th>
                        <th class="head1 center">Level Validasi</th>
                        <th class="head0 center">Validasi</th>
                        <th class="head0 center">Alasan</th>
                        <th class="head0 center">Diedit oleh</th>
                        <th class="head0 center">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = ($pages->getCurrentPage() * $pages->getPageSize()) + 1;
                    if ( !empty($data) )
                    foreach ($data as $index => $log) { ?>
                        <tr class="gradeX">
                            <td class="center"><?php echo $no ?></td>
                            <td><?php echo $log->proposal->nama_penelitian ?></td>
                            <td class="center"><?php echo ProposalPenelitian::documentPosition($log->step) ?></td>
                            <td class="center">
                                <?php echo strtoupper($log->level_validasi) ?>
                            </td>
                            
                            <td class="center"><?php echo ProposalPenelitian::statusValidasi($log->value_validasi) ?></td>
                            <td class="center"><?php echo $log->alasan ?></td>
                            <td class="left"><?php echo $log->oleh->username ?></td>
                            <td class="center">
                                <?php echo $log->created_at ?>

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