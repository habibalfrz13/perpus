<?php

use backend\models\AlamatKategori;
use backend\models\Pelanggan;
use backend\models\TbProvinsi;
use backend\models\TbKotaKabupaten;
use backend\models\TbKecamatan;
use PhpParser\Node\Stmt\Label;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


$user = Yii::$app->user->identity;
$pelanggan = Pelanggan::find()->where(['id_user' => $user->id])->one();


/** @var yii\web\View $this */
/** @var backend\models\Alamat $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card card-body">
  <div class="alamat-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php if (Yii::$app->user->identity->role == 'customer') : ?>
      <?= $form->field($model, 'nama')->label('Nama Pelanggan')->textInput([
        'value' => $pelanggan->nama,
        'readonly' => true,
      ]) ?>
    <?php else : ?>
      <?= $form->field($model, 'id_user')->label('Nama Pelanggan')->dropDownList(
        ArrayHelper::map(\backend\models\Pelanggan::find()->all(), 'id_user', 'nama'),
        ['prompt' => 'Pilih Nama Pelanggan']
      ) ?>
    <?php endif; ?>


    <?= $form->field($model, 'provinsi')->dropDownList(
      \yii\helpers\ArrayHelper::map(\backend\models\TbProvinsi::find()->all(), 'id', 'nama'),
      ['prompt' => 'Pilih Provinsi']
    ) ?>

    <?= $form->field($model, 'kota')->dropDownList(
      \yii\helpers\ArrayHelper::map(\backend\models\TbKotaKabupaten::find()->all(), 'id', 'nama'),
      ['prompt' => 'Pilih Kota/Kabupaten']
    )->label('Kota/Kabupaten') ?>

    <?= $form->field($model, 'kecamatan')->dropDownList(
      \yii\helpers\ArrayHelper::map(\backend\models\TbKecamatan::find()->all(), 'id', 'nama'),
      ['prompt' => 'Pilih Kecamatan']
    )->label('Kecamatan') ?>

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