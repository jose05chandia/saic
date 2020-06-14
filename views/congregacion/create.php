<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Congregacion */

$this->title = 'Create Congregacion';
$this->params['breadcrumbs'][] = ['label' => 'Congregacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="congregacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
