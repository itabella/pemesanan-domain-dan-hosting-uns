<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permintaan".
 *
 * @property string $kode_permintaan
 * @property string $keperluan
 * @property string $keterangan
 * @property string $status
 * @property integer $id_pendaftar
 * @property integer $id_ketua
 * @property integer $kode_surat
 * @property string $kode_jenis
 * @property integer $kode_aplikasi
 *
 * @property Aplikasi $kodeAplikasi
 * @property Pendaftar $idPendaftar
 * @property Ketua $idKetua
 * @property Surat $kodeSurat
 */
class Permintaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'permintaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_permintaan', 'keperluan', 'keterangan', 'status', 'id_pendaftar', 'id_ketua', 'kode_surat', 'kode_jenis', 'kode_aplikasi'], 'required'],
            [['status', 'kode_jenis'], 'string'],
            [['id_pendaftar', 'id_ketua', 'kode_surat', 'kode_aplikasi'], 'integer'],
            [['kode_permintaan'], 'string', 'max' => 50],
            [['keperluan', 'keterangan'], 'string', 'max' => 1000],
            [['kode_aplikasi'], 'exist', 'skipOnError' => true, 'targetClass' => Aplikasi::className(), 'targetAttribute' => ['kode_aplikasi' => 'id']],
            [['id_pendaftar'], 'exist', 'skipOnError' => true, 'targetClass' => Pendaftar::className(), 'targetAttribute' => ['id_pendaftar' => 'id_pendaftar']],
            [['id_ketua'], 'exist', 'skipOnError' => true, 'targetClass' => Ketua::className(), 'targetAttribute' => ['id_ketua' => 'id_ketua']],
            [['kode_surat'], 'exist', 'skipOnError' => true, 'targetClass' => Surat::className(), 'targetAttribute' => ['kode_surat' => 'kode_surat']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_permintaan' => 'Kode Permintaan',
            'keperluan' => 'Keperluan',
            'keterangan' => 'Keterangan',
            'status' => 'Status',
            'id_pendaftar' => 'Id Pendaftar',
            'id_ketua' => 'Id Ketua',
            'kode_surat' => 'Kode Surat',
            'kode_jenis' => 'Jenis Permintaan',
            'kode_aplikasi' => 'Aplikasi yang Diinstall',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeAplikasi()
    {
        return $this->hasOne(Aplikasi::className(), ['id' => 'kode_aplikasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPendaftar()
    {
        return $this->hasOne(Pendaftar::className(), ['id_pendaftar' => 'id_pendaftar']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKetua()
    {
        return $this->hasOne(Ketua::className(), ['id_ketua' => 'id_ketua']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeSurat()
    {
        return $this->hasOne(Surat::className(), ['kode_surat' => 'kode_surat']);
    }
}
