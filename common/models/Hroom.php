<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hroom".
 *
 * @property string $rmintkey
 * @property string $wardcode
 * @property string $rmcode
 * @property string $rmname
 * @property int|null $rmbed
 * @property string|null $rmvacoc
 * @property string|null $rmstat
 * @property string|null $rmlock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string|null $hrmfloor
 * @property int|null $nobed
 * @property string|null $roombaby
 * @property string|null $rmtype
 *
 * @property Hbed[] $hbeds
 * @property Hward $wardcode0
 */
class Hroom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hroom';
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
            [['rmintkey'], 'required'],
            [['rmbed', 'nobed'], 'integer'],
            [['datemod'], 'safe'],
            [['rmintkey', 'rmtype'], 'string', 'max' => 10],
            [['wardcode', 'rmcode'], 'string', 'max' => 5],
            [['rmname'], 'string', 'max' => 50],
            [['rmvacoc', 'rmstat', 'rmlock', 'updsw', 'roombaby'], 'string', 'max' => 1],
            [['hrmfloor'], 'string', 'max' => 2],
            [['rmintkey'], 'unique'],
            [['wardcode'], 'exist', 'skipOnError' => true, 'targetClass' => Hward::className(), 'targetAttribute' => ['wardcode' => 'wardcode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rmintkey' => 'Rmintkey',
            'wardcode' => 'Wardcode',
            'rmcode' => 'Rmcode',
            'rmname' => 'Rmname',
            'rmbed' => 'Rmbed',
            'rmvacoc' => 'Rmvacoc',
            'rmstat' => 'Rmstat',
            'rmlock' => 'Rmlock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'hrmfloor' => 'Hrmfloor',
            'nobed' => 'Nobed',
            'roombaby' => 'Roombaby',
            'rmtype' => 'Rmtype',
        ];
    }

    /**
     * Gets query for [[Hbeds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHbeds()
    {
        return $this->hasMany(Hbed::className(), ['rmintkey' => 'rmintkey']);
    }

    /**
     * Gets query for [[Wardcode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWardcode0()
    {
        return $this->hasOne(Hward::className(), ['wardcode' => 'wardcode']);
    }
}
