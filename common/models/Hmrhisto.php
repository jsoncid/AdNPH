<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hmrhisto".
 *
 * @property string $hpercode
 * @property string|null $upicode
 * @property string $datelog
 * @property string $histype
 * @property string|null $history
 * @property string|null $hisstat
 * @property string|null $hislock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string $confdl
 * @property string $timelog
 * @property string|null $entryby
 * @property string $enccode
 *
 * @property Henctr $enccode0
 * @property Hperson $hpercode0
 */
class Hmrhisto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hmrhisto';
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
            [['datelog', 'histype', 'timelog', 'enccode'], 'required'],
            [['datelog', 'datemod', 'timelog'], 'safe'],
            [['hpercode'], 'string', 'max' => 20],
            [['upicode'], 'string', 'max' => 12],
            [['histype'], 'string', 'max' => 5],
            [['history'], 'string', 'max' => 255],
            [['hisstat', 'hislock', 'updsw', 'confdl'], 'string', 'max' => 1],
            [['entryby'], 'string', 'max' => 10],
            [['enccode'], 'string', 'max' => 48],
            [['datelog', 'histype', 'timelog', 'enccode'], 'unique', 'targetAttribute' => ['datelog', 'histype', 'timelog', 'enccode']],
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
            'hpercode' => 'Hpercode',
            'upicode' => 'Upicode',
            'datelog' => 'Datelog',
            'histype' => 'Histype',
            'history' => 'History',
            'hisstat' => 'Hisstat',
            'hislock' => 'Hislock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'confdl' => 'Confdl',
            'timelog' => 'Timelog',
            'entryby' => 'Entryby',
            'enccode' => 'Enccode',
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
