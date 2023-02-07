<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hbrgy".
 *
 * @property string $bgycode
 * @property string $bgyname
 * @property string|null $bgystat
 * @property string|null $bgylock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string $bgyreg
 * @property string $bgyprcode
 * @property string $bgynsocod
 * @property string $bgynsobc
 * @property string $bgymuncod
 *
 * @property Hcity $bgymuncod0
 * @property Haddr[] $haddrs
 */
class Hbrgy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hbrgy';
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
            [['bgycode'], 'required'],
            [['datemod'], 'safe'],
            [['bgycode'], 'string', 'max' => 9],
            [['bgyname'], 'string', 'max' => 40],
            [['bgystat', 'bgylock', 'updsw'], 'string', 'max' => 1],
            [['bgyreg', 'bgynsocod'], 'string', 'max' => 2],
            [['bgyprcode'], 'string', 'max' => 4],
            [['bgynsobc'], 'string', 'max' => 3],
            [['bgymuncod'], 'string', 'max' => 6],
            [['bgycode'], 'unique'],
            [['bgycode', 'bgyname', 'bgystat'], 'unique', 'targetAttribute' => ['bgycode', 'bgyname', 'bgystat']],
            [['bgymuncod'], 'exist', 'skipOnError' => true, 'targetClass' => Hcity::className(), 'targetAttribute' => ['bgymuncod' => 'ctycode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bgycode' => 'Bgycode',
            'bgyname' => 'Bgyname',
            'bgystat' => 'Bgystat',
            'bgylock' => 'Bgylock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'bgyreg' => 'Bgyreg',
            'bgyprcode' => 'Bgyprcode',
            'bgynsocod' => 'Bgynsocod',
            'bgynsobc' => 'Bgynsobc',
            'bgymuncod' => 'Bgymuncod',
        ];
    }

    /**
     * Gets query for [[Bgymuncod0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBgymuncod0()
    {
        return $this->hasOne(Hcity::className(), ['ctycode' => 'bgymuncod']);
    }

    /**
     * Gets query for [[Haddrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHaddrs()
    {
        return $this->hasMany(Haddr::className(), ['brg' => 'bgycode']);
    }
}
