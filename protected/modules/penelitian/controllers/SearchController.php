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
		
		
		
		if( isset($_GET['q']) && $_GET['q'] != '' ){
			
			if( $_GET['by'] == '' ){
				
				$criteria = new CDbCriteria();
				$criteria->condition  .= 'status_record = 1 '; // tidak delete
				$criteria->condition 	.= ' AND ( nama_penelitian LIKE "%'.$_GET['q'].'%"';
				$criteria->condition 	.= ' OR keywords LIKE "%'.$_GET['q'].'%"';
				$criteria->condition 	.= ' OR isu_strategis LIKE "%'.$_GET['q'].'%" )';
			
			} else if( $_GET['by'] == 'judul' ){
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
			}
			
			$proposal = ProposalPenelitian::model()->findAll($criteria);
		
			$this->render('index',array(
				'data'=>$proposal,  
			));
			
		} else {
			
			$proposal = '';
		
			$this->render('index',array(
				'data'=>$proposal,  
			));
		}
		
		
	}

}
