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


    <?= $form->field($model, 'jenis_layanan')->label('Jenis Layanan')->dropDownList(
        ArrayHelper::map(\backend\models\Layanan::find()->all(), 'id_layanan', 'nama_layanan'),
        ['prompt' => '- Pilih Jenis Layanan -']
    ) ?>

    <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'masalah')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'id_merk')->label('Merk AC')->dropDownList(
        ArrayHelper::map(\backend\models\MerkAc::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pilih Merk Ac']
    ) ?>

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

    <?php if (Yii::$app->user->identity->role == 'operator') : ?>
        <?= $form->field($model, 'id_teknisi')->dropDownList(
            ArrayHelper::map(\backend\models\Teknisi::find()->all(), 'id_teknisi', 'nama_lengkap'),
            ['prompt' => 'Pilih Teknisi']
        ) ?>
    <?php endif; ?>


    <?php if ($model->status == 'diterima') : ?>
        <?= Html::submitButton('Cancel', ['class' => 'btn btn-danger']) ?>
    <?php endif; ?>

    <?php if (Yii::$app->user->identity->role == 'customer') : ?>
        <?php if ($model->status == 'dipesan') : ?>
            <?= Html::submitButton('Pesan', ['class' => 'btn btn-success']) ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (Yii::$app->user->identity->role != 'customer') : ?>
        <?php if ($model->status == 'dipesan') : ?>
            <?= Html::submitButton('Terima', ['class' => 'btn btn-success']) ?>
        <?php endif; ?>
    <?php endif; ?>


    <?php ActiveForm::end(); ?>

</div>