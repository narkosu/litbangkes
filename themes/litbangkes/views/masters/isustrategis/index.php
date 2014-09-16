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
                        <th class="head0 center">Tahun Mulai</th>
                        <th class="head1 center">Tahun Selesai</th>
                        <th class="head0 center">Isu Strategis</th>
                        <th class="head0 center"></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (!empty($data)) { 
                        $no = ($pages->getCurrentPage() * $pages->getPageSize()) + 1;
                    foreach ($data as $index=>$row ){ ?>
                    <tr class="gradeX">
                      <td class="aligncenter"><?php echo $no?>.</td>
                        <td><?php echo $row->tahun_start ?></td>
                        <td><?php echo $row->tahun_end ?></td>
                        <td><?php echo $row->isu_strategis ?></td>
                        
                        <td class="center">
                            <a href="<?php echo Yii::app()->createUrl('/masters/isustrategis/update/id/'.$row->id)?>"  class="btn btn-warning">Edit</a> 
                            <!-- <a  title="Setting sebagai validasi">Bag Validasi</a>-->
                        </td>
                    </tr>
                    <?php 
                        $no++;
                                }
                    }
                    ?>

                </tbody>
            </table>

            <!-- dynamic table end -->
            
             
               <div class="pagination pagination-centered pagination-small" >
                <?php
                
                $this->widget('CLinkPager', array(
                    'pages' => $pages,
                    'header'=>''
                ));
                ?>
            
              </div>                                          

        </div><!--span8-->

    </div><!--row-fluid-->
</div>