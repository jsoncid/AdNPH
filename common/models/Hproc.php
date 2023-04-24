<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hproc".
 *
 * @property string $proccode
 * @property float $procrate
 * @property string|null $curcode
 * @property string|null $bccode
 * @property string $procndte
 * @property string|null $procstat
 * @property string|null $proclock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string $prikey
 * @property string|null $rmaccikey
 * @property float|null $printfee
 * @property string|null $prprior
 * @property float|null $prdlabor
 * @property float|null $prminstru
 * @property float|null $pradmcst
 * @property float|null $prprofee
 * @property float|null $prorrm
 * @property float|null $sosrgfee
 * @property float|null $soanefee
 * @property float|null $soorfee
 * @property float|null $rvu
 * @property string|null $one_rate
 * @property string|null $availstat
 *
 * @property Huom $bccode0
 * @property Hdocord[] $hdocords
 * @property Hprocm $proccode0
 * @property Hrmacc $rmaccikey0
 */
class Hproc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hproc';
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
            [['procrate', 'procndte', 'prikey'], 'required'],
            [['procrate', 'printfee', 'prdlabor', 'prminstru', 'pradmcst', 'prprofee', 'prorrm', 'sosrgfee', 'soanefee', 'soorfee', 'rvu'], 'number'],
            [['procndte', 'datemod'], 'safe'],
            [['proccode', 'prprior'], 'string', 'max' => 10],
            [['curcode', 'bccode'], 'string', 'max' => 5],
            [['procstat', 'proclock', 'updsw', 'one_rate', 'availstat'], 'string', 'max' => 1],
            [['prikey'], 'string', 'max' => 41],
            [['rmaccikey'], 'string', 'max' => 13],
            [['prikey'], 'unique'],
            [['bccode'], 'exist', 'skipOnError' => true, 'targetClass' => Huom::class, 'targetAttribute' => ['bccode' => 'uomcode']],
            [['proccode'], 'exist', 'skipOnError' => true, 'targetClass' => Hprocm::class, 'targetAttribute' => ['proccode' => 'proccode']],
            [['rmaccikey'], 'exist', 'skipOnError' => true, 'targetClass' => Hrmacc::class, 'targetAttribute' => ['rmaccikey' => 'rmaccikey']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'proccode' => 'Proccode',
            'procrate' => 'Procrate',
            'curcode' => 'Curcode',
            'bccode' => 'Bccode',
            'procndte' => 'Procndte',
            'procstat' => 'Procstat',
            'proclock' => 'Proclock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'prikey' => 'Prikey',
            'rmaccikey' => 'Rmaccikey',
            'printfee' => 'Printfee',
            'prprior' => 'Prprior',
            'prdlabor' => 'Prdlabor',
            'prminstru' => 'Prminstru',
            'pradmcst' => 'Pradmcst',
            'prprofee' => 'Prprofee',
            'prorrm' => 'Prorrm',
            'sosrgfee' => 'Sosrgfee',
            'soanefee' => 'Soanefee',
            'soorfee' => 'Soorfee',
            'rvu' => 'Rvu',
            'one_rate' => 'One Rate',
            'availstat' => 'Availstat',
        ];
    }

    /**
     * Gets query for [[Bccode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBccode0()
    {
        return $this->hasOne(Huom::class, ['uomcode' => 'bccode']);
    }

    /**
     * Gets query for [[Hdocords]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdocords()
    {
        return $this->hasMany(Hdocord::class, ['prikey' => 'prikey']);
    }

    /**
     * Gets query for [[Proccode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProccode0()
    {
        return $this->hasOne(Hprocm::class, ['proccode' => 'proccode']);
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
}
