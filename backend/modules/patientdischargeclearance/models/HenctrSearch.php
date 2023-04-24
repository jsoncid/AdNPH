<?php

namespace backend\modules\patientdischargeclearance\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Henctr;

/**
 * HenctrSearch represents the model behind the search form about `common\models\Henctr`.
 */
class HenctrSearch extends Henctr
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enccode', 'fhud', 'hpercode', 'upicode', 'encdate', 'enctime', 'toecode', 'sopcode1', 'sopcode2', 'sopcode3', 'patinform', 'patinfadd', 'patinftel', 'relacode', 'encstat', 'enclock', 'datemod', 'updsw', 'confdl', 'acctno', 'entryby', 'casetype', 'phicclaim', 'CRI', 'tacode'], 'safe'],
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
        $query = Henctr::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'encdate' => $this->encdate,
            'enctime' => $this->enctime,
            'datemod' => $this->datemod,
        ]);

        $query->andFilterWhere(['like', 'enccode', $this->enccode])
            ->andFilterWhere(['like', 'fhud', $this->fhud])
            ->andFilterWhere(['like', 'hpercode', $this->hpercode])
            ->andFilterWhere(['like', 'upicode', $this->upicode])
            ->andFilterWhere(['like', 'toecode', $this->toecode])
            ->andFilterWhere(['like', 'sopcode1', $this->sopcode1])
            ->andFilterWhere(['like', 'sopcode2', $this->sopcode2])
            ->andFilterWhere(['like', 'sopcode3', $this->sopcode3])
            ->andFilterWhere(['like', 'patinform', $this->patinform])
            ->andFilterWhere(['like', 'patinfadd', $this->patinfadd])
            ->andFilterWhere(['like', 'patinftel', $this->patinftel])
            ->andFilterWhere(['like', 'relacode', $this->relacode])
            ->andFilterWhere(['like', 'encstat', $this->encstat])
            ->andFilterWhere(['like', 'enclock', $this->enclock])
            ->andFilterWhere(['like', 'updsw', $this->updsw])
            ->andFilterWhere(['like', 'confdl', $this->confdl])
            ->andFilterWhere(['like', 'acctno', $this->acctno])
            ->andFilterWhere(['like', 'entryby', $this->entryby])
            ->andFilterWhere(['like', 'casetype', $this->casetype])
            ->andFilterWhere(['like', 'phicclaim', $this->phicclaim])
            ->andFilterWhere(['like', 'CRI', $this->CRI])
            ->andFilterWhere(['like', 'tacode', $this->tacode]);

        return $dataProvider;
    }
}
