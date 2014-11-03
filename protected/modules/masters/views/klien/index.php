<?php
$this->breadcrumbs=array(
	'Halaman Depan'=>array('index'),
	'',
);
?>
<div style="text-align:right">
    <a class="btn" href="<?php echo Yii::app()->createUrl('masters/klien/create')?>">Tambah Baru</a>
</div>
<div class="contentinner content-dashboard">
    <div class="row-fluid">
      <div class="span16">
            <!-- dynamic table start-->
            
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
                        <th class="head0 center">Nama</th>
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
                        <td><?php echo $row->name ?></td>
                        
                        <td class="center">
                            <a href="<?php echo Yii::app()->createUrl('/masters/klien/update/id/'.$row->id)?>"  class="btn btn-warning">Edit</a> 
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