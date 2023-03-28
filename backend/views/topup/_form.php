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

    <?= $form->field($model, 'jumlah_point')->dropDownList(
        ArrayHelper::map(\backend\models\PointKonversi::find()->all(), 'jumlah_point', function ($model) {
            return $model->harga . ' ( ' . $model->jumlah_point . ' point )';
        }),
        ['prompt' => 'Pilih Jumlah Point']
    ) ?>
    <?= $form->field($model, 'keterangan')->textInput([]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>