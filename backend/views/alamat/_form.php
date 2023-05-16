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

    <?= $form->field($model, 'provinsi')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan provinsi']) ?>

    <?= $form->field($model, 'kota')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan kota/kabupaten'])->label('Kota/Kabupaten') ?>

    <?= $form->field($model, 'kecamatan')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan kecamatan']) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan alamat']) ?>

    <?= $form->field($model, 'kode_pos')->textInput(['placeholder' => 'Masukkan kode pos']) ?>

    <?= $form->field($model, 'latitude')->textInput(['placeholder' => 'Masukkan latitude']) ?>

    <?= $form->field($model, 'longitude')->textInput(['placeholder' => 'Masukkan longitude']) ?>

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