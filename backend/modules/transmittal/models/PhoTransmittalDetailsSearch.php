<?php

namespace backend\modules\transmittal\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PhoTransmittalDetails;

/**
 * PhoTransmittalDetailsSearch represents the model behind the search form about `common\models\PhoTransmittalDetails`.
 */
class PhoTransmittalDetailsSearch extends PhoTransmittalDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tdid', 'tid'], 'integer'],
            [['enccode'], 'safe'],
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
        $query = PhoTransmittalDetails::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'tdid' => $this->tdid,
            'tid' => $this->tid,
        ]);

        $query->andFilterWhere(['like', 'enccode', $this->enccode]);

        return $dataProvider;
    }
}
