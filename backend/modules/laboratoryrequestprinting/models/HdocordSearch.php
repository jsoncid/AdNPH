<?php

namespace backend\modules\laboratoryrequestprinting\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Hdocord;

/**
 * HdocordSearch represents the model behind the search form about `common\models\Hdocord`.
 */
class HdocordSearch extends Hdocord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['docointkey', 'enccode', 'dodate', 'dotime', 'licno', 'ordcon', 'orcode', 'hpercode', 'upicode', 'dopriority', 'dodtepost', 'dotmepost', 'dostat', 'dolock', 'datemod', 'updsw', 'confdl', 'donotes', 'entby', 'verby', 'ordreas', 'doctype', 'orderupd', 'intkeyref', 'proccode', 'orstat', 'statdate', 'stattime', 'currency', 'uomcode', 'pcchrgcod', 'pcdisch', 'acctno', 'estatus', 'ordsrc', 'prikey', 'entryby', 'incision_mode', 'dietcode', 'compense', 'rem1', 'discount', 'chrgtype', 'coldte', 'lbno', 'recdte', 'resdte', 'reldte', 'paystat', 'bdate', 'gender', 'apprv', 'apprvby', 'apprvdte', 'apprvrmrks'], 'safe'],
            [['pchrgup', 'pchrgqty', 'pcchrgamt', 'rfee1', 'rfee2', 'rfee3', 'disamt', 'discbal', 'phicamt', 'csamt', 'ncamt', 'paidamt'], 'number'],
            [['opergrp'], 'integer'],
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
        //$query = Hdocord::find();
        $query = Hdocord::find()->orderBy([
            'dodate' => SORT_DESC,
            //'item_no'=>SORT_ASC
        ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'dodate' => $this->dodate,
            'dotime' => $this->dotime,
            'dodtepost' => $this->dodtepost,
            'dotmepost' => $this->dotmepost,
            'datemod' => $this->datemod,
            'statdate' => $this->statdate,
            'stattime' => $this->stattime,
            'pchrgup' => $this->pchrgup,
            'pchrgqty' => $this->pchrgqty,
            'pcchrgamt' => $this->pcchrgamt,
            'opergrp' => $this->opergrp,
            'rfee1' => $this->rfee1,
            'rfee2' => $this->rfee2,
            'rfee3' => $this->rfee3,
            'disamt' => $this->disamt,
            'discbal' => $this->discbal,
            'phicamt' => $this->phicamt,
            'coldte' => $this->coldte,
            'recdte' => $this->recdte,
            'resdte' => $this->resdte,
            'reldte' => $this->reldte,
            'csamt' => $this->csamt,
            'ncamt' => $this->ncamt,
            'paidamt' => $this->paidamt,
            'bdate' => $this->bdate,
            'apprvdte' => $this->apprvdte,
        ]);

        $query->andFilterWhere(['like', 'docointkey', $this->docointkey])
            ->andFilterWhere(['like', 'enccode', $this->enccode])
            ->andFilterWhere(['like', 'licno', $this->licno])
            ->andFilterWhere(['like', 'ordcon', $this->ordcon])
            ->andFilterWhere(['like', 'orcode', $this->orcode])
            ->andFilterWhere(['like', 'hpercode', $this->hpercode])
            ->andFilterWhere(['like', 'upicode', $this->upicode])
            ->andFilterWhere(['like', 'dopriority', $this->dopriority])
            ->andFilterWhere(['like', 'dostat', $this->dostat])
            ->andFilterWhere(['like', 'dolock', $this->dolock])
            ->andFilterWhere(['like', 'updsw', $this->updsw])
            ->andFilterWhere(['like', 'confdl', $this->confdl])
            ->andFilterWhere(['like', 'donotes', $this->donotes])
            ->andFilterWhere(['like', 'entby', $this->entby])
            ->andFilterWhere(['like', 'verby', $this->verby])
            ->andFilterWhere(['like', 'ordreas', $this->ordreas])
            ->andFilterWhere(['like', 'doctype', $this->doctype])
            ->andFilterWhere(['like', 'orderupd', $this->orderupd])
            ->andFilterWhere(['like', 'intkeyref', $this->intkeyref])
            ->andFilterWhere(['like', 'proccode', $this->proccode])
            ->andFilterWhere(['like', 'orstat', $this->orstat])
            ->andFilterWhere(['like', 'currency', $this->currency])
            ->andFilterWhere(['like', 'uomcode', $this->uomcode])
            ->andFilterWhere(['like', 'pcchrgcod', $this->pcchrgcod])
            ->andFilterWhere(['like', 'pcdisch', $this->pcdisch])
            ->andFilterWhere(['like', 'acctno', $this->acctno])
            ->andFilterWhere(['like', 'estatus', $this->estatus])
            ->andFilterWhere(['like', 'ordsrc', $this->ordsrc])
            ->andFilterWhere(['like', 'prikey', $this->prikey])
            ->andFilterWhere(['like', 'entryby', $this->entryby])
            ->andFilterWhere(['like', 'incision_mode', $this->incision_mode])
            ->andFilterWhere(['like', 'dietcode', $this->dietcode])
            ->andFilterWhere(['like', 'compense', $this->compense])
            ->andFilterWhere(['like', 'rem1', $this->rem1])
            ->andFilterWhere(['like', 'discount', $this->discount])
            ->andFilterWhere(['like', 'chrgtype', $this->chrgtype])
            ->andFilterWhere(['like', 'lbno', $this->lbno])
            ->andFilterWhere(['like', 'paystat', $this->paystat])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'apprv', $this->apprv])
            ->andFilterWhere(['like', 'apprvby', $this->apprvby])
            ->andFilterWhere(['like', 'apprvrmrks', $this->apprvrmrks]);

        return $dataProvider;
    }
}
