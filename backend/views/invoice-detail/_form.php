<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\InvoiceDetail $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card">
    <div class="card-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nama')->textInput() ?>

        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'detail')->textarea([]) ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'harga')->textInput() ?>
            </div>
        </div>



        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Back', ['index'], ['class' => 'btn btn-dark']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>