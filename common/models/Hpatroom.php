<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hpatroom".
 *
 * @property string $enccode
 * @property string $hpercode
 * @property string|null $upicode
 * @property string $hprdate
 * @property string $hprtime
 * @property string $wardcode
 * @property string $rmintkey
 * @property string $bdintkey
 * @property string $rmvcode
 * @property string|null $rmvrem
 * @property string|null $patrmstat
 * @property string|null $patrmlock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string $confdl
 * @property string|null $hprwtf
 * @property string|null $roombaby
 * @property string|null $entryby
 *
 * @property Henctr $enccode0
 * @property Hperson $hpercode0
 */
class Hpatroom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hpatroom';
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
            [['enccode', 'hprdate', 'hprtime'], 'required'],
            [['hprdate', 'hprtime', 'datemod'], 'safe'],
            [['enccode'], 'string', 'max' => 48],
            [['hpercode'], 'string', 'max' => 20],
            [['upicode'], 'string', 'max' => 12],
            [['wardcode', 'rmvcode'], 'string', 'max' => 5],
            [['rmintkey', 'entryby'], 'string', 'max' => 10],
            [['bdintkey'], 'string', 'max' => 15],
            [['rmvrem'], 'string', 'max' => 255],
            [['patrmstat', 'patrmlock', 'updsw', 'confdl', 'hprwtf', 'roombaby'], 'string', 'max' => 1],
            [['hprtime', 'enccode'], 'unique', 'targetAttribute' => ['hprtime', 'enccode']],
            [['enccode', 'hprdate', 'hprtime'], 'unique', 'targetAttribute' => ['enccode', 'hprdate', 'hprtime']],
            [['enccode'], 'exist', 'skipOnError' => true, 'targetClass' => Henctr::className(), 'targetAttribute' => ['enccode' => 'enccode']],
            [['hpercode'], 'exist', 'skipOnError' => true, 'targetClass' => Hperson::className(), 'targetAttribute' => ['hpercode' => 'hpercode']],
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
            'hprdate' => 'Hprdate',
            'hprtime' => 'Hprtime',
            'wardcode' => 'Wardcode',
            'rmintkey' => 'Rmintkey',
            'bdintkey' => 'Bdintkey',
            'rmvcode' => 'Rmvcode',
            'rmvrem' => 'Rmvrem',
            'patrmstat' => 'Patrmstat',
            'patrmlock' => 'Patrmlock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'confdl' => 'Confdl',
            'hprwtf' => 'Hprwtf',
            'roombaby' => 'Roombaby',
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
        return $this->hasOne(Henctr::className(), ['enccode' => 'enccode']);
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
