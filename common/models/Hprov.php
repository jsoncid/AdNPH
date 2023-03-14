<?php

namespace common\models;

use Yii;
use common\models\Hregion;

/**
 * This is the model class for table "hprov".
 *
 * @property string $provcode
 * @property string $provname
 * @property string|null $provabbrev
 * @property string|null $provstat
 * @property string|null $provlock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string $provreg
 * @property string $provnsocod
 * @property string|null $provdohcod
 *
 * @property Hcity[] $hcities
 * @property Hregion $provreg0
 */
class Hprov extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hprov';
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
            [['provcode'], 'required'],
            [['datemod'], 'safe'],
            [['provcode', 'provdohcod'], 'string', 'max' => 4],
            [['provname'], 'string', 'max' => 50],
            [['provabbrev'], 'string', 'max' => 10],
            [['provstat', 'provlock', 'updsw'], 'string', 'max' => 1],
            [['provreg', 'provnsocod'], 'string', 'max' => 2],
            [['provcode'], 'unique'],
            [['provreg'], 'exist', 'skipOnError' => true, 'targetClass' => Hregion::className(), 'targetAttribute' => ['provreg' => 'regcode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'provcode' => 'Provcode',
            'provname' => 'Provname',
            'provabbrev' => 'Provabbrev',
            'provstat' => 'Provstat',
            'provlock' => 'Provlock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'provreg' => 'Provreg',
            'provnsocod' => 'Provnsocod',
            'provdohcod' => 'Provdohcod',
        ];
    }

    /**
     * Gets query for [[Hcities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHcities()
    {
        return $this->hasMany(Hcity::className(), ['ctyprovcod' => 'provcode']);
    }

    /**
     * Gets query for [[Provreg0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProvreg0()
    {
        return $this->hasOne(Hregion::className(), ['regcode' => 'provreg']);
    }
}
