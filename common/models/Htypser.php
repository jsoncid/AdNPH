<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "htypser".
 *
 * @property string $tscode
 * @property string $tsdesc
 * @property string|null $tsstat
 * @property string|null $tslock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string $tstype
 *
 * @property Hadmlog[] $hadmlogs
 * @property Hward[] $hwards
 */
class Htypser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'htypser';
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
            [['tscode'], 'required'],
            [['datemod'], 'safe'],
            [['tscode', 'tstype'], 'string', 'max' => 5],
            [['tsdesc'], 'string', 'max' => 30],
            [['tsstat', 'tslock', 'updsw'], 'string', 'max' => 1],
            [['tscode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tscode' => 'Tscode',
            'tsdesc' => 'Tsdesc',
            'tsstat' => 'Tsstat',
            'tslock' => 'Tslock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'tstype' => 'Tstype',
        ];
    }

    /**
     * Gets query for [[Hadmlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHadmlogs()
    {
        return $this->hasMany(Hadmlog::className(), ['tscode' => 'tscode']);
    }

    /**
     * Gets query for [[Hwards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHwards()
    {
        return $this->hasMany(Hward::className(), ['tscode' => 'tscode']);
    }
}
