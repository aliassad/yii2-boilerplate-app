<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assignment".
 *
 * @property int $id
 * @property int|null $emp_id
 * @property int|null $client_id
 * @property string|null $assigned_on
 * @property string|null $unassigned_on
 * @property string|null $created_at
 *
 * @property Client $client
 * @property Guard $emp
 */
class Assignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_id', 'client_id'], 'required'],
            [['emp_id', 'client_id'], 'integer'],
            [['assigned_on', 'unassigned_on', 'created_at'], 'safe'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Guard::className(), 'targetAttribute' => ['emp_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'emp_id' => Yii::t('backend', 'Guard'),
            'client_id' => Yii::t('backend', 'Client/Site'),
            'assigned_on' => Yii::t('backend', 'Assigned On'),
            'unassigned_on' => Yii::t('backend', 'Unassigned On'),
            'created_at' => Yii::t('backend', 'Created At'),
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ClientQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }

    /**
     * Gets query for [[Emp]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\GuardQuery
     */
    public function getEmp()
    {
        return $this->hasOne(Guard::className(), ['id' => 'emp_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AssignmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AssignmentQuery(get_called_class());
    }
}
