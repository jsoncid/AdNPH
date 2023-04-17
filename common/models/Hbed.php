<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hbed".
 *
 * @property string $bdintkey
 * @property string $wardcode
 * @property string $rmintkey
 * @property string $bdcode
 * @property string $rmaccikey
 * @property string $bddteasof
 * @property string $bdname
 * @property string|null $bdvacocc
 * @property string|null $bdstat
 * @property string|null $bdlock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string $bdvmostan
 * @property string|null $bdtemp
 * @property int|null $bdallow
 * @property int|null $bdactual
 * @property string|null $bdflag
 * @property string|null $bdpdteasof
 * @property string|null $entryby
 *
 * @property Hrmacc $rmaccikey0
 * @property Hroom $rmintkey0
 * @property Hward $wardcode0
 */
class Hbed extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hbed';
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
            [['bdintkey', 'bddteasof'], 'required'],
            [['bddteasof', 'datemod', 'bdpdteasof'], 'safe'],
            [['bdallow', 'bdactual'], 'integer'],
            [['bdintkey'], 'string', 'max' => 15],
            [['wardcode', 'bdcode', 'bdvmostan'], 'string', 'max' => 5],
            [['rmintkey', 'entryby'], 'string', 'max' => 10],
            [['rmaccikey'], 'string', 'max' => 13],
            [['bdname'], 'string', 'max' => 30],
            [['bdvacocc', 'bdstat', 'bdlock', 'updsw', 'bdtemp', 'bdflag'], 'string', 'max' => 1],
            [['bdintkey'], 'unique'],
            [['rmaccikey'], 'exist', 'skipOnError' => true, 'targetClass' => Hrmacc::class, 'targetAttribute' => ['rmaccikey' => 'rmaccikey']],
            [['rmintkey'], 'exist', 'skipOnError' => true, 'targetClass' => Hroom::class, 'targetAttribute' => ['rmintkey' => 'rmintkey']],
            [['wardcode'], 'exist', 'skipOnError' => true, 'targetClass' => Hward::class, 'targetAttribute' => ['wardcode' => 'wardcode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bdintkey' => 'Bdintkey',
            'wardcode' => 'Wardcode',
            'rmintkey' => 'Rmintkey',
            'bdcode' => 'Bdcode',
            'rmaccikey' => 'Rmaccikey',
            'bddteasof' => 'Bddteasof',
            'bdname' => 'Bdname',
            'bdvacocc' => 'Bdvacocc',
            'bdstat' => 'Bdstat',
            'bdlock' => 'Bdlock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'bdvmostan' => 'Bdvmostan',
            'bdtemp' => 'Bdtemp',
            'bdallow' => 'Bdallow',
            'bdactual' => 'Bdactual',
            'bdflag' => 'Bdflag',
            'bdpdteasof' => 'Bdpdteasof',
            'entryby' => 'Entryby',
        ];
    }

    /**
     * Gets query for [[Rmaccikey0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRmaccikey0()
    {
        return $this->hasOne(Hrmacc::class, ['rmaccikey' => 'rmaccikey']);
    }

    /**
     * Gets query for [[Rmintkey0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRmintkey0()
    {
        return $this->hasOne(Hroom::class, ['rmintkey' => 'rmintkey']);
    }

    /**
     * Gets query for [[Wardcode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWardcode0()
    {
        return $this->hasOne(Hward::class, ['wardcode' => 'wardcode']);
    }
}
