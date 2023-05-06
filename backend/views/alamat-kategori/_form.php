<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\AlamatKategori $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card card-body">
    <div class="alamat-kategori-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Back', ['index'], ['class' => 'btn btn-dark']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>