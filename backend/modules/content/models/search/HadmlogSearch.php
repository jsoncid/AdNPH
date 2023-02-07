<?php

//namespace backend\modules\content\models;
namespace backend\modules\content\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Hadmlog;

/**
 * HadmlogSearch represents the model behind the search form about `common\models\Hadmlog`.
 */
class HadmlogSearch extends Hadmlog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enccode', 'hpercode', 'upicode', 'casenum', 'newold', 'tacode', 'tscode', 'admdate', 'admtime', 'diagcode', 'admnotes', 'licno', 'diagfin', 'disnotes', 'admmode', 'admpreg', 'disdate', 'distime', 'dispcode', 'condcode', 'licnof', 'licncons', 'cbcode', 'dcspinst', 'admstat', 'admlock', 'datemod', 'updsw', 'confdl', 'admtxt', 'admclerk', 'licno2', 'licno3', 'licno4', 'licno5', 'admphic', 'disnotice', 'treatment', 'hsepriv', 'licno6', 'licno7', 'licno8', 'licno9', 'licno10', 'itisind', 'entryby', 'pexpireddate', 'acis', 'watchid', 'lockby', 'lockdte', 'typadm', 'pho_hospital_number'], 'safe'],
            [['patage', 'patagemo', 'patagedy', 'patagehr'], 'number'],
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
        //$query = Hadmlog::find();
        $query = Hadmlog::find()->orderBy([
            'admdate' => SORT_DESC,
            //'item_no'=>SORT_ASC
        ]);
        $query->Where(['disdate' => null]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 10),
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        

        $query->andFilterWhere([
            'patage' => $this->patage,
            'admdate' => $this->admdate,
            'admtime' => $this->admtime,
            //'disdate' => $this->disdate,
            'distime' => $this->distime,
            'datemod' => $this->datemod,
            'patagemo' => $this->patagemo,
            'patagedy' => $this->patagedy,
            'patagehr' => $this->patagehr,
            'pexpireddate' => $this->pexpireddate,
            'lockdte' => $this->lockdte,
        ]);

        
        
        $query->andFilterWhere(['like', 'enccode', $this->enccode])
            ->andFilterWhere(['like', 'hpercode', $this->hpercode])
            ->andFilterWhere(['like', 'upicode', $this->upicode])
            ->andFilterWhere(['like', 'casenum', $this->casenum])
            ->andFilterWhere(['like', 'newold', $this->newold])
            ->andFilterWhere(['like', 'tacode', $this->tacode])
            ->andFilterWhere(['like', 'tscode', $this->tscode])
            ->andFilterWhere(['like', 'diagcode', $this->diagcode])
            ->andFilterWhere(['like', 'admnotes', $this->admnotes])
            ->andFilterWhere(['like', 'licno', $this->licno])
            ->andFilterWhere(['like', 'diagfin', $this->diagfin])
            ->andFilterWhere(['like', 'disnotes', $this->disnotes])
            ->andFilterWhere(['like', 'admmode', $this->admmode])
            ->andFilterWhere(['like', 'admpreg', $this->admpreg])
            ->andFilterWhere(['like', 'dispcode', $this->dispcode])
            ->andFilterWhere(['like', 'condcode', $this->condcode])
            ->andFilterWhere(['like', 'licnof', $this->licnof])
            ->andFilterWhere(['like', 'licncons', $this->licncons])
            ->andFilterWhere(['like', 'cbcode', $this->cbcode])
            ->andFilterWhere(['like', 'dcspinst', $this->dcspinst])
            ->andFilterWhere(['like', 'admstat', $this->admstat])
            ->andFilterWhere(['like', 'admlock', $this->admlock])
            ->andFilterWhere(['like', 'updsw', $this->updsw])
            ->andFilterWhere(['like', 'confdl', $this->confdl])
            ->andFilterWhere(['like', 'admtxt', $this->admtxt])
            ->andFilterWhere(['like', 'admclerk', $this->admclerk])
            ->andFilterWhere(['like', 'licno2', $this->licno2])
            ->andFilterWhere(['like', 'licno3', $this->licno3])
            ->andFilterWhere(['like', 'licno4', $this->licno4])
            ->andFilterWhere(['like', 'licno5', $this->licno5])
            ->andFilterWhere(['like', 'admphic', $this->admphic])
            ->andFilterWhere(['like', 'disnotice', $this->disnotice])
            ->andFilterWhere(['like', 'treatment', $this->treatment])
            ->andFilterWhere(['like', 'hsepriv', $this->hsepriv])
            ->andFilterWhere(['like', 'licno6', $this->licno6])
            ->andFilterWhere(['like', 'licno7', $this->licno7])
            ->andFilterWhere(['like', 'licno8', $this->licno8])
            ->andFilterWhere(['like', 'licno9', $this->licno9])
            ->andFilterWhere(['like', 'licno10', $this->licno10])
            ->andFilterWhere(['like', 'itisind', $this->itisind])
            ->andFilterWhere(['like', 'entryby', $this->entryby])
            ->andFilterWhere(['like', 'acis', $this->acis])
            ->andFilterWhere(['like', 'watchid', $this->watchid])
            ->andFilterWhere(['like', 'lockby', $this->lockby])
            ->andFilterWhere(['like', 'typadm', $this->typadm])
            ->andFilterWhere(['like', 'pho_hospital_number', $this->pho_hospital_number]);
           
        return $dataProvider;
    }
}
