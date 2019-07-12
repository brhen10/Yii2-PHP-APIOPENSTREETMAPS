<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $nameuser
 * @property string $password
 * @property string $access_token
 * @property string $auth_key
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $password_repeat;
    
    const SCENARIO_CADASTRO = 'cadastro';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    //Executado antes de salvar no banco (Classe ActiveRecord)
    public function beforesave($insert)
    {
         Yii::trace('antes de criptografar');
        if ($insert || array_key_exists('password',$this->dirtyAttributes)) {
            $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            Yii::trace('depois de criptografar');
        }

        return parent::beforesave($insert);
    }
     public function afterSave ( $insert, $changedAttributes ) {
        Yii::trace('VALORES MODIFICADOS');
        Yii::trace($changedAttributes);
        if (isset($changedAttributes['type']) || $insert) {
            Yii::trace('Entrou no IF do isset');
            $auth = Yii::$app->authManager;
            if (!$insert) {
                Yii::trace('entrou no if do $insert');
                $auth->revokeAll($this->getId());
            }

            $novoPapel = $auth->getRole($this->type);
            Yii::trace('papel:');
            Yii::trace($novoPapel);
            $auth->assign($novoPapel,$this->getId());
        }

        return parent::afterSave($insert,$changedAttributes);
    }

    public function afterDelete() {
        Yii::$app->authManager->revokeAll($this->getId());
    }

    public static function getTypes() {
        return [
            'admin'=>Yii::t('app','Admin'),
            'usuario'=>Yii::t('app','User'),
            'root'=>Yii::t('app','Root')
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nameuser', 'password'], 'required'],
            [['password_repeat','type'], 'required', 'on' => [self::SCENARIO_CADASTRO]],
            [['nameuser'], 'string', 'max' => 45],
            
             [['type'],'string'], 
             [['type'],'in','range'=>['admin','root','usuario']],
            
            [['password', 'access_token', 'auth_key'], 'string', 'max' => 100],
            [['nameuser'], 'unique'],
           [['password_repeat'],'compare','compareAttribute'=>'password']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nameuser' => Yii::t('app', 'Nameuser'),
            'password' => Yii::t('app', 'Password'),
            'access_token' => Yii::t('app', 'Access Token'),
            'auth_key' => Yii::t('app', 'Auth Key'),
        ];
    }

    public static function findIdentity($id)
    {
        //Procurar $id na coluna username da tabela user
        return static::findOne(['nameuser' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->nameuser;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
}