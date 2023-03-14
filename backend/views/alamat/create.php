<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Alamat $model */

$this->title = 'Create Alamat';
$this->params['breadcrumbs'][] = ['label' => 'Alamats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alamat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
