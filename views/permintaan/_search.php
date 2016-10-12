<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PermintaanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permintaan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kode_permintaan') ?>

    <?= $form->field($model, 'keperluan') ?>

    <?= $form->field($model, 'keterangan') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'id_pendaftar') ?>

    <?php // echo $form->field($model, 'id_ketua') ?>

    <?php // echo $form->field($model, 'kode_surat') ?>

    <?php // echo $form->field($model, 'kode_jenis') ?>

    <?php // echo $form->field($model, 'kode_aplikasi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
