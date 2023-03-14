<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Feedback $model */

$this->title = $model->id_feedback;
$this->params['breadcrumbs'][] = ['label' => 'Feedbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="feedback-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_feedback' => $model->id_feedback], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_feedback' => $model->id_feedback], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_feedback',
            'id_user',
            'id_order',
            'id_teknisi',
            'rating',
            'ulasan',
            'create_at',
            'point',
        ],
    ]) ?>

</div>
