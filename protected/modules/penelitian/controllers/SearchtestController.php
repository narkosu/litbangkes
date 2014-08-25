<?php

class SearchtestController extends Controller
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
		$criteria = new CDbCriteria();		
		if ( isset( $_GET['q'] ) ){
			
			$sQbyEmpty = $_GET['q'] != '' ? ' AND ( nama_penelitian LIKE "%'.$_GET['q'].'%" OR keywords LIKE "%'.$_GET['q'].'%" OR isu_strategis LIKE "%'.$_GET['q'].'%" )' : $_GET['q'] = ' ' ;
			$sQbyJudul = $_GET['q'] != '' ? ' AND ( nama_penelitian LIKE "%'.$_GET['q'].'%" )' : $_GET['q'] = ' ';
			$sQbyKeyword = $_GET['q'] != '' ? ' AND ( keywords LIKE "%'.$_GET['q'].'%" )' : $_GET['q'] = ' ';
			$sQbyIsuStretageis = $_GET['q'] != '' ? ' AND ( isu_strategis LIKE "%'.$_GET['q'].'%" )' : $_GET['q'] = ' ';
			
			$sQbyThn						= ' AND tahun_anggaran LIKE "%'.$_GET['thn'].'%"';
			$sQbyUserID					= ' AND user_id LIKE "%'.$_GET['user_id'].'%"';
			
			
			
			if ( $_GET['by'] == '' && $_GET['thn'] == '' && $_GET['user_id'] == '' ) {  // 0 0 0				
					
					$criteria->condition  .= 'status_record = 1 '; 
					$criteria->condition 	.= $sQbyEmpty;
				
			} elseif( $_GET['by'] == '' && $_GET['thn'] == '' && $_GET['user_id'] != '' ){  // 0 0 1
				
					$criteria->condition  .= 'status_record = 1 '; 
					$criteria->condition 	.= $sQbyEmpty.$sQbyUserID;

				
			} elseif( $_GET['by'] == '' && $_GET['thn'] != '' && $_GET['user_id'] == '' ){  // 0 1 0
			
					$criteria->condition  .= 'status_record = 1 '; 
					$criteria->condition 	.= $sQbyEmpty.$sQbyThn;
				
			} elseif( $_GET['by'] == '' && $_GET['thn'] != '' && $_GET['user_id'] != '' ){  // 0 1 1
			
					$criteria->condition  .= 'status_record = 1 '; 
					$criteria->condition 	.= $sQbyEmpty.$sQbyUserID.$sQbyThn;
				
			} elseif( $_GET['by'] == 'judul' && $_GET['thn'] == '' && $_GET['user_id'] == '' ){ // 1 0 0
			
					$criteria->condition  .= 'status_record = 1 '; 
					$criteria->condition 	.= $sQbyJudul;
				
			} elseif( $_GET['by'] == 'judul' && $_GET['thn'] == '' && $_GET['user_id'] != '' ){ // 1 0 1
			
					$criteria->condition  .= 'status_record = 1 '; 
					$criteria->condition 	.= $sQbyJudul.$sQbyUserID;
				
			} elseif( $_GET['by'] == 'judul' && $_GET['thn'] != '' && $_GET['user_id'] == '' ){ // 1 1 0
			
					$criteria->condition  .= 'status_record = 1 '; 
					$criteria->condition 	.= $sQbyJudul.$sQbyThn;
				
			} elseif( $_GET['by'] == 'judul' && $_GET['thn'] != '' && $_GET['user_id'] != '' ){ // 1 1 1
			
					$criteria->condition  .= 'status_record = 1 '; 
					$criteria->condition 	.= $sQbyJudul.$sQbyUserID.$sQbyThn;
				
			}  elseif( $_GET['by'] == 'keywords' && $_GET['thn'] == '' && $_GET['user_id'] == '' ){ // 1 0 0
			
					$criteria->condition  .= 'status_record = 1 '; 
					$criteria->condition 	.= $sQbyKeyword;
				
			} elseif( $_GET['by'] == 'keywords' && $_GET['thn'] == '' && $_GET['user_id'] != '' ){ // 1 0 1
			
					$criteria->condition  .= 'status_record = 1 '; 
					$criteria->condition 	.= $sQbyKeyword.$sQbyUserID;
				
			} elseif( $_GET['by'] == 'keywords' && $_GET['thn'] != '' && $_GET['user_id'] == '' ){ // 1 1 0
			
					$criteria->condition  .= 'status_record = 1 '; 
					$criteria->condition 	.= $sQbyKeyword.$sQbyThn;
				
			} elseif( $_GET['by'] == 'keywords' && $_GET['thn'] != '' && $_GET['user_id'] != '' ){ // 1 1 1
			
					$criteria->condition  .= 'status_record = 1 '; 
					$criteria->condition 	.= $sQbyKeyword.$sQbyUserID.$sQbyThn;
				
			}   elseif( $_GET['by'] == 'isu_strategis' && $_GET['thn'] == '' && $_GET['user_id'] == '' ){ // 1 0 0
			
					$criteria->condition  .= 'status_record = 1 '; 
					$criteria->condition 	.= $sQbyIsuStretageis;
				
			} elseif( $_GET['by'] == 'isu_strategis' && $_GET['thn'] == '' && $_GET['user_id'] != '' ){ // 1 0 1
			
					$criteria->condition  .= 'status_record = 1 '; 
					$criteria->condition 	.= $sQbyIsuStretageis.$sQbyUserID;
				
			} elseif( $_GET['by'] == 'isu_strategis' && $_GET['thn'] != '' && $_GET['user_id'] == '' ){ // 1 1 0
			
					$criteria->condition  .= 'status_record = 1 '; 
					$criteria->condition 	.= $sQbyIsuStretageis.$sQbyThn;
				
			} elseif( $_GET['by'] == 'isu_strategis' && $_GET['thn'] != '' && $_GET['user_id'] != '' ){ // 1 1 1
			
					$criteria->condition  .= 'status_record = 1 '; 
					$criteria->condition 	.= $sQbyIsuStretageis.$sQbyUserID.$sQbyThn;
				
			} else {
				
					$criteria->condition  .= 'status_record = 1 '; 
									
			}
		
		} else {
			
			$criteria->condition  .= 'status_record = 1 '; 
			
		}
		
		$count      = ProposalPenelitian::model()->count($criteria);
    $pages      = new CPagination($count);
    // results per page
    $pages->pageSize    = 20;
    $pages->applyLimit($criteria);
    $proposal = ProposalPenelitian::model()->findAll($criteria);

     $this->render('indextest',array(
			'data'=>$proposal,
      'pages'=>$pages   
		));
		
		
	}
	
	public function getPegawaiName(){
		
		$sql = "SELECT id, user_id, nama FROM tbl_pegawai";
		$getPegName = Yii::app()->db->createCommand($sql)->queryAll();
		
		$this->render('index',array(
			'data2'=>$getPegName  
		));
	
	}

}
