<?php

namespace backend\modules\records\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PhoRecordsEncoding;

/**
 * PhoRecordsEncodingSearch represents the model behind the search form about `common\models\PhoRecordsEncoding`.
 */
class PhoRecordsEncodingSearch extends PhoRecordsEncoding
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['re_id', 'created_by', 'is_active'], 'integer'],
            [['enccode', 'hospital_num', 'final_diagnosis', 'additional_final_diagnosis', 'disdate', 'remarks', 'created_date'], 'safe'],
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
        $query = PhoRecordsEncoding::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            're_id' => $this->re_id,
            'disdate' => $this->disdate,
            'created_date' => $this->created_date,
            'created_by' => $this->created_by,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'enccode', $this->enccode])
            ->andFilterWhere(['like', 'hospital_num', $this->hospital_num])
            ->andFilterWhere(['like', 'final_diagnosis', $this->final_diagnosis])
            ->andFilterWhere(['like', 'additional_final_diagnosis', $this->additional_final_diagnosis])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
