<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "htelep".
 *
 * @property string $hpercode
 * @property string|null $upicode
 * @property string $ptdteas
 * @property string $pattel
 * @property string|null $patteltype
 * @property string|null $ptlstat
 * @property string|null $ptlock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string $confdl
 * @property string $ntseqno
 * @property string|null $entryby
 *
 * @property Hperson $hpercode0
 */
class Htelep extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'htelep';
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
            [['hpercode', 'ptdteas', 'ntseqno'], 'required'],
            [['ptdteas', 'datemod'], 'safe'],
            [['hpercode'], 'string', 'max' => 20],
            [['upicode'], 'string', 'max' => 12],
            [['pattel'], 'string', 'max' => 15],
            [['patteltype'], 'string', 'max' => 5],
            [['ptlstat', 'ptlock', 'updsw', 'confdl'], 'string', 'max' => 1],
            [['ntseqno'], 'string', 'max' => 2],
            [['entryby'], 'string', 'max' => 10],
            [['hpercode', 'ntseqno'], 'unique', 'targetAttribute' => ['hpercode', 'ntseqno']],
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
            'upicode' => 'Upicode',
            'ptdteas' => 'Ptdteas',
            'pattel' => 'Pattel',
            'patteltype' => 'Patteltype',
            'ptlstat' => 'Ptlstat',
            'ptlock' => 'Ptlock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'confdl' => 'Confdl',
            'ntseqno' => 'Ntseqno',
            'entryby' => 'Entryby',
        ];
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
}
