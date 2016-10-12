<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Permintaan */

$this->title = 'Create Permintaan';
$this->params['breadcrumbs'][] = ['label' => 'Permintaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permintaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model2' => $model2,
        'model3' => $model3,
        'model4' => $model4,
    ]) ?>

</div>
