<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var backend\models\OrderDisplay $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card card-header">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'jumlah')->label('Jumlah Ac')->textInput() ?>

    <?= $form->field($model, 'jenis_layanan')->label('Merk AC')->dropDownList([
        '' => '- Pilih Kategori -',
        1 => 'Cuci Ac',
        2 => 'Service Ac',
    ]) ?>

    <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'masalah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_merk')->label('Merk AC')->dropDownList([
        '' => '- Pilih Kategori -',
        1 => 'Panasnibos',
        2 => 'Krisspy',
        3 => 'Mbakpion',
    ]) ?>

    <?= $form->field($model, 'type_ac')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Seri AC / Boleh kosong']) ?>

    <?= $form->field($model, 'alamat')->dropDownList(
        ArrayHelper::map(\backend\models\Alamat::find()->where(['id_user' => $model->id_user])->all(), 'id_alamat', 'alamat', 'provinsi'),
        ['prompt' => 'Pilih Alamat']
    ) ?>

    <?= $form->field($model, 'jadwal_pengerjaan')->widget(DatePicker::class, [
        'value' => date('Y-m-d', strtotime('+2 days')),
        'options' => ['placeholder' => 'Select issue date ...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]);
    ?>

    <?= $form->field($model, 'tgl_pesan')->textInput(['disabled' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>