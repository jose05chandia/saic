<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RolCuenta */

$this->title = 'Create Rol Cuenta';
$this->params['breadcrumbs'][] = ['label' => 'Rol Cuentas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-cuenta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
