<?php
/* web user to create levelAccess */

class WebUser extends CWebUser{
	private $_user;
	
	 //is the user a superadmin ?
	function getIsSuperAdmin(){
		return ( $this->user && $this->user->accessLevel == User::LEVEL_SUPERADMIN );
	}
	
  //is the user an administrator ?
	function getIsAdmin(){
		return ( $this->user && $this->user->accessLevel >= User::LEVEL_ADMIN );
	}
	
  
  //is the user an PPI ?
	function getIsPPI(){
		
    $getPPI = Yii::app()->user->getState('isPPI');
    if ( empty($getPPI) )  {           
        $isPPI= UserValidasigroup::model()->find('user_id = '.$this->user->id. ' and validasigroup_id = 1');
    } else {
        $isPPI = $getPPI;
    }
    if ( !empty($isPPI)){
        Yii::app()->user->setState('isPPI',$isPPI);
        return true;
    }else{
        return false;
    }
   
	}
	
  
  //is the user an Kapuslit ?
	function getIsKapuslit(){
		
    $getKapuslit = Yii::app()->user->getState('isKapuslit');
    if ( empty($getKapuslit) )  {           
        $isKapuslit= UserValidasigroup::model()->find('user_id = '.$this->user->id. ' and validasigroup_id = 4');
    } else {
        $isKapuslit = $getKapuslit;
    }
    if ( !empty($isKapuslit)){
        Yii::app()->user->setState('isKapuslit',$isKapuslit);
        return true;
    }else{
        return false;
    }
   
	}
  
   //is the user an KI ?
	function getIsKI(){
		
    $getKI = Yii::app()->user->getState('isKI');
    if ( empty($getKI) )  {           
        $isKI= UserValidasigroup::model()->find('user_id = '.$this->user->id. ' and validasigroup_id = 2');
    } else {
        $isKI = $getKI;
    }
    if ( !empty($isKI)){
        Yii::app()->user->setState('isKI',$isKI);
        return true;
    }else{
        return false;
    }
   
	}
  
  //is the user an KE ?
	function getIsKE(){
		
    $getKI = Yii::app()->user->getState('isKE');
    if ( empty($getKE) )  {           
        $isKE= UserValidasigroup::model()->find('user_id = '.$this->user->id. ' and validasigroup_id = 3');
    } else {
        $isKE = $getKE;
    }
    if ( !empty($isKE)){
        Yii::app()->user->setState('isKE',$isKE);
        return true;
    }else{
        return false;
    }
   
	}
  
  
  //is the user an Kabid ?
	function getIsKabid(){
		
    $pegawai = Yii::app()->user->getState('pegawai');
    if ( empty($pegawai) )  {           
        return false;
    } else if ( !empty($pegawai->id_jabatan) && $pegawai->id_jabatan == 1 ) {
        return true;
    } else {
        return false;
    }
 	}
  
  //is the user an Kasubbid ?
	function getIsKasubbid(){
		
    $pegawai = Yii::app()->user->getState('pegawai');
    if ( empty($pegawai) )  {           
        return false;
    } else if ( !empty($pegawai->id_jabatan) && $pegawai->id_jabatan == 2 ) {
        return true;
    } else {
        return false;
    }
    
	}
  
  
	function getIsAuthor(){
		return ( $this->user && $this->user->accessLevel == User::LEVEL_AUTHOR );
	}
  
  function getIsMember(){
		return ( $this->user && $this->user->accessLevel == User::LEVEL_MEMBER );
	}
  
  function getUserPeserta(){
		return ( Yii::app()->user->getState('userpeserta'));
	}
	 //get the logged user
	function getUser(){
		if( $this->isGuest )
			return;
		if( $this->_user === null ){
			$this->_user = User::model()->findByPk( $this->id );
		}
		return $this->_user;
	}

}
?>