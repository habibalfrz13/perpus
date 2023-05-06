<?php

use backend\models\AlamatKategori;
use backend\models\Pelanggan;
use PhpParser\Node\Stmt\Label;
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

        <?= $form->field($model, 'id_user')->label('Nama Pelanggan')->dropDownList(
            ArrayHelper::map(\backend\models\Pelanggan::find()->all(), 'id_user', 'nama'),
            [
                'value' => ArrayHelper::getValue($model, 'nama'),
                'disabled' => true, // membuat dropdown list menjadi readonly
            ]
        ) ?>

        <?= $form->field($model, 'provinsi')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kota')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kecamatan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kode_pos')->textInput() ?>

        <?= $form->field($model, 'latitude')->textInput() ?>

        <?= $form->field($model, 'longitude')->textInput() ?>

        <?= $form->field($model, 'id_kategori')->dropDownList(
            ArrayHelper::map(\backend\models\AlamatKategori::find()->all(), 'id', 'nama'),
            [
                'prompt' => '- Pilih Kategori -',
            ]
        ) ?>


        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Back', ['index'], ['class' => 'btn btn-dark']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>