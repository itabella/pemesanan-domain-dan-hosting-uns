<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Permintaan */

$this->title = 'Update Permintaan: ' . $model->kode_permintaan;
$this->params['breadcrumbs'][] = ['label' => 'Permintaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_permintaan, 'url' => ['view', 'id' => $model->kode_permintaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="permintaan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
