<div class="loginwrapperinner">
    <?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'action'=>Yii::app()->createUrl('site/login'),
				'enableAjaxValidation'=>true,
			)); ?>
        <p >
            <input type="text" id="username" class="login_text" name="LoginForm[username]" placeholder="Username" />
        </p>
        <p >
            <input type="password" id="password" class="login_text" name="LoginForm[password]" placeholder="Password" />
        </p>
        <p >
            <input type="submit" value="Login" class="login_btn" />
        </p>
       
    <?php $this->endWidget(); ?>	
</div><!--loginwrapperinner-->
        
   