<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hvitalsign".
 *
 * @property string $enccode
 * @property string $hpercode
 * @property string $datelog
 * @property string $timelog
 * @property string|null $vsbp
 * @property string|null $vstemp
 * @property string|null $vspulse
 * @property string|null $vsresp
 * @property string|null $intoral
 * @property string|null $intng
 * @property string|null $intiv
 * @property string|null $intblood
 * @property string|null $intmisc
 * @property string|null $outurine
 * @property string|null $outng
 * @property string|null $outstool
 * @property string|null $outemesis
 * @property string|null $outmisc
 * @property string|null $vsspec
 * @property string|null $vscvp
 * @property string|null $vsstat
 * @property string|null $vslock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string|null $confdl
 * @property string|null $entryby
 * @property string|null $upicode
 *
 * @property Henctr $enccode0
 * @property Hperson $hpercode0
 */
class Hvitalsign extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hvitalsign';
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
            [['enccode', 'datelog', 'timelog'], 'required'],
            [['datelog', 'timelog', 'datemod'], 'safe'],
            [['enccode'], 'string', 'max' => 48],
            [['hpercode'], 'string', 'max' => 20],
            [['vsbp', 'vstemp', 'vspulse', 'vsresp', 'intoral', 'intng', 'intiv', 'intblood', 'intmisc', 'outurine', 'outng', 'outstool', 'outemesis', 'outmisc', 'vsspec', 'vscvp', 'vsstat', 'vslock'], 'string', 'max' => 15],
            [['updsw', 'confdl'], 'string', 'max' => 1],
            [['entryby'], 'string', 'max' => 10],
            [['upicode'], 'string', 'max' => 12],
            [['enccode', 'datelog', 'timelog'], 'unique', 'targetAttribute' => ['enccode', 'datelog', 'timelog']],
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
            'datelog' => 'Datelog',
            'timelog' => 'Timelog',
            'vsbp' => 'BP',
            'vstemp' => 'TEMP',
            'vspulse' => 'HR',
            'vsresp' => 'RR',
            'intoral' => 'Intoral',
            'intng' => 'Intng',
            'intiv' => 'Intiv',
            'intblood' => 'Intblood',
            'intmisc' => 'Intmisc',
            'outurine' => 'Outurine',
            'outng' => 'Outng',
            'outstool' => 'Outstool',
            'outemesis' => 'Outemesis',
            'outmisc' => 'Outmisc',
            'vsspec' => 'Vsspec',
            'vscvp' => 'Vscvp',
            'vsstat' => 'Vsstat',
            'vslock' => 'Vslock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'confdl' => 'Confdl',
            'entryby' => 'Entryby',
            'upicode' => 'Upicode',
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
