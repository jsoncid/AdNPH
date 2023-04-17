<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "haddr".
 *
 * @property string $hpercode
 * @property string|null $patstr
 * @property string|null $brg
 * @property string|null $ctycode
 * @property string|null $provcode
 * @property string|null $patzip
 * @property string|null $cntrycode
 * @property string|null $addstat
 * @property string|null $addlock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string $confdl
 * @property string $haddrdte
 * @property string|null $entryby
 * @property string|null $distzip
 *
 * @property Hbrgy $brg0
 * @property Hperson $hpercode0
 */
class Haddr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'haddr';
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
            [['hpercode', 'haddrdte'], 'required'],
            [['datemod', 'haddrdte'], 'safe'],
            [['hpercode'], 'string', 'max' => 20],
            [['patstr'], 'string', 'max' => 100],
            [['brg'], 'string', 'max' => 9],
            [['ctycode'], 'string', 'max' => 6],
            [['provcode', 'distzip'], 'string', 'max' => 4],
            [['patzip', 'entryby'], 'string', 'max' => 10],
            [['cntrycode'], 'string', 'max' => 5],
            [['addstat', 'addlock', 'updsw', 'confdl'], 'string', 'max' => 1],
            [['hpercode', 'haddrdte'], 'unique', 'targetAttribute' => ['hpercode', 'haddrdte']],
            [['brg'], 'exist', 'skipOnError' => true, 'targetClass' => Hbrgy::className(), 'targetAttribute' => ['brg' => 'bgycode']],
            [['hpercode'], 'exist', 'skipOnError' => true, 'targetClass' => Hperson::className(), 'targetAttribute' => ['hpercode' => 'hpercode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'hpercode' => 'Hpercode',
            'patstr' => 'Patstr',
            'brg' => 'Brg',
            'ctycode' => 'Ctycode',
            'provcode' => 'Provcode',
            'patzip' => 'Patzip',
            'cntrycode' => 'Cntrycode',
            'addstat' => 'Addstat',
            'addlock' => 'Addlock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'confdl' => 'Confdl',
            'haddrdte' => 'Haddrdte',
            'entryby' => 'Entryby',
            'distzip' => 'Distzip',
        ];
    }

    /**
     * Gets query for [[Brg0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrg0()
    {
        return $this->hasOne(Hbrgy::className(), ['bgycode' => 'brg']);
    }

    /**
     * Gets query for [[Hpercode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpercode0()
    {
        return $this->hasOne(Hperson::className(), ['hpercode' => 'hpercode']);
    }
    
    
    public function getHcity0()
    {
        return $this->hasOne(Hcity::className(), ['ctycode' => 'ctycode']);
    }
}
