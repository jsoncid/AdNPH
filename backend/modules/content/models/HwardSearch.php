<?php

namespace backend\modules\content\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Hward;

/**
 * HwardSearch represents the model behind the search form about `common\models\Hward`.
 */
class HwardSearch extends Hward
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wardcode', 'wardname', 'wclcode', 'wardstat', 'wardlock', 'wvacov', 'datemod', 'updsw', 'tscode', 'sex'], 'safe'],
            [['wardrmno', 'noroom'], 'integer'],
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
        $query = Hward::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'wardrmno' => $this->wardrmno,
            'datemod' => $this->datemod,
            'noroom' => $this->noroom,
        ]);

        $query->andFilterWhere(['like', 'wardcode', $this->wardcode])
            ->andFilterWhere(['like', 'wardname', $this->wardname])
            ->andFilterWhere(['like', 'wclcode', $this->wclcode])
            ->andFilterWhere(['like', 'wardstat', $this->wardstat])
            ->andFilterWhere(['like', 'wardlock', $this->wardlock])
            ->andFilterWhere(['like', 'wvacov', $this->wvacov])
            ->andFilterWhere(['like', 'updsw', $this->updsw])
            ->andFilterWhere(['like', 'tscode', $this->tscode])
            ->andFilterWhere(['like', 'sex', $this->sex]);

        return $dataProvider;
    }
}
