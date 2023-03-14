<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\FeedbackSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="feedback-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_feedback') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_order') ?>

    <?= $form->field($model, 'id_teknisi') ?>

    <?= $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'ulasan') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <?php // echo $form->field($model, 'point') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
