<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\OrderHistori $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card card-body">
    <div class="order-histori-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_user')->textInput() ?>

        <?= $form->field($model, 'id_order')->textInput() ?>

        <?= $form->field($model, 'jenis_layanan')->textInput() ?>

        <?= $form->field($model, 'tanggal')->textInput() ?>

        <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Back', ['index'], ['class' => 'btn btn-dark']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>