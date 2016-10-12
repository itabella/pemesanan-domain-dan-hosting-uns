<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ketua".
 *
 * @property integer $id_ketua
 * @property string $NIP/NIM
 * @property string $nama_ketua
 * @property integer $kode_jabatan
 *
 * @property Permintaan[] $permintaans
 */
class Ketua extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ketua';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NIP/NIM', 'nama_ketua', 'kode_jabatan'], 'required'],
            [['kode_jabatan'], 'integer'],
            [['NIP_NIM'], 'string', 'max' => 100],
            [['nama_ketua'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ketua' => 'Id Ketua',
            'NIP_NIM' => 'Nip/ Nim',
            'nama_ketua' => 'Nama Ketua',
            'kode_jabatan' => 'Kode Jabatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermintaans()
    {
        return $this->hasMany(Permintaan::className(), ['id_ketua' => 'id_ketua']);
    }
}
