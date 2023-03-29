<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pho_rad_result".
 *
 * @property int $rf_id
 * @property string $date
 * @property string $added_by
 * @property int $rt_id
 * @property string $enccode
 * @property string $remarks
 *
 * @property PhoRadOptionValue[] $phoRadOptionValues
 */
class PhoRadResult extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pho_rad_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['rt_id'], 'required'],
            [['rt_id'], 'integer'],
            [['remarks'], 'string'],
            [['added_by'], 'string', 'max' => 1024],
            [['enccode'], 'string', 'max' => 48],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rf_id' => 'Rf ID',
            'date' => 'Date',
            'added_by' => 'Added By',
            'rt_id' => 'Rt ID',
            'enccode' => 'Enccode',
            'remarks' => 'Remarks',
        ];
    }

    /**
     * Gets query for [[PhoRadOptionValues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhoRadOptionValue()
    {
        return $this->hasMany(PhoRadOptionValue::class, ['rf_id' => 'rf_id']);
    }
}
