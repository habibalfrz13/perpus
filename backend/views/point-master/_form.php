<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\PointMaster $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="point-master-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_ac')->textInput() ?>

    <?= $form->field($model, 'jumlah_order')->textInput() ?>

    <?= $form->field($model, 'jumlah_point')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
