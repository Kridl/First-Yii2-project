<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
?>          

<div class="row">
    <h1>Update Page</h1>
    <div>
        <div class="col-lg-5">
            <h4><?= Html::encode($updatePage->title)?></h4>
        </div>
        <div class="col-lg-8">
            <?php $form = ActiveForm::begin(['options' => ['id' => 'NewPageForm']])?>
            <?= $form->field($updatePage, 'content')->textarea(['rows' => 5])?><br>
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-success'])?>
            <?php ActiveForm::end()?>
        </div>
    </div>   
</div>
<style>
    .help-block {
    color: lightcoral;
}

.has-error > input {
    border: 1px solid lightcoral;
}
</style>