<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Congregacion */

$this->title = $model->cong_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Congregacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="congregacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cong_codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cong_codigo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<img src="/saic/web/archivos/images/<?=(($model['cong_fotografia'])?$model['cong_fotografia']:'Unknown_Person.PNG')?>" alt="" class="img-responsive"/></div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cong_codigo',
            'cong_nombre',
            'cong_sector',
            'econg_codigo',
            'tcong_codigo',
        ],
    ]) ?>

</div>
