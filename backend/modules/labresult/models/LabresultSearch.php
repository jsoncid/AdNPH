<?php

namespace backend\modules\labresult\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PhoLabresult;
use common\models\PhoLabresult1;

/**
 * LabresultSearch represents the model behind the search form about `common\models\PhoLabresult`.
 */
class LabresultSearch extends PhoLabresult1
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rf_id', 'added_by', 'rt_id', 'enccode'], 'integer'],
            [['file', 'date'], 'safe'],
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
        $query = PhoLabresult::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'rf_id' => $this->rf_id,
            'date' => $this->date,
            'added_by' => $this->added_by,
            'rt_id' => $this->rt_id,
            'enccode' => $this->enccode,
        ]);

        $query->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
