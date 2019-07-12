<?php

namespace app\controllers;

use Yii;
use app\models\Rua;
use app\models\RuaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RuaController implements the CRUD actions for Rua model.
 */
class RuaController extends Controller
{
    /**
     * {@inheritdoc}
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

    public function actionHome()
    {
        $ruas = \app\models\Rua::findBySql("select * from rua where setor_idsetor = 1")->all();
        
        return $this->render('home', [
            'ruas' => $ruas,
            
        ]);
    
    }
        public function actionHome1()
    {
        $ruas = \app\models\Rua::findBySql("select * from rua where setor_idsetor = 2")->all();
        
        return $this->render('home1', [
            'ruas' => $ruas,
            
        ]);
    
    }
        public function actionHome2()
    {
        $ruas = \app\models\Rua::findBySql("select * from rua where setor_idsetor = 3")->all();
        
        return $this->render('home2', [
            'ruas' => $ruas,
            
        ]);
    
    }

    public function actionHome3()
    {
        $ruas = \app\models\Rua::findBySql("select * from rua where setor_idsetor = 4")->all();
        
        return $this->render('home3', [
            'ruas' => $ruas,
            
        ]);
    
    }
    /**
     * Lists all Rua models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RuaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rua model.
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
     * Creates a new Rua model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rua();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idrua]);
        }

        return $this->render('create', [
            'model' => $model,
            'listSetores' => $this->listarSetores(),
        ]);
    }

    /**
     * Updates an existing Rua model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idrua]);
        }

        return $this->render('update', [
            'model' => $model,
            'listSetores' => $this->listarSetores(),
        ]);
    }

    /**
     * Deletes an existing Rua model.
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
     * Finds the Rua model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rua the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rua::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    private function listarSetores() {
        $listSetores = \app\models\SetorSearch::find()->all();
        $listSetores = \yii\helpers\ArrayHelper::map($listSetores, 'idsetor', 'nome');
        return $listSetores;
    }
}
