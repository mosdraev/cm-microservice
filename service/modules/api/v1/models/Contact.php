<?php

namespace contact\modules\api\v1\models;


use yii\db\ActiveRecord;

/**
 * This is the model class for table "contact".
 *
 * @property string $id
 * @property string $upline_identity
 * @property string $account_identity
 * @property string $type_id
 * @property string $email
 * @property string $password_hash
 * @property string $firstname
 * @property string $lastname
 * @property string $phone
 * @property int $created_at
 * @property string $created_by
 */
class Contact extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password_hash', 'created_at', 'created_by'], 'required'],
            [['created_at'], 'integer'],
            [['upline_identity', 'account_identity', 'type_id', 'created_by'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 255],
            [['password_hash'], 'string', 'max' => 60],
            [['firstname', 'lastname'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 50],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'upline_identity' => 'Upline Identity',
            'account_identity' => 'Account Identity',
            'type_id' => 'Type ID',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'phone' => 'Phone',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }
}
