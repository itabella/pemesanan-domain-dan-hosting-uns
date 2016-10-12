<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aplikasi".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $kode_detail_aplikasi
 *
 * @property DetailAplikasi $kodeDetailAplikasi
 * @property Permintaan[] $permintaans
 */
class Aplikasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aplikasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nama', 'kode_detail_aplikasi'], 'required'],
            [['id', 'kode_detail_aplikasi'], 'integer'],
            [['nama'], 'string', 'max' => 32],
            [['kode_detail_aplikasi'], 'exist', 'skipOnError' => true, 'targetClass' => DetailAplikasi::className(), 'targetAttribute' => ['kode_detail_aplikasi' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'kode_detail_aplikasi' => 'Kode Detail Aplikasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeDetailAplikasi()
    {
        return $this->hasOne(DetailAplikasi::className(), ['id' => 'kode_detail_aplikasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermintaans()
    {
        return $this->hasMany(Permintaan::className(), ['kode_aplikasi' => 'id']);
    }
}
