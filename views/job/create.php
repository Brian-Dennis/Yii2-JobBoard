<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $job app\models\job */
/* @var $form ActiveForm */
?>
<div class="job-create">
<h2 class="page-header">Create Job</h2>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($job); ?>

        <?= $form->field($job, 'category_id')
            ->dropDownList(Category::find()
                ->select(['name', 'id'])
                ->indexBy('id')
                ->column(), ['prompt' => 'Select Category']);
        ?>
        <?= $form->field($job, 'title') ?>
        <?= $form->field($job, 'description')->textArea(['rows' => '6']) ?>
        <?= $form->field($job, 'type')->dropDownList([
            'full_time' => 'Full Time',
            'part_time' => 'Part Time',
            'as_needed' => 'As Needed'
        ],
        ['prompt' => 'Select Type']) ?>
        <?= $form->field($job, 'requirements') ?>
        <?= $form->field($job, 'salary_range')->dropDownList([
            'Under $20k' => 'Under $20k',
            '$20k - $40k' => '$20k - $40k',
            '$40k - $60k' => '$40k - $60k',
            '$60k - $80k' => '$60k - $80k',
            '$80k - $100k' => '$80k - $100k',
            'Over $100k' => 'Over $100k'
        ],
        ['prompt' => 'Select Salary']) ?>
        <?= $form->field($job, 'city') ?>
        <?= $form->field($job, 'state') ?>
        <?= $form->field($job, 'zipcode') ?>
        <?= $form->field($job, 'contact_email') ?>
        <?= $form->field($job, 'contact_phone') ?>
        <?= $form->field($job, 'is_published')->radioList(array('1' => 'Yes' , '0' => 'No')) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- job-create -->
