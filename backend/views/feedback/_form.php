<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Feedback $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card card-body">
    <div class="feedback-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'rating')->textInput() ?>

        <?= $form->field($model, 'ulasan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'foto_feedback')->fileInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Back', ['index'], ['class' => 'btn btn-dark']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>