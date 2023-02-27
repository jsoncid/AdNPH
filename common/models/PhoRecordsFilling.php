<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pho_records_filling".
 *
 * @property int $rf
 * @property string|null $enccode
 * @property int|null $is_received
 * @property int|null $is_scanned
 * @property int|null $is_forward_to_claims
 * @property int|null $received_by
 * @property int|null $scanned_by
 * @property int|null $forward_to_claims_by
 * @property int|null $update_received_by
 * @property int|null $update_scanned_by
 * @property int|null $update_forward_to_claims_by
 * @property string|null $date_received_by
 * @property string|null $date_scanned_by
 * @property string|null $date_forward_to_claims
 * @property string|null $date_update_received
 * @property string|null $date_update_scanned
 * @property string|null $date_update_forward_to
 */
class PhoRecordsFilling extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pho_records_filling';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enccode'], 'string'],
            [['is_received', 'is_scanned', 'is_forward_to_claims', 'received_by', 'scanned_by', 'forward_to_claims_by', 'update_received_by', 'update_scanned_by', 'update_forward_to_claims_by'], 'integer'],
            [['date_received_by', 'date_scanned_by', 'date_forward_to_claims', 'date_update_received', 'date_update_scanned', 'date_update_forward_to'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rf' => 'Rf',
            'enccode' => 'Enccode',
            'is_received' => 'Is Received',
            'is_scanned' => 'Is Scanned',
            'is_forward_to_claims' => 'Is Forward To Claims',
            'received_by' => 'Received By',
            'scanned_by' => 'Scanned By',
            'forward_to_claims_by' => 'Forward To Claims By',
            'update_received_by' => 'Update Received By',
            'update_scanned_by' => 'Update Scanned By',
            'update_forward_to_claims_by' => 'Update Forward To Claims By',
            'date_received_by' => 'Date Received By',
            'date_scanned_by' => 'Date Scanned By',
            'date_forward_to_claims' => 'Date Forward To Claims',
            'date_update_received' => 'Date Update Received',
            'date_update_scanned' => 'Date Update Scanned',
            'date_update_forward_to' => 'Date Update Forward To',
        ];
    }
}
