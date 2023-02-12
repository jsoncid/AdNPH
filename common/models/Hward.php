<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hward".
 *
 * @property string $wardcode
 * @property string $wardname
 * @property string|null $wclcode
 * @property int|null $wardrmno
 * @property string|null $wardstat
 * @property string|null $wardlock
 * @property string|null $wvacov
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string|null $tscode
 * @property int|null $noroom
 * @property string|null $sex
 *
 * @property Hbed[] $hbeds
 * @property Hissuerec[] $hissuerecs
 * @property Hroom[] $hrooms
 * @property Htypser $tscode0
 */
class Hward extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hward';
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
            [['wardcode'], 'required'],
            [['wardrmno', 'noroom'], 'integer'],
            [['datemod'], 'safe'],
            [['wardcode', 'wclcode', 'tscode'], 'string', 'max' => 5],
            [['wardname'], 'string', 'max' => 50],
            [['wardstat', 'wardlock', 'wvacov', 'updsw', 'sex'], 'string', 'max' => 1],
            [['wardcode'], 'unique'],
            [['tscode'], 'exist', 'skipOnError' => true, 'targetClass' => Htypser::className(), 'targetAttribute' => ['tscode' => 'tscode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'wardcode' => 'Wardcode',
            'wardname' => 'Wardname',
            'wclcode' => 'Wclcode',
            'wardrmno' => 'Wardrmno',
            'wardstat' => 'Wardstat',
            'wardlock' => 'Wardlock',
            'wvacov' => 'Wvacov',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'tscode' => 'Tscode',
            'noroom' => 'Noroom',
            'sex' => 'Sex',
        ];
    }

    /**
     * Gets query for [[Hbeds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHbeds()
    {
        return $this->hasMany(Hbed::className(), ['wardcode' => 'wardcode']);
    }

    /**
     * Gets query for [[Hissuerecs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHissuerecs()
    {
        return $this->hasMany(Hissuerec::className(), ['iowardcode' => 'wardcode']);
    }

    /**
     * Gets query for [[Hrooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrooms()
    {
        return $this->hasMany(Hroom::className(), ['wardcode' => 'wardcode']);
    }

    /**
     * Gets query for [[Tscode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTscode0()
    {
        return $this->hasOne(Htypser::className(), ['tscode' => 'tscode']);
    }
}
