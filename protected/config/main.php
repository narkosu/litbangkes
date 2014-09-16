<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

//Yii::setPathOfAlias('myprivatespace', '/var/www/common/mynamespace/');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'SISTIM ADMIN',
	'theme'=>'litbangkes',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.modules.members.models.*',
		'application.modules.masters.models.*',
		'application.modules.penelitian.models.*',
		'application.components.*',
	),
  'aliases' => array(
        'email' => '/Users/budisunarko/webapp/yii1.1.12/litbangkes/vendor/cornernote/yii-email-module/email',
    ),  
	'modules'=> array('masters','members','penelitian',
		'gii'=>array(
				'class'=>'system.gii.GiiModule',
				'password'=>'test',
				
				'generatorPaths'=>array(
					'application.gii',   // a path alias
				)
			),
   'email' => array(
            // path to the EmailModule class
            'class' => 'email.EmailModule',
 
            // The ID of the CDbConnection application component. If not set, a SQLite3
            // database will be automatically created in protected/runtime/email-EmailVersion.db.
            'connectionID' => 'db',
 
            // Whether the DB tables should be created automatically if they do not exist. Defaults to true.
            // If you already have the table created, it is recommended you set this property to be false to improve performance.
            'autoCreateTables' => false,
 
            // The layout used for module controllers.
            'layout' => 'email.views.layouts.column1',
 
            // Defines the access filters for the module.
            // The default is EmailAccessFilter which will allow any user listed in EmailModule::adminUsers to have access.
            'controllerFilters' => array(
                'emailAccess' => array('email.components.EmailAccessFilter'),
            ),
            
            // A list of users who can access this module.
           // 'adminUsers' => array('admin'),
 
            // The path to YiiStrap.
            // Only required if you do not want YiiStrap in your app config, for example, if you are running YiiBooster.
            // Only required if you did not install using composer.
            // Please note:
            // - You must download YiiStrap even if you are using YiiBooster in your app.
            // - When using this setting YiiStrap will only loaded in the menu interface (eg: index.php?r=menu).
            'yiiStrapPath' => '/Users/budisunarko/webapp/yii1.1.12/litbangkes/vendor/crisu83/yiistrap',
        ),  
	),
	'defaultController'=>'members/pegawai/profile',

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			//'allowAutoLogin'=>true,
			'class'=>'WebUser',
		),
    'emailManager' => array(
            // path to the EEmailManager class
            'class' => 'email.components.EEmailManager',
 
            // Path to the SwiftMailer lib folder.
            // Only required if you did not install using composer.
            'swiftMailerPath' => '/Users/budisunarko/webapp/yii1.1.12/litbangkes/vendor/swiftmailer/swiftmailer/lib',
 
            // Path to the Mustache src folder.
            // Only required then templateType is set to "db".
            // Only required if you did not install using composer.
            'mustachePath' => '/Users/budisunarko/webapp/yii1.1.12/litbangkes/vendor/mustache/mustache/src',
 
            // Default from email address.
            'fromEmail' => 'webmaster@litbangkes.org',
 
            // Default from name.
            // If unset the application name is used.
            'fromName' => null,
 
            // Template type, can be one of: php, db.
            'templateType' => 'php',
 
            // When templateType=php this is the path to the email views.
            // You may copy the default templates from email/views/emails.
            'templatePath' => 'application.views.emails',
 
            // List of template parts that will be rendered.
            'templateFields' => array('subject', 'heading', 'message'),
 
            // The default layout to use for template emails.
            'defaultLayout' => 'layout_default',
 
            // The default transport to use.
            // For this example you can use "mail", "smtp" or "anotherSmtp".
            'defaultTransport' => 'mail',
 
            // A list of email transport methods, for example:
            //    array(
            //         'transport_name_or_id' => array(
            //            // the class name of the Swift_Transport subclass
            //            'class' => 'Swift_Transport',
            //            // set Swift_Transport::property1 to "my value"
            //            'property1' => 'my value',
            //            // call Swift_Transport::setProperty2("my value")
            //            'setters' => array(
            //                'property2' => 'my value',
            //            ),
            //        ),
            //    )
            'transports' => array(
 
                // mail transport
                'mail' => array(
                    // can be Swift_MailTransport or Swift_SmtpTransport
                    'class' => 'Swift_MailTransport',
                ),
               /*    
                // smtp transport
                'smtp' => array(
                    // if you use smtp you may need to define the host, port, security and setters
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'localhost',
                    'port' => 25,
                    'security' => null,
                    'setters' => array(
                        'username' => 'your_username',
                        'password' => 'your_password',
                    ),
                ),
 
                // another smtp transport
                'anotherSmtp' => array(
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'localhost',
                    'port' => 25,
                    'security' => null,
                    'setters' => array(
                        'username' => 'another_username',
                        'password' => 'another_password',
                    ),
                ),
                */
                // gmail smtp transport
                'gmailSmtp' => array(
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'smtp.gmail.com',
                    'port' => 465,
                    'security' => 'ssl',
                    'setters' => array(
                        'username' => 'budisunarko@gmail.com',
                        'password' => 'str355gendeng',
                    ),
                ),
            ),
 
        ),  
		/*'db'=>array(
			'connectionString' => 'sqlite:protected/data/blog.db',
			'tablePrefix' => 'tbl_',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=litbangkes_update',
			//'connectionString' => 'mysql:host=localhost;dbname=litbangkes_682014',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
      'rules'=>array(
				'post/<id:\d+>/<title:.*?>'=>'post/view',
				'posts/<tag:.*?>'=>'post/index',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);