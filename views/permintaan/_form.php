<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Aplikasi;
use app\models\Surat;
use app\models\Pendaftar;

/* @var $this yii\web\View */
/* @var $model app\models\Permintaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permintaan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $form->field($model, 'kode_permintaan')->textInput(['maxlength' => true]) ?>

    <?php $form->field($model4, 'nama_pendaftar')->textInput(['maxlength' => true]) ?>

    <?php $form->field($model4, 'email_pendaftar')->textInput(['maxlength' => true]) ?>

    <?php $form->field($model4, 'no_hp')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'kode_jenis')->dropDownList([ 'domain' => 'Domain', 'hosting' => 'Hosting', 'domain dan hosting' => 'Domain dan hosting', ], ['prompt' => '']) ?>


    <?= $form->field($model, 'keperluan')->textInput(['maxlength' => true]) ?>


     <?= $form->field($model, 'kode_aplikasi')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Aplikasi::find()->all(),'id','nama'),
        'options' => ['placeholder' => 'nama'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])->label('Aplikasi');
    ?>

    <?= $form->field($model, 'kode_aplikasi')->textInput() ?>

    <?= $form->field($model3, 'kop_surat')->textInput() ?>

    <?= $form->field($model3, 'nomor_surat')->textInput() ?>

     <?= $form->field($model2, 'nama_ketua')->textInput(['maxlength' => true]) ?>
     
     <?php $form->field($model2, 'nama_jabatan')->textInput(['maxlength' => true]) ?>
     
     <?php  $form->field($model2, 'NIP_NIM')->textInput(['maxlength' => true]) ?>
     

     <?= $form->field($model3, 'tebusan')->textInput(['maxlength' => true]) ?>
     







    <?php // $form->field($model, 'id_pendaftar')->textInput() ?>
    
    <?php // $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'status')->dropDownList([ 'pending' => 'Pending', 'active' => 'Active', ], ['prompt' => '']) ?>
    <?= $form->field($model, 'status')->hiddenInput(['value'=> 'pending'])->label(false)?>

   
    

   
    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
