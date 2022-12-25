<?php
    use yii\helpers\Html;
?>
<?php if(Yii::$app->session->hasFlash('success')):?>
    <br>
    <div class="alert alert-success" role="alert">
        <?php echo Yii::$app->session->getFlash('success');?>
    </div>
    <?php Yii::$app->session->remove('success')?>
<?php endif;?>
<?php if(Yii::$app->session->hasFlash('error')):?>
    <br>
    <div class="alert alert-danger" role="alert">
        <?php echo Yii::$app->session->getFlash('error')?>
    </div>
    <?php Yii::$app->session->remove('error')?> 
<?php endif;?>

<div class="row">
    <h1>Page View</h1>
    <div>
        <div class="col-lg-5">
            <h4><?=  Html::encode($updatePage->title)?></h4>
        </div>
        <div class="col-lg-8">
            <p><?= Html::encode($updatePage->content)?></p>
        </div>
        <?= Html::a('Редактировать', ['/page/' . $updatePage->title . '/update'], ['class' => 'btn btn-info text-white'])?> 
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