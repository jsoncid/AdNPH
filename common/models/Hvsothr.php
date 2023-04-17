<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hvsothr".
 *
 * @property string $enccode
 * @property string $hpercode
 * @property string|null $upicode
 * @property string $othrdte
 * @property string $othrtme
 * @property string|null $othrvs
 * @property float|null $othrmeas
 * @property string|null $othrunit
 * @property string|null $othrrem
 * @property string|null $othrstat
 * @property string|null $othrlock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string $confdl
 * @property string|null $employeeid
 * @property string|null $entryby
 * @property float|null $vsweight
 * @property float|null $vswaist
 * @property float|null $vsbmi
 * @property string|null $vsbmicat
 * @property float|null $vsheight
 *
 * @property Henctr $enccode0
 * @property Hperson $hpercode0
 */
class Hvsothr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hvsothr';
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
            [['enccode', 'othrdte', 'othrtme'], 'required'],
            [['othrdte', 'othrtme', 'datemod'], 'safe'],
            [['othrmeas', 'vsweight', 'vswaist', 'vsbmi', 'vsheight'], 'number'],
            [['enccode'], 'string', 'max' => 48],
            [['hpercode', 'entryby'], 'string', 'max' => 20],
            [['upicode'], 'string', 'max' => 12],
            [['othrvs', 'othrunit'], 'string', 'max' => 5],
            [['othrrem'], 'string', 'max' => 100],
            [['othrstat', 'othrlock', 'updsw', 'confdl'], 'string', 'max' => 1],
            [['employeeid', 'vsbmicat'], 'string', 'max' => 10],
            [['enccode', 'othrdte', 'othrtme'], 'unique', 'targetAttribute' => ['enccode', 'othrdte', 'othrtme']],
            [['enccode'], 'exist', 'skipOnError' => true, 'targetClass' => Henctr::class, 'targetAttribute' => ['enccode' => 'enccode']],
            [['hpercode'], 'exist', 'skipOnError' => true, 'targetClass' => Hperson::class, 'targetAttribute' => ['hpercode' => 'hpercode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'enccode' => 'Enccode',
            'hpercode' => 'Hpercode',
            'upicode' => 'Upicode',
            'othrdte' => 'Othrdte',
            'othrtme' => 'Othrtme',
            'othrvs' => 'Othrvs',
            'othrmeas' => 'Othrmeas',
            'othrunit' => 'Othrunit',
            'othrrem' => 'Othrrem',
            'othrstat' => 'Othrstat',
            'othrlock' => 'Othrlock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'confdl' => 'Confdl',
            'employeeid' => 'Employeeid',
            'entryby' => 'Entryby',
            'vsweight' => 'Vsweight',
            'vswaist' => 'Vswaist',
            'vsbmi' => 'Vsbmi',
            'vsbmicat' => 'Vsbmicat',
            'vsheight' => 'Vsheight',
        ];
    }

    /**
     * Gets query for [[Enccode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnccode0()
    {
        return $this->hasOne(Henctr::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpercode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpercode0()
    {
        return $this->hasOne(Hperson::class, ['hpercode' => 'hpercode']);
    }
}
