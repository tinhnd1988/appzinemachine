<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
/*
	public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
*/  

    private $_id;
    public function authenticate()
    {
       $user = Users::model()->findByAttributes(array('username'=>$this->username));
        if($user===null){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }        
        else if($user->password!==md5($this->password))
            {
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
            }
        else
        {
           
            //$this->_id=$record->id;
            //$this->setState('title', $record->title);
            $this->setState('role', $user->role);
            $this->_id=$user->id;

            $auth=Yii::app()->authManager; //initializes the authManager
 
                if(!$auth->isAssigned($user->role,$this->_id)) 
                {
                    if($auth->assign($user->role,$this->_id)) 
                    {
                        Yii::app()->authManager->save(); 
                    }           
                }
             $this->errorCode=self::ERROR_NONE;
         }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }
}
