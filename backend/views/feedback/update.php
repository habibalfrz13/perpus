<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Feedback $model */

$this->title = 'Update Feedback: ' . $model->id_feedback;
$this->params['breadcrumbs'][] = ['label' => 'Feedbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_feedback, 'url' => ['view', 'id_feedback' => $model->id_feedback]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="feedback-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
