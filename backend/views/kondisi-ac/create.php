<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\KondisiAc $model */

$this->title = 'Create Kondisi Ac';
$this->params['breadcrumbs'][] = ['label' => 'Kondisi Acs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kondisi-ac-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
