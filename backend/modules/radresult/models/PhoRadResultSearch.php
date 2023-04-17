<?php

namespace backend\modules\radresult\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PhoRadResult;

/**
 * PhoRadResultSearch represents the model behind the search form about `common\models\PhoRadResult`.
 */
class PhoRadResultSearch extends PhoRadResult
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rf_id', 'rt_id'], 'integer'],
            [['date', 'added_by', 'enccode', 'remarks'], 'safe'],
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
        $query = PhoRadResult::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'rf_id' => $this->rf_id,
            'date' => $this->date,
            'rt_id' => $this->rt_id,
        ]);

        $query->andFilterWhere(['like', 'added_by', $this->added_by])
            ->andFilterWhere(['like', 'enccode', $this->enccode])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
