<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\KondisiAc $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card card-body">
    <div class="kondisi-ac-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <a href="<?= Yii::$app->request->referrer ?>" class="btn btn-dark">Back</a>
        </div>


        <?php ActiveForm::end(); ?>

    </div>
</div>