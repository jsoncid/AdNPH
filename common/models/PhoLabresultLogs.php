<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pho_labresult_logs".
 *
 * @property int $rf_id_logs
 * @property int $rf_id
 * @property string $update_by
 * @property string $update_on
 * @property string $remarks
 * @property string $enccode
 * @property string $action
 *
 * @property PhoLabresult $rf
 */
class PhoLabresultLogs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pho_labresult_logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rf_id'], 'required'],
            [['rf_id'], 'integer'],
            [['update_on'], 'safe'],
            [['update_by', 'remarks', 'action'], 'string', 'max' => 1024],
            [['enccode'], 'string', 'max' => 48],
            [['rf_id'], 'exist', 'skipOnError' => true, 'targetClass' => PhoLabresult::class, 'targetAttribute' => ['rf_id' => 'rf_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rf_id_logs' => 'Rf Id Logs',
            'rf_id' => 'Rf ID',
            'update_by' => 'Update By',
            'update_on' => 'Update On',
            'remarks' => 'Remarks',
            'enccode' => 'Enccode',
            'action' => 'Action',
        ];
    }

    /**
     * Gets query for [[Rf]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRf()
    {
        return $this->hasOne(PhoLabresult1::class, ['rf_id' => 'rf_id']);
    }
}
