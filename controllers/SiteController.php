<?php

namespace app\controllers;

use app\models\City;
use app\models\Post;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;

class SiteController extends Controller
{


    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
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
        $city = City::find()->all();
        return $this->render('index', $params = ['cities' => $city]);
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

    public function actionEntrance()
    {
        return $this->render('entrance');
    }

    public function actionRegistration()
    {
        return $this->render('registration');
    }

    public function actionYou_post()
    {
        $posts = Post::find()
        ->where(['user_id' =>  Yii::$app->user->id])
        ->all();
        return $this->render('you_post',["posts" => $posts]);

    }

    public function actionDelete($id)
    {
        // $this->findModel($id)->delete();
        Post::findOne($id)->delete();
        return $this->redirect(Url::to(['/site/you_post']));
    }

    public function actionProfile()
    {
        $user = User::find()
        ->where(['id' => Yii::$app->user->id])
        ->one();
        return $this->render('profile',["user" => $user]);
    }

    public function actionPage_models()
    {
        $posts = Post::find()
        ->where(['activities_id' => 2])
        ->all();
        return $this->render('page_models',["posts" => $posts]);

    }

    public function actionPage_photograf()
    {
        $posts = Post::find()
        ->where(['activities_id' => 1])
        ->all();
        return $this->render('page_photograf',["posts" => $posts]);
    }

    public function actionAddAdmin()
    {
        $model = User::find()->where(['username' => 'admin'])->one();
        if (empty($model)) {
            $user = new User();
            $user->login = "dfdf";
            $user->birthday = "12.02.23";
            $user->city_id = "1";
            $user->activities_id = "1";
            $user->gender_id = "1";
            $user->role_id = "1";
            $user->username = 'admin';
            $user->password_reset_token = 'admin';
            $user->status = '1';
            $user->created_at = '1';
            $user->updated_at = '1';
            $user->password_hash = $user->setPassword(56341);
            $user->auth_key = $user->generateAuthKey();
            $user->email = 'admin@кодер.укр';
            $user->setPassword('admin');
            $user->generateAuthKey();

            if ($user->save()) {

                echo 'good';
            }
            VarDumper::dump($user->errors);
        }
    }


    public function actionSignup()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->password_hash = $model->setPassword($model->password_hash);
            $model->auth_key = $model->generateAuthKey();
            if ($user = $model->save()) {
                if (Yii::$app->getUser()->login(User::findOne($model->id))) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }


}
