<?php

namespace backend\modules\content\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Shift;

/**
 * ShiftSearch represents the model behind the search form about `common\models\Shift`.
 */
class ShiftSearch extends Shift
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'emp_id', 'paid'], 'integer'],
            [['shift_date', 'start_date_time', 'end_date_time', 'paid_on', 'hour_rate', 'created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $guardId = null)
    {
        if ($guardId) {
            $query = Shift::find()->where(['emp_id' => $guardId]);
        } else {
            $query = Shift::find();
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        if ($guardId) {
            $query->andFilterWhere([
                'id' => $this->id,
                'client_id' => $this->client_id,
                'paid' => $this->paid,
                'paid_on' => $this->paid_on,
                'created_at' => $this->created_at,
            ]);
        } else {
            $query->andFilterWhere([
                'id' => $this->id,
                'client_id' => $this->client_id,
                'emp_id' => $this->emp_id,
                'paid' => $this->paid,
                'paid_on' => $this->paid_on,
                'created_at' => $this->created_at,
            ]);
        }

        $query->andFilterWhere(['==', 'shift_date', $this->shift_date])
            ->andFilterWhere(['>=', 'start_date_time', $this->start_date_time])
            ->andFilterWhere(['<=', 'end_date_time', $this->end_date_time])
            ->andFilterWhere(['like', 'hour_rate', $this->hour_rate]);

        return $dataProvider;
    }
}
