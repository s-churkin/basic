<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ff_values;

/**
 * Ff_valuesSearch represents the model behind the search form about `app\models\Ff_values`.
 */
class Ff_valuesSearch extends Ff_values
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'fields_id', 'instance_id'], 'integer'],
            [['value', 'dfrom', 'dto'], 'safe'],
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
    public function search($params, $id)
    {
        $query = Ff_values::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->where(['instance_id' => $id]);

        $query->andFilterWhere([
            'id' => $this->id,
            'fields_id' => $this->fields_id,
            'dfrom' => $this->dfrom,
            'dto' => $this->dto,
            'instance_id' => $this->instance_id,
        ]);

        $query->andFilterWhere(['like', 'value', $this->value]);

        return $dataProvider;
    }
}
