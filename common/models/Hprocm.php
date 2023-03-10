<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hprocm".
 *
 * @property string $proccode
 * @property string|null $procdesc
 * @property string|null $optycode
 * @property string|null $protcode
 * @property float|null $procuval
 * @property string|null $procrem
 * @property string|null $procstat
 * @property string|null $proclock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string|null $altpcode
 * @property string|null $altpdesc
 * @property string|null $priden
 * @property string|null $prmapto
 * @property string|null $prsect
 * @property string|null $prvfa
 * @property string|null $prdetsec
 * @property string|null $prregn
 * @property string|null $prextyp
 * @property string|null $prspeco
 * @property string|null $costcenter
 * @property string|null $procreslt
 * @property float|null $rvu
 * @property string|null $restemplate
 * @property string|null $discount
 *
 * @property Hdocord[] $hdocords
 * @property Hproc[] $hprocs
 * @property Hwidetails[] $hwidetails
 */
class Hprocm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hprocm';
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
            [['proccode'], 'required'],
            [['procuval', 'rvu'], 'number'],
            [['datemod'], 'safe'],
            [['proccode', 'altpcode'], 'string', 'max' => 10],
            [['procdesc', 'procrem'], 'string', 'max' => 255],
            [['optycode', 'protcode', 'prmapto', 'costcenter', 'restemplate'], 'string', 'max' => 5],
            [['procstat', 'proclock', 'updsw', 'discount'], 'string', 'max' => 1],
            [['altpdesc'], 'string', 'max' => 100],
            [['priden', 'prsect', 'prvfa', 'prdetsec', 'prregn', 'prextyp', 'prspeco'], 'string', 'max' => 2],
            [['procreslt'], 'string', 'max' => 3],
            [['proccode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'proccode' => 'Proccode',
            'procdesc' => 'Procdesc',
            'optycode' => 'Optycode',
            'protcode' => 'Protcode',
            'procuval' => 'Procuval',
            'procrem' => 'Procrem',
            'procstat' => 'Procstat',
            'proclock' => 'Proclock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'altpcode' => 'Altpcode',
            'altpdesc' => 'Altpdesc',
            'priden' => 'Priden',
            'prmapto' => 'Prmapto',
            'prsect' => 'Prsect',
            'prvfa' => 'Prvfa',
            'prdetsec' => 'Prdetsec',
            'prregn' => 'Prregn',
            'prextyp' => 'Prextyp',
            'prspeco' => 'Prspeco',
            'costcenter' => 'Costcenter',
            'procreslt' => 'Procreslt',
            'rvu' => 'Rvu',
            'restemplate' => 'Restemplate',
            'discount' => 'Discount',
        ];
    }

    /**
     * Gets query for [[Hdocords]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdocords()
    {
        return $this->hasMany(Hdocord::class, ['proccode' => 'proccode']);
    }

    /**
     * Gets query for [[Hprocs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHprocs()
    {
        return $this->hasMany(Hproc::class, ['proccode' => 'proccode']);
    }

    /**
     * Gets query for [[Hwidetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHwidetails()
    {
        return $this->hasMany(Hwidetails::class, ['proccode' => 'proccode']);
    }
}
