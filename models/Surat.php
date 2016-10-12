<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat".
 *
 * @property integer $kode_surat
 * @property string $kop_surat
 * @property string $nomor_surat
 * @property string $tebusan
 * @property string $persetujuan
 *
 * @property Permintaan[] $permintaans
 */
class Surat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kop_surat', 'nomor_surat', 'tebusan', 'persetujuan'], 'required'],
            [['kop_surat'], 'string', 'max' => 1000],
            [['nomor_surat', 'tebusan', 'persetujuan'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_surat' => 'Kode Surat',
            'kop_surat' => 'Kop Surat',
            'nomor_surat' => 'Nomor Surat',
            'tebusan' => 'Tebusan',
            'persetujuan' => 'Persetujuan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermintaans()
    {
        return $this->hasMany(Permintaan::className(), ['kode_surat' => 'kode_surat']);
    }
}
