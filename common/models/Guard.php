<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guard".
 *
 * @property int $id
 * @property string $first_name
 * @property string|null $last_name
 * @property string $date_of_birth
 * @property string $gender
 * @property string|null $nationality
 * @property string $phone_number
 * @property string $address
 * @property string $email
 * @property string $license_number
 * @property string $licence_expiry
 * @property string $bank_name
 * @property string $sort_number
 * @property string $account_number
 * @property string|null $created_at
 */
class Guard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guard';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'date_of_birth', 'gender', 'phone_number', 'address', 'email', 'license_number', 'licence_expiry', 'bank_name', 'sort_number', 'account_number'], 'required'],
            [['created_at'], 'safe'],
            [['first_name', 'last_name', 'date_of_birth', 'nationality', 'phone_number', 'address', 'email', 'license_number', 'licence_expiry', 'bank_name', 'sort_number', 'account_number'], 'string', 'max' => 1000],
            [['gender'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'first_name' => Yii::t('backend', 'First Name'),
            'last_name' => Yii::t('backend', 'Last Name'),
            'date_of_birth' => Yii::t('backend', 'Date Of Birth'),
            'gender' => Yii::t('backend', 'Gender'),
            'nationality' => Yii::t('backend', 'Nationality'),
            'phone_number' => Yii::t('backend', 'Phone Number'),
            'address' => Yii::t('backend', 'Address'),
            'email' => Yii::t('backend', 'Email'),
            'license_number' => Yii::t('backend', 'License Number'),
            'licence_expiry' => Yii::t('backend', 'Licence Expiry'),
            'bank_name' => Yii::t('backend', 'Bank Name'),
            'sort_number' => Yii::t('backend', 'Sort Number'),
            'account_number' => Yii::t('backend', 'Account Number'),
            'created_at' => Yii::t('backend', 'Created At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\GuardQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\GuardQuery(get_called_class());
    }
}
