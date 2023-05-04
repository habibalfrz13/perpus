<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\NotifikasiPoint $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card card-body">
    <div class="notifikasi-point-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_order')->textInput() ?>

        <?= $form->field($model, 'id_user')->textInput() ?>

        <?= $form->field($model, 'jumlah_point')->textInput() ?>

        <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <a href="<?= Yii::$app->request->referrer ?>" class="btn btn-dark">Back</a>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>