<?php

namespace app\controllers;

use Yii;
use app\models\Agenda;
use app\models\Setor;
use app\models\Postagem;
use app\models\PostagemSearch;
use app\models\Resposta;
use app\models\RespostaSearch;
use app\models\Rua;
use app\models\AgendaSearch;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\PesquisarRuaForm;
use app\models\ContactForm;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use app\componets\filters\HttpsFilter;
use app\models\Event;
use yii\db\Query;



class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            'https' => [
                'class' => HttpsFilter::className(),
                'only'=>['login'],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionMaps()
    {
       // $alunos = Aluno::find()->all();

        return $this->render('map');
    
    }


    public function actionRua() {
        $model = new Rua();
        $rua = "null";
        $setor = "null";
        if ($model->load(Yii::$app->request->post())) {
            $rua = $model->nome;
            $rua = \app\models\Rua::find()->where(['nome' => $model->nome])->one();
            $setor = \app\models\Setor::find()->where(['idsetor' => $rua->setor_idsetor])->one();
        }
        return $this->render('rua', [
            'model' => $model,
            'rua' => $rua,
            'setor' => $setor,
        ]);
       // return $this->render('rua');
    }
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {   
        
        $searchModel = new RespostaSearch();
        $dataProvider2 = $searchModel->search(Yii::$app->request->queryParams);
        $resposta = Resposta::find()->all();

        $searchModel = new PostagemSearch();
        $dataProvider1 = $searchModel->search(Yii::$app->request->queryParams);
        $postagem = Postagem::find()->all();
        
        date_default_timezone_set('America/Sao_Paulo');
        //preencher o grid agenda de abastecimento
        $searchModel = new AgendaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //selecionar o mapa do setor que está sendo abastecido
        $dataAtual = date('Y-m-d');
        $agenda = Agenda::find()->where(['data' => $dataAtual])->one();
        
                    //var_dump($dataAtual);die();

        
        $setor1 = null;
        if ($agenda != null) {
            $setor1 = Setor::find()->where(['idsetor' => $agenda->setor_idsetor])->one();
            
        }
        
        $frmRua = new PesquisarRuaForm();

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
             'setor1'=> $setor1,
             'searchModel'=> $searchModel,
             'dataProvider'=> $dataProvider,
             'frmRua'=> $frmRua,
             'postagem'=> $postagem,
             'dataProvider1'=> $dataProvider1,
             'dataProvider2'=> $dataProvider2,
             'resposta'=> $resposta
                 
        ]);
    }

     public function actionPesquisar(){
                date_default_timezone_set('America/Sao_Paulo');

    //selecionar o mapa do setor que está sendo abastecido
        $dataAtual = date('Y-m-d');
        $agenda = Agenda::find()->where(['data' => $dataAtual])->one();
        $setor1 = null;
        if ($agenda != null) {
            $setor1 = Setor::find()->where(['idsetor' => $agenda->setor_idsetor])->one();
        }   
    //preencher o grid agenda de abastecimento
        $searchModel = new AgendaSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $frmRua = new PesquisarRuaForm();
        $rua = (Yii::$app->request->post()["PesquisarRuaForm"]["rua"]);
            //$idsetor = Rua::find()->where(['nome' => $frmRua->rua]);
        $idsetor = Yii::$app->db->createCommand('SELECT setor_idsetor FROM rua WHERE nome LIKE :nome', [':nome' =>  '%' . $rua .  '%'])->queryOne();
        //var_dump($idsetor);
        //die();
        $query = Agenda::find()->where(['setor_idsetor' => $idsetor]);
        
        $dataProvider = new ActiveDataProvider([
          'query' => $query,
        ]);


        
        return $this->render('index', [
                'searchModel'   => $searchModel,
                'dataProvider'  => $dataProvider,
                'setor1'        => $setor1,
                'frmRua'        => $frmRua
            ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSetor()
    {

        $api = new \RestClient([

            'base_url' => 'http://localhost/estacionamento/web/?r=api',
            'headers' => [
                'accept' => 'application/json'
            ]

        ]);

        $result = $api->get('/default');

       $data = json_decode($result->response, true);

      // echo 'Visualizar '; print_r($data); die();

        return $this->render('setor', [
            'data' => $data
        ]);
    }
}


