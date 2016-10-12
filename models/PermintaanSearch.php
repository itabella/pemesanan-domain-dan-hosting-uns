<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Permintaan;

/**
 * PermintaanSearch represents the model behind the search form about `app\models\Permintaan`.
 */
class PermintaanSearch extends Permintaan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_permintaan', 'keperluan', 'keterangan', 'status', 'kode_jenis'], 'safe'],
            [['id_pendaftar', 'id_ketua', 'kode_surat', 'kode_aplikasi'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Permintaan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_pendaftar' => $this->id_pendaftar,
            'id_ketua' => $this->id_ketua,
            'kode_surat' => $this->kode_surat,
            'kode_aplikasi' => $this->kode_aplikasi,
        ]);

        $query->andFilterWhere(['like', 'kode_permintaan', $this->kode_permintaan])
            ->andFilterWhere(['like', 'keperluan', $this->keperluan])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'kode_jenis', $this->kode_jenis]);

        return $dataProvider;
    }
}
