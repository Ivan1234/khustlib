<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\modules\quotes\models\Quotes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quotes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'modified')->textInput(['class'=>'published form-control']) ?>

    <?php $form->field($model, 'created')->textInput(['class'=>'published form-control']) ?>

    <?= $form->field($model, 'visible')->checkbox(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$script = <<< JS
   jQuery(function () {
    $('.published').datetimepicker({
         format: 'YYYY-MM-DD HH:mm',
    });
  });
JS;
$this->registerJs($script, yii\web\View::POS_READY);
?>