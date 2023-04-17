<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hphyexam".
 *
 * @property string $enccode
 * @property string $hpercode
 * @property string|null $upicode
 * @property string $pedtelog
 * @property string $petmelog
 * @property string|null $pestat
 * @property string|null $pelock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string|null $confdl
 * @property string $petype
 * @property string|null $peentby
 * @property string|null $pedesc
 * @property string|null $entryby
 * @property string|null $awakealert
 * @property string|null $alteredsensorium
 * @property string|null $heent_essentiallynormal
 * @property string|null $heent_abnopupireact
 * @property string|null $heent_cervlympadeno
 * @property string|null $heent_drymucousmembrane
 * @property string|null $heent_ictericsclerae
 * @property string|null $heent_paleconjunctivae
 * @property string|null $heent_sunkeneyeballs
 * @property string|null $heent_sunkenfontanelle
 * @property string|null $heent_others
 * @property string|null $cl_essentiallynormal
 * @property string|null $cl_asymchestexpansion
 * @property string|null $cl_decbreathsounds
 * @property string|null $cl_wheezes
 * @property string|null $cl_lumpoverbreast
 * @property string|null $cl_ralescracklesrhonchi
 * @property string|null $cl_interribclaretract
 * @property string|null $cl_others
 * @property string|null $cvs_essentiallynormal
 * @property string|null $cvs_disapexbeat
 * @property string|null $cvs_heavesthrills
 * @property string|null $cvs_pericarbulge
 * @property string|null $cvs_irregularrhythm
 * @property string|null $cvs_muffledheartsounds
 * @property string|null $cvs_murmur
 * @property string|null $cvs_others
 * @property string|null $abd_essentiallynormal
 * @property string|null $abd_abdrigidity
 * @property string|null $abd_abdtenderness
 * @property string|null $abd_hyperbowelsounds
 * @property string|null $abd_palpablemass
 * @property string|null $abd_tympdullabdomen
 * @property string|null $abd_uterinecontraction
 * @property string|null $abd_others
 * @property string|null $guie_essentiallynormal
 * @property string|null $guie_bldstainedinexamfinger
 * @property string|null $guie_cervicaldilatation
 * @property string|null $guie_presenceabnodis
 * @property string|null $guie_others
 * @property string|null $skinex_essentiallynormal
 * @property string|null $skinex_clubbing
 * @property string|null $skinex_coldclammyskin
 * @property string|null $skinex_cyanosismottledskin
 * @property string|null $skinex_edemaswelling
 * @property string|null $skinex_decmobility
 * @property string|null $skinex_palenailbeds
 * @property string|null $skinex_poorskinturgor
 * @property string|null $skinex_rashespetechiae
 * @property string|null $skinex_weakpulses
 * @property string|null $skinex_others
 * @property string|null $neuro_essentiallynormal
 * @property string|null $neuro_abnormalgait
 * @property string|null $neuro_abnopositionsense
 * @property string|null $neuro_abnodecsensation
 * @property string|null $neuro_abnoreflexes
 * @property string|null $neuro_pooralteredmemory
 * @property string|null $neuro_poormusctonestren
 * @property string|null $neuro_poorcoordination
 * @property string|null $neuro_others
 *
 * @property Henctr $enccode0
 * @property Hperson $hpercode0
 */
class Hphyexam extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hphyexam';
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
            [['enccode', 'pedtelog', 'petmelog', 'petype'], 'required'],
            [['pedtelog', 'petmelog', 'datemod'], 'safe'],
            [['enccode'], 'string', 'max' => 48],
            [['hpercode'], 'string', 'max' => 20],
            [['upicode'], 'string', 'max' => 12],
            [['pestat', 'pelock', 'updsw', 'confdl', 'awakealert'], 'string', 'max' => 1],
            [['petype'], 'string', 'max' => 5],
            [['peentby', 'entryby'], 'string', 'max' => 10],
            [['pedesc'], 'string', 'max' => 255],
            [['alteredsensorium', 'heent_others', 'cl_others', 'cvs_others', 'abd_others', 'guie_others', 'skinex_others', 'neuro_others'], 'string', 'max' => 100],
            [['heent_essentiallynormal', 'heent_abnopupireact', 'heent_cervlympadeno', 'heent_drymucousmembrane', 'heent_ictericsclerae', 'heent_paleconjunctivae', 'heent_sunkeneyeballs', 'heent_sunkenfontanelle', 'cl_essentiallynormal', 'cl_asymchestexpansion', 'cl_decbreathsounds', 'cl_wheezes', 'cl_lumpoverbreast', 'cl_ralescracklesrhonchi', 'cl_interribclaretract', 'cvs_essentiallynormal', 'cvs_disapexbeat', 'cvs_heavesthrills', 'cvs_pericarbulge', 'cvs_irregularrhythm', 'cvs_muffledheartsounds', 'cvs_murmur', 'abd_essentiallynormal', 'abd_abdrigidity', 'abd_abdtenderness', 'abd_hyperbowelsounds', 'abd_palpablemass', 'abd_tympdullabdomen', 'abd_uterinecontraction', 'guie_essentiallynormal', 'guie_bldstainedinexamfinger', 'guie_cervicaldilatation', 'guie_presenceabnodis', 'skinex_essentiallynormal', 'skinex_clubbing', 'skinex_coldclammyskin', 'skinex_cyanosismottledskin', 'skinex_edemaswelling', 'skinex_decmobility', 'skinex_palenailbeds', 'skinex_poorskinturgor', 'skinex_rashespetechiae', 'skinex_weakpulses', 'neuro_essentiallynormal', 'neuro_abnormalgait', 'neuro_abnopositionsense', 'neuro_abnodecsensation', 'neuro_abnoreflexes', 'neuro_pooralteredmemory', 'neuro_poormusctonestren', 'neuro_poorcoordination'], 'string', 'max' => 2],
            [['enccode', 'pedtelog', 'petmelog'], 'unique', 'targetAttribute' => ['enccode', 'pedtelog', 'petmelog']],
            [['enccode', 'pedtelog', 'petmelog', 'petype'], 'unique', 'targetAttribute' => ['enccode', 'pedtelog', 'petmelog', 'petype']],
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
            'pedtelog' => 'Pedtelog',
            'petmelog' => 'Petmelog',
            'pestat' => 'Pestat',
            'pelock' => 'Pelock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'confdl' => 'Confdl',
            'petype' => 'Petype',
            'peentby' => 'Peentby',
            'pedesc' => 'Pedesc',
            'entryby' => 'Entryby',
            'awakealert' => 'Awake and alert',
            'alteredsensorium' => 'Altered Senosoruim',
            'heent_essentiallynormal' => 'Essentially Normal',
            'heent_abnopupireact' => 'Abnormal pupillary reaction',
            'heent_cervlympadeno' => 'Cervical lymphadenopathy',
            'heent_drymucousmembrane' => 'Dry mucous membrane',
            'heent_ictericsclerae' => 'Icteric sclerae',
            'heent_paleconjunctivae' => 'Pale conjuctivae',
            'heent_sunkeneyeballs' => 'Sunken eyeballs',
            'heent_sunkenfontanelle' => 'Sunken fontanelle',
            'heent_others' => 'Heent Others',
            'cl_essentiallynormal' => 'Essentially normal',
            'cl_asymchestexpansion' => 'Asymmetrical chest expansion',
            'cl_decbreathsounds' => 'Decreased breath sounds',
            'cl_wheezes' => 'Wheezes',
            'cl_lumpoverbreast' => 'Lump/s over breast(s)',
            'cl_ralescracklesrhonchi' => 'Rales/crackles/rhonchi',
            'cl_interribclaretract' => 'Intercostal rib/clavicular retraction',
            'cl_others' => 'Others',
            'cvs_essentiallynormal' => 'Essentially normal',
            'cvs_disapexbeat' => 'Displaced apex beat',
            'cvs_heavesthrills' => 'Heaveans and/or thrills',
            'cvs_pericarbulge' => 'Pericardial bulge',
            'cvs_irregularrhythm' => 'Irregular rhythm',
            'cvs_muffledheartsounds' => 'Muffled heart sounds',
            'cvs_murmur' => 'Murmur',
            'cvs_others' => 'Others',
            'abd_essentiallynormal' => 'Essentially normal',
            'abd_abdrigidity' => 'Abdomen rigidity',
            'abd_abdtenderness' => 'Abdomen tenderness',
            'abd_hyperbowelsounds' => 'Hyperactivebowelsounds',
            'abd_palpablemass' => 'Palpable mass(es)',
            'abd_tympdullabdomen' => 'Tympanitic/dull abdomen',
            'abd_uterinecontraction' => 'Uterine contraction',
            'abd_others' => 'Others',
            'guie_essentiallynormal' => 'Essentially normal',
            'guie_bldstainedinexamfinger' => 'Blood stained in exam finger',
            'guie_cervicaldilatation' => 'Cervical dilatation',
            'guie_presenceabnodis' => 'Presence of abnormal discharge',
            'guie_others' => 'Others',
            'skinex_essentiallynormal' => 'Essentially normal',
            'skinex_clubbing' => 'Clubbing',
            'skinex_coldclammyskin' => 'Cold clammy skin',
            'skinex_cyanosismottledskin' => 'Cyanosis/mottled skin',
            'skinex_edemaswelling' => 'Edema/swelling',
            'skinex_decmobility' => 'Decreased mobility',
            'skinex_palenailbeds' => 'Pale nailbeds',
            'skinex_poorskinturgor' => 'Poor skin turgor',
            'skinex_rashespetechiae' => 'Rashes/petechiae',
            'skinex_weakpulses' => 'Weak pulses',
            'skinex_others' => 'Skinex Others',
            'neuro_essentiallynormal' => 'Essentially normal',
            'neuro_abnormalgait' => 'Abnormal gait',
            'neuro_abnopositionsense' => 'Abnormal position sense',
            'neuro_abnodecsensation' => 'Abnormal/decreased sensation',
            'neuro_abnoreflexes' => 'Abnormal reflex(es)',
            'neuro_pooralteredmemory' => 'Poor/altered memory',
            'neuro_poormusctonestren' => 'Poor muscle tone/strength',
            'neuro_poorcoordination' => 'Poor coordination',
            'neuro_others' => 'Neuro Others',
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
