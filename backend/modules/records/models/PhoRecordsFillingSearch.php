<?php

namespace backend\modules\records\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PhoRecordsFilling;

/**
 * PhoRecordsFillingSearch represents the model behind the search form about `common\models\PhoRecordsFilling`.
 */
class PhoRecordsFillingSearch extends PhoRecordsFilling
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rf', 'is_received', 'is_scanned', 'is_forward_to_claims', 'received_by', 'scanned_by', 'forward_to_claims_by', 'update_received_by', 'update_scanned_by', 'update_forward_to_claims_by'], 'integer'],
            [['enccode', 'date_received_by', 'date_scanned_by', 'date_forward_to_claims', 'date_update_received', 'date_update_scanned', 'date_update_forward_to'], 'safe'],
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
        $query = PhoRecordsFilling::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'rf' => $this->rf,
            'is_received' => $this->is_received,
            'is_scanned' => $this->is_scanned,
            'is_forward_to_claims' => $this->is_forward_to_claims,
            'received_by' => $this->received_by,
            'scanned_by' => $this->scanned_by,
            'forward_to_claims_by' => $this->forward_to_claims_by,
            'update_received_by' => $this->update_received_by,
            'update_scanned_by' => $this->update_scanned_by,
            'update_forward_to_claims_by' => $this->update_forward_to_claims_by,
            'date_received_by' => $this->date_received_by,
            'date_scanned_by' => $this->date_scanned_by,
            'date_forward_to_claims' => $this->date_forward_to_claims,
            'date_update_received' => $this->date_update_received,
            'date_update_scanned' => $this->date_update_scanned,
            'date_update_forward_to' => $this->date_update_forward_to,
        ]);

        $query->andFilterWhere(['like', 'enccode', $this->enccode]);

        return $dataProvider;
    }
}
