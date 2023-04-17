<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hcrsward".
 *
 * @property string $enccode
 * @property string $hpercode
 * @property string|null $upicode
 * @property string $dtetake
 * @property string $tmetake
 * @property string $crseward
 * @property string|null $crsestat
 * @property string|null $crselock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string|null $entryby
 *
 * @property Henctr $enccode0
 * @property Hperson $hpercode0
 */
class Hcrsward extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hcrsward';
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
            [['enccode', 'dtetake', 'tmetake'], 'required'],
            [['dtetake', 'tmetake', 'datemod'], 'safe'],
            [['enccode'], 'string', 'max' => 48],
            [['hpercode'], 'string', 'max' => 20],
            [['upicode'], 'string', 'max' => 12],
            [['crseward'], 'string', 'max' => 255],
            [['crsestat', 'crselock', 'updsw'], 'string', 'max' => 1],
            [['entryby'], 'string', 'max' => 10],
            [['enccode', 'dtetake', 'tmetake'], 'unique', 'targetAttribute' => ['enccode', 'dtetake', 'tmetake']],
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
            'dtetake' => 'Dtetake',
            'tmetake' => 'Tmetake',
            'crseward' => 'Crseward',
            'crsestat' => 'Crsestat',
            'crselock' => 'Crselock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'entryby' => 'Entryby',
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
