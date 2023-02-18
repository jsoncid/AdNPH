<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pho_transmittal_details".
 *
 * @property int $tdid
 * @property int $tid
 * @property string $enccode
 *
 * @property PhoTransmittal $t
 */
class PhoTransmittalDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pho_transmittal_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tid', 'enccode'], 'required'],
            [['tid'], 'integer'],
            [['enccode'], 'string'],
            [['tid'], 'exist', 'skipOnError' => true, 'targetClass' => PhoTransmittal::class, 'targetAttribute' => ['tid' => 'tid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tdid' => 'Tdid',
            'tid' => 'Tid',
            'enccode' => 'Enccode',
        ];
    }

    /**
     * Gets query for [[T]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getT()
    {
        return $this->hasOne(PhoTransmittal::class, ['tid' => 'tid']);
    }
}
