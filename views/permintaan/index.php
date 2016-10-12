<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PermintaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Permintaans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permintaan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Permintaan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kode_permintaan',
            'keperluan',
            'keterangan',
            'status',
            'id_pendaftar',
            // 'id_ketua',
            // 'kode_surat',
            // 'kode_jenis',
            // 'kode_aplikasi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
