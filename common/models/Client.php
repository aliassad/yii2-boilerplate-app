<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $location
 * @property string $company_name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $per_hour_rate
 * @property string|null $shifts_deduction
 * @property string|null $shifts_cancelation
 * @property string|null $additional_cover
 * @property string|null $created_at
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['location', 'company_name', 'email', 'phone', 'address', 'per_hour_rate'], 'required'],
            [['created_at'], 'safe'],
            [['location', 'company_name', 'email', 'phone', 'address', 'per_hour_rate', 'shifts_deduction', 'shifts_cancelation', 'additional_cover'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'location' => Yii::t('backend', 'Location'),
            'company_name' => Yii::t('backend', 'Company Name'),
            'email' => Yii::t('backend', 'Email'),
            'phone' => Yii::t('backend', 'Phone'),
            'address' => Yii::t('backend', 'Address'),
            'per_hour_rate' => Yii::t('backend', 'Per Hour Rate'),
            'shifts_deduction' => Yii::t('backend', 'Shifts Deduction'),
            'shifts_cancelation' => Yii::t('backend', 'Shifts Cancelation'),
            'additional_cover' => Yii::t('backend', 'Additional Cover'),
            'created_at' => Yii::t('backend', 'Created At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ClientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ClientQuery(get_called_class());
    }
}
