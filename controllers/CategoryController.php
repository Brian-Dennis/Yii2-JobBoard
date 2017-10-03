<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Category;

class CategoryController extends \yii\web\Controller{
    /*
    * Access Control
    */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

  public function actionIndex(){
    //   Create Query
    $query = Category::find();

    $pagination = new Pagination([
        'defaultPageSize' => 20,
        'totalCount' => $query->count(),
    ]);
    // Run the query and place results inside a variable
    $categories = $query->orderBy('name')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

    return $this->render('index', [
        'categories' => $categories,
        'pagination' => $pagination,
    ]);
  }

  public function actionCreate(){
      $category = new Category();

      if ($category->load(Yii::$app->request->post())) {
        // Validation
          if ($category->validate()) {
            $category->save();

            // Send Message
            Yii::$app->getSession()->setFlash('success', 'Category Added');
            return $this->redirect('index.php?r=category');
          }
      }

      return $this->render('create', [
          'category' =>$category,
      ]);
  }
}
