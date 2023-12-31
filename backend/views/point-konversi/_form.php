<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\PointKonversi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card card-body">
    <div class="point-konversi-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'jumlah_point')->textInput() ?>

        <?= $form->field($model, 'harga')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Back', ['index'], ['class' => 'btn btn-dark']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>