<?php

namespace backend\modules\labresultlogs\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pholabresultlogs;

/**
 * PholabresultlogsSearch represents the model behind the search form about `common\models\Pholabresultlogs`.
 */
class PholabresultlogsSearch extends Pholabresultlogs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rf_id_logs', 'rf_id'], 'integer'],
            [['update_by', 'update_on', 'remarks', 'enccode', 'action'], 'safe'],
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
        $query = Pholabresultlogs::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'rf_id_logs' => $this->rf_id_logs,
            'rf_id' => $this->rf_id,
            'update_on' => $this->update_on,
        ]);

        $query->andFilterWhere(['like', 'update_by', $this->update_by])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'enccode', $this->enccode])
            ->andFilterWhere(['like', 'action', $this->action]);

        return $dataProvider;
    }
}
