<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hprenatal".
 *
 * @property string $enccode
 * @property string|null $prenataldte
 * @property string|null $vsnormal
 * @property string|null $lowrisk
 * @property string|null $lmp
 * @property string|null $menarch
 * @property string|null $ob_g
 * @property string|null $ob_p
 * @property string|null $ob_t
 * @property string|null $ob_p1
 * @property string|null $ob_a
 * @property string|null $ob_l
 * @property string|null $multiple
 * @property string|null $ovarian
 * @property string|null $myoma
 * @property string|null $placenta
 * @property string|null $miscarriage
 * @property string|null $stillbirth
 * @property string|null $preeclampsia
 * @property string|null $eclampsia
 * @property string|null $contraction
 * @property string|null $hypertension
 * @property string|null $heart
 * @property string|null $diabetes
 * @property string|null $thyroid
 * @property string|null $obesity
 * @property string|null $asthma
 * @property string|null $epilepsy
 * @property string|null $renal
 * @property string|null $bleeding
 * @property string|null $cesarian
 * @property string|null $myonectomy
 * @property string|null $mcp
 * @property string|null $expectdeliverydte
 * @property string|null $prenataldte2
 * @property string|null $prenataldte3
 * @property string|null $prenataldte4
 * @property string|null $prenataldte5
 * @property string|null $prenataldte6
 * @property string|null $prenataldte7
 * @property string|null $prenataldte8
 * @property string|null $prenataldte9
 * @property string|null $prenataldte10
 * @property string|null $prenataldte11
 * @property string|null $prenataldte12
 * @property string|null $aog2
 * @property string|null $aog3
 * @property string|null $aog4
 * @property string|null $aog5
 * @property string|null $aog6
 * @property string|null $aog7
 * @property string|null $aog8
 * @property string|null $aog9
 * @property string|null $aog10
 * @property string|null $aog11
 * @property string|null $aog12
 * @property string|null $weight2
 * @property string|null $weight3
 * @property string|null $weight4
 * @property string|null $weight5
 * @property string|null $weight6
 * @property string|null $weight7
 * @property string|null $weight8
 * @property string|null $weight9
 * @property string|null $weight10
 * @property string|null $weight11
 * @property string|null $weight12
 * @property string|null $cardiac2
 * @property string|null $cardiac3
 * @property string|null $cardiac4
 * @property string|null $cardiac5
 * @property string|null $cardiac6
 * @property string|null $cardiac7
 * @property string|null $cardiac8
 * @property string|null $cardiac9
 * @property string|null $cardiac10
 * @property string|null $cardiac11
 * @property string|null $cardiac12
 * @property string|null $respiratory2
 * @property string|null $respiratory3
 * @property string|null $respiratory4
 * @property string|null $respiratory5
 * @property string|null $respiratory6
 * @property string|null $respiratory7
 * @property string|null $respiratory8
 * @property string|null $respiratory9
 * @property string|null $respiratory10
 * @property string|null $respiratory11
 * @property string|null $respiratory12
 * @property string|null $blood2
 * @property string|null $blood3
 * @property string|null $blood4
 * @property string|null $blood5
 * @property string|null $blood6
 * @property string|null $blood7
 * @property string|null $blood8
 * @property string|null $blood9
 * @property string|null $blood10
 * @property string|null $blood11
 * @property string|null $blood12
 * @property string|null $temperature2
 * @property string|null $temperature3
 * @property string|null $temperature4
 * @property string|null $temperature5
 * @property string|null $temperature6
 * @property string|null $temperature7
 * @property string|null $temperature8
 * @property string|null $temperature9
 * @property string|null $temperature10
 * @property string|null $temperature11
 * @property string|null $temperature12
 * @property string|null $datemod
 * @property string|null $entryby
 */
class Hprenatal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hprenatal';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enccode'], 'required'],
            [['prenataldte', 'lmp', 'expectdeliverydte', 'prenataldte2', 'prenataldte3', 'prenataldte4', 'prenataldte5', 'prenataldte6', 'prenataldte7', 'prenataldte8', 'prenataldte9', 'prenataldte10', 'prenataldte11', 'prenataldte12', 'datemod'], 'safe'],
            [['enccode'], 'string', 'max' => 48],
            [['vsnormal', 'lowrisk', 'multiple', 'ovarian', 'myoma', 'placenta', 'miscarriage', 'stillbirth', 'preeclampsia', 'eclampsia', 'contraction', 'hypertension', 'heart', 'diabetes', 'thyroid', 'obesity', 'asthma', 'epilepsy', 'renal', 'bleeding', 'cesarian', 'myonectomy', 'mcp'], 'string', 'max' => 1],
            [['menarch'], 'string', 'max' => 20],
            [['ob_g', 'ob_p', 'ob_t', 'ob_p1', 'ob_a', 'ob_l'], 'string', 'max' => 2],
            [['aog2', 'aog3', 'aog4', 'aog5', 'aog6', 'aog7', 'aog8', 'aog9', 'aog10', 'aog11', 'aog12', 'weight2', 'weight3', 'weight4', 'weight5', 'weight6', 'weight7', 'weight8', 'weight9', 'weight10', 'weight11', 'weight12', 'cardiac2', 'cardiac3', 'cardiac4', 'cardiac5', 'cardiac6', 'cardiac7', 'cardiac8', 'cardiac9', 'cardiac10', 'cardiac11', 'cardiac12', 'respiratory2', 'respiratory3', 'respiratory4', 'respiratory5', 'respiratory6', 'respiratory7', 'respiratory8', 'respiratory9', 'respiratory10', 'respiratory11', 'respiratory12', 'blood2', 'blood3', 'blood4', 'blood5', 'blood6', 'blood7', 'blood8', 'blood9', 'blood10', 'blood11', 'blood12', 'temperature2', 'temperature3', 'temperature4', 'temperature5', 'temperature6', 'temperature7', 'temperature8', 'temperature9', 'temperature10', 'temperature11', 'temperature12'], 'string', 'max' => 50],
            [['entryby'], 'string', 'max' => 15],
            [['enccode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'enccode' => 'Enccode',
            'prenataldte' => 'Prenataldte',
            'vsnormal' => 'Vsnormal',
            'lowrisk' => 'Lowrisk',
            'lmp' => 'Lmp',
            'menarch' => 'Menarch',
            'ob_g' => 'Ob G',
            'ob_p' => 'Ob P',
            'ob_t' => 'Ob T',
            'ob_p1' => 'Ob P1',
            'ob_a' => 'Ob A',
            'ob_l' => 'Ob L',
            'multiple' => 'Multiple',
            'ovarian' => 'Ovarian',
            'myoma' => 'Myoma',
            'placenta' => 'Placenta',
            'miscarriage' => 'Miscarriage',
            'stillbirth' => 'Stillbirth',
            'preeclampsia' => 'Preeclampsia',
            'eclampsia' => 'Eclampsia',
            'contraction' => 'Contraction',
            'hypertension' => 'Hypertension',
            'heart' => 'Heart',
            'diabetes' => 'Diabetes',
            'thyroid' => 'Thyroid',
            'obesity' => 'Obesity',
            'asthma' => 'Asthma',
            'epilepsy' => 'Epilepsy',
            'renal' => 'Renal',
            'bleeding' => 'Bleeding',
            'cesarian' => 'Cesarian',
            'myonectomy' => 'Myonectomy',
            'mcp' => 'Mcp',
            'expectdeliverydte' => 'Expectdeliverydte',
            'prenataldte2' => 'Prenataldte2',
            'prenataldte3' => 'Prenataldte3',
            'prenataldte4' => 'Prenataldte4',
            'prenataldte5' => 'Prenataldte5',
            'prenataldte6' => 'Prenataldte6',
            'prenataldte7' => 'Prenataldte7',
            'prenataldte8' => 'Prenataldte8',
            'prenataldte9' => 'Prenataldte9',
            'prenataldte10' => 'Prenataldte10',
            'prenataldte11' => 'Prenataldte11',
            'prenataldte12' => 'Prenataldte12',
            'aog2' => 'Aog2',
            'aog3' => 'Aog3',
            'aog4' => 'Aog4',
            'aog5' => 'Aog5',
            'aog6' => 'Aog6',
            'aog7' => 'Aog7',
            'aog8' => 'Aog8',
            'aog9' => 'Aog9',
            'aog10' => 'Aog10',
            'aog11' => 'Aog11',
            'aog12' => 'Aog12',
            'weight2' => 'Weight2',
            'weight3' => 'Weight3',
            'weight4' => 'Weight4',
            'weight5' => 'Weight5',
            'weight6' => 'Weight6',
            'weight7' => 'Weight7',
            'weight8' => 'Weight8',
            'weight9' => 'Weight9',
            'weight10' => 'Weight10',
            'weight11' => 'Weight11',
            'weight12' => 'Weight12',
            'cardiac2' => 'Cardiac2',
            'cardiac3' => 'Cardiac3',
            'cardiac4' => 'Cardiac4',
            'cardiac5' => 'Cardiac5',
            'cardiac6' => 'Cardiac6',
            'cardiac7' => 'Cardiac7',
            'cardiac8' => 'Cardiac8',
            'cardiac9' => 'Cardiac9',
            'cardiac10' => 'Cardiac10',
            'cardiac11' => 'Cardiac11',
            'cardiac12' => 'Cardiac12',
            'respiratory2' => 'Respiratory2',
            'respiratory3' => 'Respiratory3',
            'respiratory4' => 'Respiratory4',
            'respiratory5' => 'Respiratory5',
            'respiratory6' => 'Respiratory6',
            'respiratory7' => 'Respiratory7',
            'respiratory8' => 'Respiratory8',
            'respiratory9' => 'Respiratory9',
            'respiratory10' => 'Respiratory10',
            'respiratory11' => 'Respiratory11',
            'respiratory12' => 'Respiratory12',
            'blood2' => 'Blood2',
            'blood3' => 'Blood3',
            'blood4' => 'Blood4',
            'blood5' => 'Blood5',
            'blood6' => 'Blood6',
            'blood7' => 'Blood7',
            'blood8' => 'Blood8',
            'blood9' => 'Blood9',
            'blood10' => 'Blood10',
            'blood11' => 'Blood11',
            'blood12' => 'Blood12',
            'temperature2' => 'Temperature2',
            'temperature3' => 'Temperature3',
            'temperature4' => 'Temperature4',
            'temperature5' => 'Temperature5',
            'temperature6' => 'Temperature6',
            'temperature7' => 'Temperature7',
            'temperature8' => 'Temperature8',
            'temperature9' => 'Temperature9',
            'temperature10' => 'Temperature10',
            'temperature11' => 'Temperature11',
            'temperature12' => 'Temperature12',
            'datemod' => 'Datemod',
            'entryby' => 'Entryby',
        ];
    }
}
