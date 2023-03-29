<?php

namespace backend\modules\radresult\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PhoRadOptionValue;

/**
 * PhoRadOptionValueSearch represents the model behind the search form about `common\models\PhoRadOptionValue`.
 */
class PhoRadOptionValueSearch extends PhoRadOptionValue
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'rf_id', 'sort_order', 'pdf_id'], 'integer'],
            [['name', 'path'], 'safe'],
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
        $query = PhoRadOptionValue::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'rf_id' => $this->rf_id,
            'sort_order' => $this->sort_order,
            'pdf_id' => $this->pdf_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'path', $this->path]);

        return $dataProvider;
    }
}
