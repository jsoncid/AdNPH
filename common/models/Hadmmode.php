<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hadmmode".
 *
 * @property string $admmode
 * @property string $admdesc
 * @property string|null $admstat
 * @property string|null $admlock
 * @property string|null $datemod
 * @property string|null $updsw
 *
 * @property Hadmlog[] $hadmlogs
 */
class Hadmmode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hadmmode';
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
            [['admmode'], 'required'],
            [['datemod'], 'safe'],
            [['admmode'], 'string', 'max' => 5],
            [['admdesc'], 'string', 'max' => 100],
            [['admstat', 'admlock', 'updsw'], 'string', 'max' => 1],
            [['admmode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'admmode' => 'Admmode',
            'admdesc' => 'Admdesc',
            'admstat' => 'Admstat',
            'admlock' => 'Admlock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
        ];
    }

    /**
     * Gets query for [[Hadmlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHadmlogs()
    {
        return $this->hasMany(Hadmlog::className(), ['admmode' => 'admmode']);
    }
}
