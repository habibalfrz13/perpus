<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\PointMasterSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="point-master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_point') ?>

    <?= $form->field($model, 'keterangan') ?>

    <?= $form->field($model, 'jumlah_ac') ?>

    <?= $form->field($model, 'jumlah_order') ?>

    <?= $form->field($model, 'jumlah_point') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
