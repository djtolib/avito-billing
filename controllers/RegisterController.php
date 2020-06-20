<?php
namespace app\controllers;

use yii\rest\Controller;
use app\models\User;
use  yii\helpers\Url;

use yii\web\Response;

class RegisterController extends Controller
{
    
    public function actionIndex()
    {
        # Getting data from url 
        $ammount = \Yii::$app->request->get('ammount');
        $assignment = \Yii::$app->request->get('assignment'); 
        $session = \Yii::$app->session;

        # Activeting session and saving into session data geted from url
        if (!$session->isActive) $session->open();
        session_regenerate_id();
        $session->set('ammount', $ammount);
        $session->set('assignment', $assignment);
        $session->set('session_id', session_id());
        $session->set('init_time',time());
        
        # Setting JSON format for ansver
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return array('url' => Url::base(true)."/payment?session_id=".session_id());

    }

    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
        ];
    }
}
