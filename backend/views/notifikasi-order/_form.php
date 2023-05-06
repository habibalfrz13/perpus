<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\NotifikasiOrder $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card card-body">
    <div class="notifikasi-order-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_order')->textInput() ?>

        <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'create_at')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Back', ['index'], ['class' => 'btn btn-dark']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>