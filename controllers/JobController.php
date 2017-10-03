<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Category;
use app\models\Job;

class JobController extends \yii\web\Controller{
    public function actionIndex(){
        //   Create Query
        $query = Job::find();

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);
        // Run the query and place results inside a variable
        $jobs = $query->orderBy('create_date DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'jobs' => $jobs,
            'pagination' => $pagination,
        ]);
    }

    public function actionDetails($id){
        // Get Job
        $job = Job::find()
            ->where(['id' => $id])
            ->one();

        //  Render View
        return $this->render('details', ['job' => $job]);
    }

    public function actionCreate(){
        $job = new Job();

       if ($job->load(Yii::$app->request->post())) {
           if ($job->validate()) {
            // Save
            $job->save();

            // Show Message
            Yii::$app->getSession()->setFlash('success', 'Job Added');

            // Redirect
            return $this->redirect('index.php?r=job');
           }
       }

       return $this->render('create', [
           'job' => $job,
       ]);
    }

    public function actionDelete($id){
        $job = Job::findOne($id);

        $job->delete();

        // Show Message
        Yii::$app->getSession()->setFlash('success', 'Job Deleted');

        // Redirect
        return $this->redirect('index.php?r=job');
    }

    public function actionEdit($id){
        $job = Job::findOne($id);

       if ($job->load(Yii::$app->request->post())) {
           if ($job->validate()) {
            // Save
            $job->save();

            // Show Message
            Yii::$app->getSession()->setFlash('success', 'Job Updated');

            // Redirect
            return $this->redirect('index.php?r=job');
           }
       }

       return $this->render('edit', [
           'job' => $job,
       ]);
    }
}
