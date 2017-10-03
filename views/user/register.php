<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
?>
<div class="user-register">
<h2 class="page-header">Register</h2>
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($user); ?>
        <?= $form->field($user, 'full_name'); ?>
        <?= $form->field($user, 'username'); ?>
        <?= $form->field($user, 'email'); ?>
        <?= $form->field($user, 'password')->passwordInput(); ?>
        <?= $form->field($user, 'password_repeat')->passwordInput(); ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-register -->
