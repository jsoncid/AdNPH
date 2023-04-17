<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hsignsymptoms".
 *
 * @property string $enccode
 * @property string $entryby
 * @property string $datelog
 * @property string $timelog
 * @property string $datemod
 * @property string|null $alter_mental_sensorium
 * @property string|null $abdominal_cramp_pain
 * @property string|null $anorexia
 * @property string|null $bleeding_gums
 * @property string|null $body_weakness
 * @property string|null $blurring_vision
 * @property string|null $chest_pain_discomfort
 * @property string|null $constipation
 * @property string|null $cough
 * @property string|null $diarrhea
 * @property string|null $dizziness
 * @property string|null $dysphagia
 * @property string|null $dysuria
 * @property string|null $epistaxis
 * @property string|null $fever
 * @property string|null $frequent_urination
 * @property string|null $headache
 * @property string|null $hematemesis
 * @property string|null $hematuria
 * @property string|null $hemoptysis
 * @property string|null $irritability
 * @property string|null $jaundice
 * @property string|null $lower_extremity_edema
 * @property string|null $myalgia
 * @property string|null $orthopnea
 * @property string|null $painsite
 * @property string|null $palpitations
 * @property string|null $seizures
 * @property string|null $skin_rashes
 * @property string|null $sbbtm
 * @property string|null $sweating
 * @property string|null $urgency
 * @property string|null $vomiting
 * @property string|null $weight_loss
 * @property string|null $others
 * @property string|null $dyspnea
 */
class Hsignsymptoms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hsignsymptoms';
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
            [['enccode', 'datelog', 'timelog', 'datemod'], 'required'],
            [['datelog', 'timelog', 'datemod'], 'safe'],
            [['enccode'], 'string', 'max' => 48],
            [['entryby'], 'string', 'max' => 15],
            [['alter_mental_sensorium', 'abdominal_cramp_pain', 'anorexia', 'bleeding_gums', 'body_weakness', 'blurring_vision', 'chest_pain_discomfort', 'constipation', 'cough', 'diarrhea', 'dizziness', 'dysphagia', 'dysuria', 'epistaxis', 'fever', 'frequent_urination', 'headache', 'hematemesis', 'hematuria', 'hemoptysis', 'irritability', 'jaundice', 'lower_extremity_edema', 'myalgia', 'orthopnea', 'palpitations', 'seizures', 'skin_rashes', 'sbbtm', 'sweating', 'urgency', 'vomiting', 'weight_loss', 'dyspnea'], 'string', 'max' => 2],
            [['painsite', 'others'], 'string', 'max' => 100],
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
            'entryby' => 'Entryby',
            'datelog' => 'Datelog',
            'timelog' => 'Timelog',
            'datemod' => 'Datemod',
            'alter_mental_sensorium' => 'Alter Mental Sensorium',
            'abdominal_cramp_pain' => 'Abdominal Cramp Pain',
            'anorexia' => 'Anorexia',
            'bleeding_gums' => 'Bleeding Gums',
            'body_weakness' => 'Body Weakness',
            'blurring_vision' => 'Blurring Vision',
            'chest_pain_discomfort' => 'Chest Pain Discomfort',
            'constipation' => 'Constipation',
            'cough' => 'Cough',
            'diarrhea' => 'Diarrhea',
            'dizziness' => 'Dizziness',
            'dysphagia' => 'Dysphagia',
            'dysuria' => 'Dysuria',
            'epistaxis' => 'Epistaxis',
            'fever' => 'Fever',
            'frequent_urination' => 'Frequent Urination',
            'headache' => 'Headache',
            'hematemesis' => 'Hematemesis',
            'hematuria' => 'Hematuria',
            'hemoptysis' => 'Hemoptysis',
            'irritability' => 'Irritability',
            'jaundice' => 'Jaundice',
            'lower_extremity_edema' => 'Lower Extremity Edema',
            'myalgia' => 'Myalgia',
            'orthopnea' => 'Orthopnea',
            'painsite' => 'Painsite',
            'palpitations' => 'Palpitations',
            'seizures' => 'Seizures',
            'skin_rashes' => 'Skin Rashes',
            'sbbtm' => 'Sbbtm',
            'sweating' => 'Sweating',
            'urgency' => 'Urgency',
            'vomiting' => 'Vomiting',
            'weight_loss' => 'Weight Loss',
            'others' => 'Others',
            'dyspnea' => 'Dyspnea',
        ];
    }
}
