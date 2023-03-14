<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\PointKonversi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="point-konversi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jumlah_point')->textInput() ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?= $form->field($model, 'create_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
