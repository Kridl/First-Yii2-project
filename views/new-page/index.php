<?php
  use yii\helpers\Html;
?>
<div class="container col-12 col-xl-16 ">
  <h1 class="card-title">All Pages</h1><br>
  <div class="card">
    <div class="card-body bg-dark">
      <table class="table table-dark table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">content</th>
            <th class="text-right">actions</th>
          </tr>
        </thead>
        <?php foreach($pages as $page): ?>
        <tbody>
          <tr>
            <th ><?= $page['id'] ?></th>
            <td><?= Html::encode($page['title']) ?></td>
            <td><?= Html::encode($page['content']) ?></td>
            <td>
              <button class="btn btn-primary badge-pill" style="width:110px;"><?= Html::a('Подробнее',[ '/page/' . $page['title']],['class' => 'text-white'])?></button>
              <button class="btn btn-danger badge-pill" style="width:140px;"><?= Html::a('Редактировать', ['/page/index?action=delete&idDelete='.$page['id']],['class' => 'text-white'])?></button>
            </td>
          </tr>
        </tbody>
        <?php endforeach;?>
      </table>
    </div>
  </div>
</div>