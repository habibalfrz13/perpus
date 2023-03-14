<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\MerkAc $model */

$this->title = 'Create Merk Ac';
$this->params['breadcrumbs'][] = ['label' => 'Merk Acs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="merk-ac-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
