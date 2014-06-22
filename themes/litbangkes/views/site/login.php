<div class="loginwrapperinner">
    <?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'action'=>Yii::app()->createUrl('site/login'),
				'enableAjaxValidation'=>true,
			)); ?>
        <p class="animate4 bounceIn">
            <input type="text" id="username" name="LoginForm[username]" placeholder="Username" />
        </p>
        <p class="animate5 bounceIn">
            <input type="password" id="password" name="LoginForm[password]" placeholder="Password" />
        </p>
        <p class="animate6 bounceIn">
            <button type="submit" class="btn btn-default btn-block">LOGIN</button></p>
        <p class="animate7 fadeIn">
            <a href="">
                <span class="icon-question-sign icon-white"></span> Lupa Password?
            </a>
        </p>
    <?php $this->endWidget(); ?>	
</div><!--loginwrapperinner-->
        
   