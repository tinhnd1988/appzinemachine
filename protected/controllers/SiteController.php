<?php

class SiteController extends Controller
{

	public $countlogin;
	public $countlogin1;
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if(Yii::app()->user->isGuest){
			$this->redirect('index.php/site/login');
		}else{
			//$this->render('index');
			//$this->redirect('post/4-start-your-engines');
			$this->redirect('/index.php/post/4-training-center');
		}
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout = "error404";
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if(Yii::app()->user->isGuest){
			$this->layout='loginlayout';
			$model=new LoginForm;
			//$_COOKIE['login'] = '';
			// if it is ajax validation request
			/*if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}*/
			// collect user input data
			if(isset($_POST['LoginForm']))
			{
				/*$model->attributes=$_POST['LoginForm'];
				// validate user input and redirect to the previous page if valid
				if($model->validate() && $model->login()){
				     if(isset($_COOKIE['login'])){
						if($_COOKIE['login'] < 5 )
						{
							setcookie('login', 0, time()+60*3);	
							$this->redirect('index');
						}else{
							$this->redirect('login');
						}
					}
					//$this->redirect(Yii::app()->user->returnUrl);
					//$this->redirect(Yii::app()->user->id);
				}else{
				     if(isset($_COOKIE['login'])){
				          if($_COOKIE['login'] < 5){
				               $attempts = $_COOKIE['login'] + 1;
				               setcookie('login', $attempts, time()+60*3); //set the cookie for 3 minutes with the number of attempts stored
				               $this->countlogin = 'You are login '.$attempts.'/ 5';
				          } else{
				               $this->countlogin= 'You are banned for 3 minutes. Try again later';
				          }
				     } else{
				          setcookie('login', 1, time()+60*3); //set the cookie for 3 minutes with the initial value of 1
				          $this->countlogin = 'You are login 1 / 5';   
				     }
				}*/
				$model->attributes=$_POST['LoginForm'];

				if($model->validate() && $model->login()){
				     if(isset($_COOKIE['login'])){
						if($_COOKIE['login'] < 5 )
						{
							setcookie('login', 0, time()+60*3);	
							$this->countlogin1 = '1';
							$this->redirect('index');
						}else{
							$this->redirect('login');
							$this->countlogin1 = '6';
						}
					}
					else{
						$this->countlogin1 = '1';
						$this->redirect('index');
					}
				}
				else{
					if(isset($_COOKIE['login'])){
				          if($_COOKIE['login'] < 5){
				               $attempts = $_COOKIE['login'] + 1;
				               setcookie('login', $attempts, time()+60*3); //set the cookie for 3 minutes with the number of attempts stored
				               $this->countlogin = 'You are login '.$attempts.'/ 5';
				               $this->countlogin1 = $attempts;
				          } else{
				               $this->countlogin= 'You are banned for 3 minutes. Try again later';
				               $this->countlogin1 = '6';
				          }
				     } else{
				          setcookie('login', 1, time()+60*3); //set the cookie for 3 minutes with the initial value of 1
				          $this->countlogin = 'You are login 1 / 5';  
				          $this->countlogin1 = '1'; 
				     }
				}
				
			}
			// display the login form
			$this->render('login',array('model'=>$model));
		}
		else{
			$this->redirect(Yii::app()->homeUrl);
		}
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */

	public function actionLogout()
	{
		$assigned_roles = Yii::app()->authManager->getRoles(Yii::app()->user->id); //obtains all assigned roles for this user id
		if(!empty($assigned_roles)) //checks that there are assigned roles
		{
		    $auth=Yii::app()->authManager; //initializes the authManager
		    foreach($assigned_roles as $n=>$role)
		    {
		        if($auth->revoke($n,Yii::app()->user->id)) //remove each assigned role for this user
		            Yii::app()->authManager->save(); //again always save the result
		    }
		}
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

}
