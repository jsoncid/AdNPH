<?php

namespace backend\modules\transmittal\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PhoTransmittal;

/**
 * PhoTransmittalSearch represents the model behind the search form about `common\models\PhoTransmittal`.
 */
class PhoTransmittalSearch extends PhoTransmittal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tid', 'created_by', 'is_received'], 'integer'],
            [['created_date', 'transmit_to', 'received_date'], 'safe'],
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
        $query = PhoTransmittal::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['tid' => SORT_DESC]],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'tid' => $this->tid,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'is_received' => $this->is_received,
            'received_date' => $this->received_date,
        ]);

        $query->andFilterWhere(['like', 'transmit_to', $this->transmit_to]);

        return $dataProvider;
    }
}
