<?php

namespace app\models;

use \Yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @param int|string $id
     * @return null|\yii\web\IdentityInterface|static
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @param mixed $token
     * @param null $type
     * @return void|\yii\web\IdentityInterface
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        //return static::findOne(['access_token' => $token]);
    }

    /**
     * @param $username
     * @return null|static
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * @param $password
     * @return bool
     */
    public function validatePassword($password)
    {
        //return $this->password === $password;
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * @return string
     * @throws \yii\base\Exception
     */
    public function generateAuthKey()
    {
        return $this->auth_key = Yii::$app->security->generateRandomString();
    }

}
