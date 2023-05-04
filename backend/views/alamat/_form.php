<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var backend\models\Alamat $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card card-body">
    <div class="alamat-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'provinsi')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kota')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kecamatan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kode_pos')->textInput() ?>

        <?= $form->field($model, 'latitude')->textInput() ?>

        <?= $form->field($model, 'longitude')->textInput() ?>

        <?= $form->field($model, 'status')->dropDownList([0 => '0', 10 => '10',], ['prompt' => '']) ?>


        <?= $form->field($model, 'id_kategori')->dropDownList([
            '' => '- Pilih Kategori -',
            1 => 'Kantor',
            2 => 'Rumah',
            3 => 'Kos-Kosan',
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <a href="<?= Yii::$app->request->referrer ?>" class="btn btn-dark">Back</a>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>