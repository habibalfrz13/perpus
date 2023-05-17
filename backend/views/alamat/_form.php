<?php

use backend\models\AlamatKategori;
use backend\models\Pelanggan;
use backend\models\TbProvinsi;
use backend\models\TbKotaKabupaten;
use backend\models\TbKecamatan;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

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

    <?= $form->field($model, 'provinsi')->widget(Select2::class, [
      'data' => ArrayHelper::map(TbProvinsi::find()->all(), 'id', 'nama'),
      'options' => [
        'placeholder' => '-Pilih-',
        'onchange' => '$.post("listregs?id=' . '"+$(this).val(),
            function(data) {
                $("#kota-select").html(data);
            });'
      ],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ])->label('Provinsi') ?>

    <?= $form->field($model, 'kota')->widget(Select2::class, [
      'data' => [],
      'options' => [
        'placeholder' => 'Pilih Kota/Kabupaten',
        'id' => 'kota-select',
        'onchange' => '$.post("listkecamatan?id=' . '"+$(this).val(),
            function(data) {
                $("#kecamatan-select").html(data);
            });',
      ],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ])->label('Kota/Kabupaten') ?>


    <?= $form->field($model, 'kecamatan')->widget(Select2::class, [
      'data' => [],
      'options' => [
        'placeholder' => 'Pilih Kecamatan',
        'id' => 'kecamatan-select',
      ],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ])->label('Kecamatan') ?>



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