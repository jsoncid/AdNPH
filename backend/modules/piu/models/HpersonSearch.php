<?php

namespace backend\modules\piu\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Hperson;

/**
 * HpersonSearch represents the model behind the search form about `common\models\Hperson`.
 */
class HpersonSearch extends Hperson
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hpatkey', 'hfhudcode', 'hpercode', 'hpatcode', 'upicode', 'hhcode', 'relhhhead', 'resarrange', 'hspocode', 'hspoupi', 'upistcode', 'patlast', 'patfirst', 'patmiddle', 'patsuffix', 'patprefix', 'patdegree', 'patalias', 'patmaidnm', 'patbdate', 'patbplace', 'patsex', 'patcstat', 'patempstat', 'citcode', 'natcode', 'relcode', 'hfatcode', 'hfatupi', 'hmotcode', 'hmotupi', 'patmmdn', 'phicnum', 'patmedno', 'patemernme', 'patemaddr', 'pattelno', 'relemacode', 'f_dec', 'patstat', 'patlock', 'datemod', 'updsw', 'confdl', 'fm_dec', 'bldcode', 'entryby', 'fatlast', 'fatfirst', 'fatmid', 'motlast', 'motfirst', 'motmid', 'splast', 'spfirst', 'spmid', 'fataddr', 'motaddr', 'spaddr', 'fatsuffix', 'motsuffix', 'spsuffix', 'fatempname', 'fatempaddr', 'fatempeml', 'fatemptel', 'motempname', 'motempaddr', 'motempeml', 'motemptel', 'spempname', 'spempaddr', 'spempeml', 'spemptel', 'fattel', 'mottel', 'mssno', 'srcitizen', 'picname', 's_dec', 'hospperson', 'hsmokingcs'], 'safe'],
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
        $query = Hperson::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'patbdate' => $this->patbdate,
            'datemod' => $this->datemod,
        ]);

        $query->andFilterWhere(['like', 'hpatkey', $this->hpatkey])
            ->andFilterWhere(['like', 'hfhudcode', $this->hfhudcode])
            ->andFilterWhere(['like', 'hpercode', $this->hpercode])
            ->andFilterWhere(['like', 'hpatcode', $this->hpatcode])
            ->andFilterWhere(['like', 'upicode', $this->upicode])
            ->andFilterWhere(['like', 'hhcode', $this->hhcode])
            ->andFilterWhere(['like', 'relhhhead', $this->relhhhead])
            ->andFilterWhere(['like', 'resarrange', $this->resarrange])
            ->andFilterWhere(['like', 'hspocode', $this->hspocode])
            ->andFilterWhere(['like', 'hspoupi', $this->hspoupi])
            ->andFilterWhere(['like', 'upistcode', $this->upistcode])
            ->andFilterWhere(['like', 'patlast', $this->patlast])
            ->andFilterWhere(['like', 'patfirst', $this->patfirst])
            ->andFilterWhere(['like', 'patmiddle', $this->patmiddle])
            ->andFilterWhere(['like', 'patsuffix', $this->patsuffix])
            ->andFilterWhere(['like', 'patprefix', $this->patprefix])
            ->andFilterWhere(['like', 'patdegree', $this->patdegree])
            ->andFilterWhere(['like', 'patalias', $this->patalias])
            ->andFilterWhere(['like', 'patmaidnm', $this->patmaidnm])
            ->andFilterWhere(['like', 'patbplace', $this->patbplace])
            ->andFilterWhere(['like', 'patsex', $this->patsex])
            ->andFilterWhere(['like', 'patcstat', $this->patcstat])
            ->andFilterWhere(['like', 'patempstat', $this->patempstat])
            ->andFilterWhere(['like', 'citcode', $this->citcode])
            ->andFilterWhere(['like', 'natcode', $this->natcode])
            ->andFilterWhere(['like', 'relcode', $this->relcode])
            ->andFilterWhere(['like', 'hfatcode', $this->hfatcode])
            ->andFilterWhere(['like', 'hfatupi', $this->hfatupi])
            ->andFilterWhere(['like', 'hmotcode', $this->hmotcode])
            ->andFilterWhere(['like', 'hmotupi', $this->hmotupi])
            ->andFilterWhere(['like', 'patmmdn', $this->patmmdn])
            ->andFilterWhere(['like', 'phicnum', $this->phicnum])
            ->andFilterWhere(['like', 'patmedno', $this->patmedno])
            ->andFilterWhere(['like', 'patemernme', $this->patemernme])
            ->andFilterWhere(['like', 'patemaddr', $this->patemaddr])
            ->andFilterWhere(['like', 'pattelno', $this->pattelno])
            ->andFilterWhere(['like', 'relemacode', $this->relemacode])
            ->andFilterWhere(['like', 'f_dec', $this->f_dec])
            ->andFilterWhere(['like', 'patstat', $this->patstat])
            ->andFilterWhere(['like', 'patlock', $this->patlock])
            ->andFilterWhere(['like', 'updsw', $this->updsw])
            ->andFilterWhere(['like', 'confdl', $this->confdl])
            ->andFilterWhere(['like', 'fm_dec', $this->fm_dec])
            ->andFilterWhere(['like', 'bldcode', $this->bldcode])
            ->andFilterWhere(['like', 'entryby', $this->entryby])
            ->andFilterWhere(['like', 'fatlast', $this->fatlast])
            ->andFilterWhere(['like', 'fatfirst', $this->fatfirst])
            ->andFilterWhere(['like', 'fatmid', $this->fatmid])
            ->andFilterWhere(['like', 'motlast', $this->motlast])
            ->andFilterWhere(['like', 'motfirst', $this->motfirst])
            ->andFilterWhere(['like', 'motmid', $this->motmid])
            ->andFilterWhere(['like', 'splast', $this->splast])
            ->andFilterWhere(['like', 'spfirst', $this->spfirst])
            ->andFilterWhere(['like', 'spmid', $this->spmid])
            ->andFilterWhere(['like', 'fataddr', $this->fataddr])
            ->andFilterWhere(['like', 'motaddr', $this->motaddr])
            ->andFilterWhere(['like', 'spaddr', $this->spaddr])
            ->andFilterWhere(['like', 'fatsuffix', $this->fatsuffix])
            ->andFilterWhere(['like', 'motsuffix', $this->motsuffix])
            ->andFilterWhere(['like', 'spsuffix', $this->spsuffix])
            ->andFilterWhere(['like', 'fatempname', $this->fatempname])
            ->andFilterWhere(['like', 'fatempaddr', $this->fatempaddr])
            ->andFilterWhere(['like', 'fatempeml', $this->fatempeml])
            ->andFilterWhere(['like', 'fatemptel', $this->fatemptel])
            ->andFilterWhere(['like', 'motempname', $this->motempname])
            ->andFilterWhere(['like', 'motempaddr', $this->motempaddr])
            ->andFilterWhere(['like', 'motempeml', $this->motempeml])
            ->andFilterWhere(['like', 'motemptel', $this->motemptel])
            ->andFilterWhere(['like', 'spempname', $this->spempname])
            ->andFilterWhere(['like', 'spempaddr', $this->spempaddr])
            ->andFilterWhere(['like', 'spempeml', $this->spempeml])
            ->andFilterWhere(['like', 'spemptel', $this->spemptel])
            ->andFilterWhere(['like', 'fattel', $this->fattel])
            ->andFilterWhere(['like', 'mottel', $this->mottel])
            ->andFilterWhere(['like', 'mssno', $this->mssno])
            ->andFilterWhere(['like', 'srcitizen', $this->srcitizen])
            ->andFilterWhere(['like', 'picname', $this->picname])
            ->andFilterWhere(['like', 's_dec', $this->s_dec])
            ->andFilterWhere(['like', 'hospperson', $this->hospperson])
            ->andFilterWhere(['like', 'hsmokingcs', $this->hsmokingcs]);

        return $dataProvider;
    }
}
