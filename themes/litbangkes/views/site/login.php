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
            <button type="submit" class="login_btn">LOGIN</button></p>
        <p >
            <a href="">
                <span class="icon-question-sign icon-white"></span> Lupa Password?
            </a>
        </p>
    <?php $this->endWidget(); ?>	
</div><!--loginwrapperinner-->
        
   