<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\OrderHistorySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-histori-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_historis') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_order') ?>

    <?= $form->field($model, 'jenis_layanan') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?= $form->field($model, 'id_teknisi') ?>

    <?php // echo $form->field($model, 'status') 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>