<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Cliente;
use app\models\ClienteSearch;
use app\models\Producto;
use app\models\ProductoSearch;
use app\models\Preparar;

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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {   

        $cliente = new Cliente;
        $model = new ClienteSearch;
        $producto = new Producto;
        $model_producto = new ProductoSearch;
        $model_preparar = new Preparar;

        if ($model->load(Yii::$app->request->post())){
            
            $cliente = Cliente::find()->where(['identificacion' => $model->identificacion])->one();
            
            if ($model_producto->load(Yii::$app->request->post())){
                $producto = Producto::find()->where(['codigo' => $model_producto->codigo])->one();

                return $this->render('index', [
                    'model' => $model, 'cliente' => $cliente, 
                    'producto' => $producto, 'model_producto' => $model_producto, 
                    'model_preparar' => $model_preparar
                ]);
            }

            return $this->render('index', [
                    'model' => $model, 'cliente' => $cliente, 
                    'producto' => $producto, 'model_producto' => $model_producto, 
                    'model_preparar' => $model_preparar
                ]);
        }
            
        return $this->render('index', [
            'model' => $model, 'cliente' => $cliente, 
            'producto' => $producto, 'model_producto' => $model_producto, 
            'model_preparar' => $model_preparar
        ]);
        

        
    }

    public function actionCargar($id_cliente,$id_producto){

        $model_preparar = new Preparar;
        $cliente = Cliente::findOne($id_cliente);
        $producto = Producto::findOne($id_producto);
        $posible = 1;

        $model_preparar->id_cliente = $cliente->id_cliente;
        $model_preparar->id_producto = $producto->id_producto;
        $model_preparar->posible =  $posible;
        $model_preparar->cantidad = 1;
        $model_preparar->total = $producto->precio * 1;

        if($model_preparar->save()){
            $preparar = Preparar::find()->where(['posible' => $posible])->all();
            return $this->render('preview', ['preparar' => $preparar]);
        }

    }

    public function actionPreview($posible)
    {
        $preparar = Preparar::find()->where(['posible' => $posible])->all();
        return $this->render('preview', ['preparar' => $preparar]);
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

    
}
