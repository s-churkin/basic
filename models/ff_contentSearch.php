<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ff_content;

/**
 * ff_contentSearch represents the model behind the search form about `app\models\ff_content`.
 */
class ff_contentSearch extends Ff_content
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tree_id'], 'integer'],
            [['name', 'url'], 'safe'],
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
    public function search($params)
    {
        $query = ff_content::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'id' => $this->id,
            'tree_id' => $this->tree_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'url', $this->url]);
/*
        $query->andFilterWhere(['between',
            'id', 1, 5,
        ]);
        $query->andWhere("'id' < :a", ['a' => 6]);
        $query->Where("'id' < 6");
*/
        return $dataProvider;
    }
}
