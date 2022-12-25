<?php
namespace app\controllers;

use app\models\Pages;
use yii\web\Controller;
use Yii;

class NewPageController extends Controller
{
    public $layout = 'standardPattern';

    //Проверка на наличие страницы в БД
    private function pageExists(string $title, array $pages) : bool
    {   
        foreach($pages as $page){
            if($page['title'] == $title){
                return true;
            }
        }
        return false;
    }
    
    private function toShortText(array $pages) : array
    {
        for($i=0;$i<count($pages);$i++){
            if(strlen($pages[$i]['content'])>75){
                $pages[$i]['content'] = substr($pages[$i]['content'],0,75).'...'; 
            }
        }
        return $pages;
    }

    // Главный контролер 
    public function actionPage($title=null,$action=null,$idDelete=null)
    {
        $pages = $this->toShortText(Pages::find()->asArray()->all());
        
        // Запрос на удаление данных о странице
        if($title == 'index' && $action == 'delete' && $idDelete !== null){
            $pageToDelete = Pages::findOne($idDelete);
            if($pageToDelete){
                $pageToDelete->delete();
                $pages = $this->toShortText(Pages::find()->asArray()->all());
                return $this->render('index',compact('pages'));
            }
        }

        // Отображение главное страницы
        if($title == 'index' || $title === null){
            return $this->render('index',compact('pages'));
        }

        // Манипуляции с существующей страницей
        if($this->pageExists($title, $pages) == true){
            $updatePage = Pages::findOne(['title' => $title]);

            // Редактирование данных страницы
            if ($updatePage->load(Yii::$app->request->post())){
                if($updatePage->save()){
                    Yii::$app->session->setFlash('success', 'Данные приняты');
                    return $this->render('view',compact('updatePage'));
                }else{
                    Yii::$app->session->setFlash('error', 'Ошибка');
                }
            }

            // Открытие страницы для чтения
            if($action === null || $action == 'view'){
                return $this->render('view',compact('updatePage'));
            }
            // Открытие страницы для редактирование
            if($action == 'update'){
                return $this->render('update',compact('updatePage'));
            }

        }else{
            // Создание новой страницы
            if($action === null){
                $newPage = new Pages();
                $newPage->title = $title;
                if($newPage->save()){
                    $updatePage = Pages::findOne(['title' => $title]);
                    return $this->render('update', compact('updatePage'));
                }
            }
        }
    }
}
?>