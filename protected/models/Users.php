<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property integer $store_id
 * @property string $role
 * @property string $email
 * @property string $password
 * @property integer $active
 * @property string $created
 * @property string $updated
 */
class Users extends CActiveRecord
{
     public $firstname;
        public $lastname;
        
        public $confirm_password;
        public $gender;
        //public $state;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role, password, username, email', 'required'),
			array('id, active', 'numerical', 'integerOnly'=>true),
			array('role, email, password , username', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, role, email, password, active, username, salt ,profile', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		'posts' => array(self::HAS_MANY, 'Post', 'author_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'role' => 'Role',
			'email' => 'Email',
			'password' => 'Password',
			'active' => 'Active',
			'salt' => 'Salt',
			'profile' => 'Profile',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('profile',$this->profile,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->salt)===$this->password;
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @param string salt
	 * @return string hash
	 */
	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}

	/**
	 * Generates a salt that can be used to generate a password hash.
	 * @return string the salt
	 */
	protected function generateSalt()
	{
		return uniqid('',true);
	}
	protected function beforeSave()
    {
        if($this->isNewRecord)
        {
            $this->password = md5($this->password);
        }
                return true;
    }
}