<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\OrderDisplaySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-display-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_order') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'jumlah') ?>

    <?= $form->field($model, 'jenis_layanan') ?>

    <?= $form->field($model, 'detail') ?>

    <?php // echo $form->field($model, 'masalah') 
    ?>

    <?php // echo $form->field($model, 'id_merk') 
    ?>

    <?php // echo $form->field($model, 'type_ac') 
    ?>

    <?php // echo $form->field($model, 'alamat') 
    ?>

    <?php // echo $form->field($model, 'jadwal_pengerjaan') 
    ?>

    <?php // echo $form->field($model, 'status') 
    ?>

    <?php // echo $form->field($model, 'tgl_pesan') 
    ?>

    <?php // echo $form->field($model, 'id_teknisi') 
    ?>

    <?php // echo $form->field($model, 'point_teknisi') 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>