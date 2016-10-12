<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pendaftar".
 *
 * @property integer $id_pendaftar
 * @property string $nama_pendaftar
 * @property string $email_pendaftar
 * @property string $no_hp
 *
 * @property Permintaan[] $permintaans
 */
class Pendaftar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pendaftar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_pendaftar', 'email_pendaftar', 'no_hp'], 'required'],
            [['nama_pendaftar', 'email_pendaftar'], 'string', 'max' => 500],
            [['no_hp'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pendaftar' => 'Id Pendaftar',
            'nama_pendaftar' => 'Nama Pendaftar',
            'email_pendaftar' => 'Email Pendaftar',
            'no_hp' => 'No Hp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermintaans()
    {
        return $this->hasMany(Permintaan::className(), ['id_pendaftar' => 'id_pendaftar']);
    }
}
