<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
    <?php       
    $form = ActiveForm::begin([
    'id' => 'pay-form',
        ]) ?>
    <?= $form->field($model, 'ammount') ?>
    <?= $form->field($model, 'assignment') ?>
    <?= $form->field($model, 'cardnum') ?>
    <?= $form->field($model, 'expmonth') ?>
    <?= $form->field($model, 'expyear') ?>
    <?= $form->field($model, 'cvv') ?>

    <div class="form-group form-central">
        
            <?= Html::submitButton(' Pay ', ['class' => 'btn btn-lg btn-success']) ?>
    
    </div>
<?php ActiveForm::end() ?>
        
        <!-- <h1>Congratulations!</h1>

        <p class="lead">You have successfully created payment session.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div> -->

   
</div>
