<?php
namespace app\controllers;
use Yii;

use yii\web\Controller;

use app\models\PaymentForm;

class PaymentController extends Controller
{
    public function actionIndex()
    {
        # Getting session data
        $session = Yii::$app->session;
        $model = new PaymentForm();
        $model->ammount = $session->get('ammount');
        $model->assignment = $session->get('assignment'); 
        $init_time = $session->get('init_time');    
        
        # Checking session time out. 
        if(time() - $init_time > 1800)
        {
            $session->close();
            $session->destroy();
            return $this->render("timeout");
        }
        # If everithing OK, then ...
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $session->close();
            $session->destroy();
            return $this->render('index');
        } 
        # else redirecting to payment form and showing errors
        else {
            
            return $this->render('paymentForm',['model'=>$model]);
        }

        
    }
}