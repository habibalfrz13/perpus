<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Invoice $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="invoice-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>