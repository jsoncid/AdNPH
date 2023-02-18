<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pho_records_encoding".
 *
 * @property int $re_id
 * @property string $enccode
 * @property string $hospital_num
 * @property string $final_diagnosis
 * @property string|null $additional_final_diagnosis
 * @property string $disdate
 * @property string|null $remarks
 * @property string $created_date
 * @property int $created_by
 * @property int $is_active
 */
class PhoRecordsEncoding extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pho_records_encoding';
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
            [['enccode', 'hospital_num', 'final_diagnosis', 'additional_final_diagnosis', 'remarks'], 'string'],
            [['disdate', 'created_by'], 'required'],
            [['disdate', 'created_date'], 'safe'],
            [['created_by', 'is_active'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            're_id' => 'Re ID',
            'enccode' => 'Enccode',
            'hospital_num' => 'Hospital Num',
            'final_diagnosis' => 'Final Diagnosis',
            'additional_final_diagnosis' => 'Additional Final Diagnosis',
            'disdate' => 'Disdate',
            'remarks' => 'Remarks',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'is_active' => 'Is Active',
        ];
    }
}
