<?php

namespace app\controllers;

use Yii;
use app\models\Event;
use app\models\EventSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Event models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $events = Event::find()->all();
        
        $tasks = [];
        
        foreach ($events as $eve) {
            
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $eve->ideventos;
            $event->title = $eve->titulo;
            $event->backgroundColor = 'red';
            $event->start = $eve->dataEvento;
            $tasks[] = $event;
            
        }

        return $this->render('index', [
             'events'=> $tasks,
             'searchModel' => $searchModel,
             'dataProvider' => $dataProvider,
        ]);
    }
     public function actionHome()
    {
        $events = Event::find()->all();
        
        $tasks = [];
        
        foreach ($events as $eve) {
            
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $eve->ideventos;
            $event->title = $eve->titulo;
            $event->backgroundColor = '#F5A9A9';
            $event->start = $eve->dataEvento;
            $event->color = 'black';
            $event->textColor = 'black';
            $tasks[] = $event;
            
        }
        return $this->render('home', [
          
             'events'=> $tasks,
            
        ]);
    
    }
     public function actionHome1()
    {
        $events = Event::find()->all();
        
        $tasks = [];
        
        foreach ($events as $eve) {
            
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $eve->ideventos;
            $event->title = $eve->titulo;
            $event->backgroundColor = '#F5A9A9';
            $event->start = $eve->dataEvento;
            $event->color = 'black';
            $event->textColor = 'black';
            $tasks[] = $event;
            
        }
        return $this->render('home', [
          
             'events'=> $tasks,
            
        ]);
    
    }

    /**
     * Displays a single Event model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Event();
      //  $model->dataEvento = $date;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ideventos]);
        }else{
        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }
    }
    /**
     * Updates an existing Event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ideventos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Event model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
