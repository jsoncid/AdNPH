<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Library;

/**
 * LibrarySearch represents the model behind the search form about `backend\models\Library`.
 */
class LibrarySearch extends Library
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Book_ID'], 'integer'],
            [['Book_name', 'Book_Descrip'], 'safe'],
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
        $query = Library::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'Book_ID' => $this->Book_ID,
        ]);

        $query->andFilterWhere(['like', 'Book_name', $this->Book_name])
            ->andFilterWhere(['like', 'Book_Descrip', $this->Book_Descrip]);

        return $dataProvider;
    }
}
