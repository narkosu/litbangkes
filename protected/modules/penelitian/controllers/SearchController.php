<?php

class SearchController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/mainadmin';
  public $menuactive = 'penelitian'; 
  public $pageTitle = 'Pencarian Proposal Penelitian'; 

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function actionIndex()
	{
    $pages = '';  
		$searchQ = false;
		$searchNama = false;
		$searchTahun = false;
    
     $criteria = new CDbCriteria(); 
			if( !empty($_GET['q'])  ){
				$searchQ = true;
        $criteria->join = 'LEFT JOIN tbl_isu_strategis i ON i.id = t.isu_strategis ';
				$criteria->condition  .= 'status_record = 1 '; // tidak delete
				$criteria->condition 	.= ' AND ( keywords LIKE "%'.$_GET['q'].'%"';
				$criteria->condition 	.= ' OR nama_penelitian LIKE "%'.$_GET['q'].'%" ' ;
				$criteria->condition 	.= ' OR i.isu_strategis LIKE "%'.$_GET['q'].'%" )' ;
			}
      
      if ( !empty($_GET['nama_peneliti']) ) {
          $searchNama = true;
          if ( $searchQ ) {
              $criteria->join = 'LEFT JOIN tbl_pegawai p ON p.id = t.pegawai_id ';
              $criteria->condition 	.= ' AND ( nama LIKE "%'.$_GET['nama_peneliti'].'%" )' ;
          }else{
              $criteria->join = 'LEFT JOIN tbl_pegawai p ON p.id = t.pegawai_id ';
              $criteria->condition  .= 'status_record = 1 '; // tidak delete
              $criteria->condition 	.= ' AND ( nama LIKE "%'.$_GET['nama_peneliti'].'%" )' ;
          }
      }
      
      if ( !empty($_GET['tahun']) ) {
          $searchTahun = true;
          if ( $searchQ || $searchNama) {
              $criteria->condition 	.= ' AND tahun_anggaran = '.$_GET['tahun'] ;
          }else{
              
              $criteria->condition  .= 'status_record = 1 '; // tidak delete
              $criteria->condition 	.= '  AND tahun_anggaran = '.$_GET['tahun'] ;
          }
      }
      
      
      /*
      else if( $_GET['by'] == 'judul' ){
					$criteria = new CDbCriteria();
					$criteria->condition  .= 'status_record = 1 '; // tidak delete
					$criteria->condition 	.= ' AND  nama_penelitian LIKE "%'.$_GET['q'].'%"';

			} else if( $_GET['by'] == 'keywords' ) {
					$criteria = new CDbCriteria();
					$criteria->condition  .= 'status_record = 1 '; // tidak delete
					$criteria->condition 	.= ' AND  keywords LIKE "%'.$_GET['q'].'%"';
				
			} else if( $_GET['by'] == 'isu_strategis' ) {
					$criteria = new CDbCriteria();
					$criteria->condition  .= 'status_record = 1 '; // tidak delete
					$criteria->condition 	.= ' AND  isu_strategis LIKE "%'.$_GET['q'].'%"';				
			}*/
      
      $count = '';
			if ( $searchQ || $searchNama || $searchTahun ) {
        $count      = ProposalPenelitian::model()->count($criteria);
        $pages      = new CPagination($count);
        // results per page
        $pages->pageSize    = 20;
        $pages->applyLimit($criteria);
        
        $proposal = ProposalPenelitian::model()->findAll($criteria);
        
        $params = array(
                        'data'=>$proposal,  
                        'pages'=>$pages,
                        'count'=>$count
                      );
      }else{
          $proposal = '';
          $params = array(
                        'data'=>$proposal,  
                      );
      }
		
			$this->render('index',$params);
		
		
	}

}
