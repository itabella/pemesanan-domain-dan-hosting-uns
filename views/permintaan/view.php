<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Permintaan */

$this->title = $model->kode_permintaan;
$this->params['breadcrumbs'][] = ['label' => 'Permintaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permintaan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kode_permintaan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kode_permintaan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kode_permintaan',
            'keperluan',
            'keterangan',
            'status',
            'id_pendaftar',
            'id_ketua',
            'kode_surat',
            'kode_jenis',
            'kode_aplikasi',
        ],
    ]) ?>

</div>
