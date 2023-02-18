<?php

namespace backend\modules\transmittal\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PhoTransmittalDetailsTemp;

/**
 * PhoTransmittalDetailsTempSearch represents the model behind the search form about `common\models\PhoTransmittalDetailsTemp`.
 */
class PhoTransmittalDetailsTempSearch extends PhoTransmittalDetailsTemp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user'], 'integer'],
            [['datetime', 'enccode'], 'safe'],
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
        $query = PhoTransmittalDetailsTemp::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            //'datetime' => $this->datetime,
            'user' => $this->user,
        ]);

        $query
        ->andFilterWhere(['like', 'datetime', $this->datetime])
        ->andFilterWhere(['like', 'enccode', $this->enccode]);

        return $dataProvider;
    }
}
