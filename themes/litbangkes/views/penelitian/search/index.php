<style>
    .ui-autocomplete {
	position: absolute;
	top: 0;
	left: 0;
	cursor: default;
}
.ui-menu {
	list-style: none;
	padding: 0;
	margin: 0;
	display: block;
	outline: none;
}
.ui-menu .ui-menu {
	position: absolute;
}
.ui-menu .ui-menu-item {
	position: relative;
	margin: 0;
	padding: 3px 1em 3px .4em;
	cursor: pointer;
	min-height: 0; /* support: IE7 */
	/* support: IE10, see #8844 */
	list-style-image: url("data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7");
}
.ui-menu .ui-menu-divider {
	margin: 5px 0;
	height: 0;
	font-size: 0;
	line-height: 0;
	border-width: 1px 0 0 0;
}
.ui-menu .ui-state-focus,
.ui-menu .ui-state-active {
	margin: -1px;
}

/* icon support */
.ui-menu-icons {
	position: relative;
}
.ui-menu-icons .ui-menu-item {
	padding-left: 2em;
}

/* left-aligned */
.ui-menu .ui-icon {
	position: absolute;
	top: 0;
	bottom: 0;
	left: .2em;
	margin: auto 0;
}

/* right-aligned */
.ui-menu .ui-menu-icon {
	left: auto;
	right: 0;
}
</style>    
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
              <input type="text" id="city">
              <input type="submit" value="Cari" class="btn btn-success" />
              <a href="<?php echo Yii::app()->createUrl('penelitian/search/') ?>"><span class="btn btn-warning">Reset</span></a>
            </form>
            
            </td>
          </tr>
        </tbody>
      </table>
      
      <?php 
			
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
                            <td><a href="<?php echo Yii::app()->createUrl('/penelitian/proposalpenelitian/view/id/' . $proposal->id) ?>"><?php echo $proposal->nama_penelitian ?></a></td>
                            <td class="center"><?php echo $proposal->pegawai->nama ?></td>                            
                            <td class="center"><?php echo $proposal->tahun_anggaran ?></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
            <?php /*
            <div class="dataTables_info" >
                
                //echo $pages->getPageCount();
                $this->widget('CLinkPager', array(
                    'pages' => $pages,
                ));
                
            </div>
						
            
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
							*/?>
      		<?php } ?>
      </div><!-- form -->
            
    </div><!--span8-->
</div><!--row-fluid-->
<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
jQuery('#city').autocomplete({'minLength':'2','source':['ac1','ac2','ac3']});
});
/*]]>*/
</script>