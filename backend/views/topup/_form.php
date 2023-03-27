<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var backend\models\Topup $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="topup-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'jumlah_topup')->dropDownList(
        ArrayHelper::map(\backend\models\PointKonversi::find()->all(), 'id', function ($model) {
            return $model->harga . ' ( ' . $model->jumlah_point . ' point )';
        }),
        ['prompt' => 'Pilih Jumlah Topup']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>