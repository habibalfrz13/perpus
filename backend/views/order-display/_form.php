<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\OrderDisplay $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-display-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'jenis_layanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'masalah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_merk')->textInput() ?>

    <?= $form->field($model, 'type_ac')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jadwal_pengerjaan')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'dipesan' => 'Dipesan', 'diterima' => 'Diterima', 'cancel' => 'Cancel', 'selesai' => 'Selesai', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'tgl_pesan')->textInput() ?>

    <?= $form->field($model, 'id_teknisi')->textInput() ?>

    <?= $form->field($model, 'point_teknisi')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
