<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hregion".
 *
 * @property string $regcode
 * @property string $regname
 * @property string|null $regstat
 * @property string|null $reglock
 * @property string|null $regabbrev
 * @property string|null $regdtemod
 * @property string|null $updsw
 *
 * @property Hprov[] $hprovs
 */
class Hregion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hregion';
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
            [['regcode'], 'required'],
            [['regdtemod'], 'safe'],
            [['regcode'], 'string', 'max' => 2],
            [['regname'], 'string', 'max' => 50],
            [['regstat', 'reglock', 'updsw'], 'string', 'max' => 1],
            [['regabbrev'], 'string', 'max' => 10],
            [['regcode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'regcode' => 'Regcode',
            'regname' => 'Regname',
            'regstat' => 'Regstat',
            'reglock' => 'Reglock',
            'regabbrev' => 'Regabbrev',
            'regdtemod' => 'Regdtemod',
            'updsw' => 'Updsw',
        ];
    }

    /**
     * Gets query for [[Hprovs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHprovs()
    {
        return $this->hasMany(Hprov::class, ['provreg' => 'regcode']);
    }
}
