<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id_user
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $is_admin
 *
 * @property Result $result
 */
class User1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'is_admin'], 'required'],
            [['is_admin'], 'integer'],
            [['username', 'password'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'is_admin' => 'Is Admin',
        ];
    }
    /**
     * check user
     */
    public function login($user, $pass){
        $query = Yii::$app->db->createCommand('SELECT * FROM user 
            WHERE username = "' . $user . '" AND password = "' . $pass . '"')
            ->queryOne();
        return $query;
    }

    public function show(){
        // $query = Yii::$app->db->createCommand('SELECT * FROM user')->queryAll();
        // return $query;
        return $rows = (new \yii\db\Query())->select('*')
                                    ->from('user')
                                    ->where(['deleted' => 0])
                                    ->all();
    }

    public function create($user, $pass, $email){
        // if ($this->validate()) {
        //     // chay query create data\
        $query = Yii::$app->db->createCommand('INSERT INTO user (username, password,email) 
                                                VALUES ("'.$user.'",
                                                        "'.$pass.'",
                                                        "'.$email.'") ')
                                                ->execute();
            return $query;
            // return $data->username;
            // die();
        }
    
    public function getUser($id){
        return  (new \yii\db\Query())->select('*')
                                                ->from('user')
                                                ->where(['id_user' => $id])
                                                    ->all();
    }
    public function edit($user, $pass, $email, $id){
        $result = Yii::$app->db->createCommand
                            ('UPDATE user SET 
                            username = "' .$user. '",
                            password = "' .$pass. '",
                            email = "' .$email. '" WHERE id_user ="' .$id. '" ')->execute();
        return $result;
    }
    public function deleteUser($id){
        // return $query = Yii::$app->db->createCommand()->delete('user', 'id_user ='. $id )->execute();
         $result = Yii::$app->db->createCommand('UPDATE user SET 
                                                deleted = 1
                                                WHERE id_user = "' .$id. '"
                                                ')->execute();
         return $result;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResult()
    {
        return $this->hasOne(Result::className(), ['id_result' => 'id_user']);
    }
}
