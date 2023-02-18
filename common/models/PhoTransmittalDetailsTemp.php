<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pho_transmittal_details_temp".
 *
 * @property int $id
 * @property string $datetime
 * @property int $user
 * @property string $enccode
 *
 * @property User $user0
 */
class PhoTransmittalDetailsTemp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pho_transmittal_details_temp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['datetime'], 'safe'],
            [['user', 'enccode'], 'required'],
            [['user'], 'integer'],
            [['enccode'], 'string'],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'datetime' => 'Datetime',
            'user' => 'User',
            'enccode' => 'Enccode',
        ];
    }

    /**
     * Gets query for [[User0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(User::class, ['id' => 'user']);
    }
}
