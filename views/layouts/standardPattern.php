<?php

    /** @var yii\web\View $this */
    /** @var string $content */

    use app\assets\AppAsset;
    use yii\helpers\Html;
    use yii\helpers\Url;

    AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title><?= $this->title?></title>
    <?php $this->head() ?>
</head>
<body class="p-3 mb-2 bg-dark text-white">
    <?php $this->beginBody() ?>

    <header id="main">
        <div class="card">
            <div class="card-body bg-dark">
                <nav class="navbar navbar-default bg-dark">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <?= Html::a('Главная', ['/page/index'], ['class' => 'navbar-brand text-white'])?>
                        </div>

                    </div>            
                </nav>
            </div>
        </div>   
    </header>
    <!--<nav class="navbar navbar-expand navbar-dark bg-white" aria-label="Второй пример панели навигации">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Переключение навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>-->

    <div class="wrap">
        <div class="container">
            <br><br>
            <?= $content?>

        </div>
    </div>    

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>