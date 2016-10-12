<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_aplikasi".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property Aplikasi[] $aplikasis
 */
class DetailAplikasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail_aplikasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nama'], 'required'],
            [['id'], 'integer'],
            [['nama'], 'string', 'max' => 32],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAplikasis()
    {
        return $this->hasMany(Aplikasi::className(), ['kode_detail_aplikasi' => 'id']);
    }
}
