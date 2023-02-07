<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hcity".
 *
 * @property string $ctycode
 * @property string $ctyname
 * @property string|null $ctystat
 * @property string|null $ctylock
 * @property string|null $ctyabbrev
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string $ctyreg
 * @property string $ctyprovcod
 * @property string $ctynsocod
 * @property string|null $ctytype
 * @property string|null $ctyzipcode
 * @property string|null $ctydist
 *
 * @property Hprov $ctyprovcod0
 * @property Hbrgy[] $hbrgies
 */
class Hcity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hcity';
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
            [['ctycode'], 'required'],
            [['datemod'], 'safe'],
            [['ctycode'], 'string', 'max' => 6],
            [['ctyname'], 'string', 'max' => 50],
            [['ctystat', 'ctylock', 'updsw', 'ctytype', 'ctydist'], 'string', 'max' => 1],
            [['ctyabbrev'], 'string', 'max' => 10],
            [['ctyreg', 'ctynsocod'], 'string', 'max' => 2],
            [['ctyprovcod', 'ctyzipcode'], 'string', 'max' => 4],
            [['ctycode'], 'unique'],
            [['ctyprovcod'], 'exist', 'skipOnError' => true, 'targetClass' => Hprov::className(), 'targetAttribute' => ['ctyprovcod' => 'provcode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ctycode' => 'Ctycode',
            'ctyname' => 'Ctyname',
            'ctystat' => 'Ctystat',
            'ctylock' => 'Ctylock',
            'ctyabbrev' => 'Ctyabbrev',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'ctyreg' => 'Ctyreg',
            'ctyprovcod' => 'Ctyprovcod',
            'ctynsocod' => 'Ctynsocod',
            'ctytype' => 'Ctytype',
            'ctyzipcode' => 'Ctyzipcode',
            'ctydist' => 'Ctydist',
        ];
    }

    /**
     * Gets query for [[Ctyprovcod0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCtyprovcod0()
    {
        return $this->hasOne(Hprov::className(), ['provcode' => 'ctyprovcod']);
    }

    /**
     * Gets query for [[Hbrgies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHbrgies()
    {
        return $this->hasMany(Hbrgy::className(), ['bgymuncod' => 'ctycode']);
    }
}
