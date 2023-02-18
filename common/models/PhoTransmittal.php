<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pho_transmittal".
 *
 * @property int $tid
 * @property int $created_by
 * @property string $created_date
 * @property string $transmit_to
 * @property string|null $transmit_remarks
 * @property int|null $is_received
 * @property int|null $received_by
 * @property string|null $received_date
 * @property string|null $received_remarks
 *
 * @property PhoTransmittalDetails[] $phoTransmittalDetails
 */
class PhoTransmittal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pho_transmittal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by', 'transmit_to'], 'required'],
            [['created_by', 'is_received', 'received_by'], 'integer'],
            [['created_date', 'received_date'], 'safe'],
            [['transmit_remarks', 'received_remarks'], 'string'],
            [['transmit_to'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tid' => 'Tid',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'transmit_to' => 'Transmit To',
            'transmit_remarks' => 'Transmit Remarks',
            'is_received' => 'Is Received',
            'received_by' => 'Received By',
            'received_date' => 'Received Date',
            'received_remarks' => 'Received Remarks',
        ];
    }

    /**
     * Gets query for [[PhoTransmittalDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhoTransmittalDetails()
    {
        return $this->hasMany(PhoTransmittalDetails::class, ['tid' => 'tid']);
    }
}
