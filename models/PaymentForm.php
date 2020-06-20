<?php

namespace app\models;

use yii\base\Model;

class PaymentForm extends Model
{
    public $ammount;
    public $assignment;
    public $cardnum;
    public $expmonth;
    public $expyear;
    public $cvv;

    public function rules()
    {
        return [
            [['cardnum', 'expmonth','expyear','cvv'], 'required'],
            [['expmonth','expyear'], 'integer'],
            ['cardnum','ValidateCard']
            
        ];
    }
    public function ValidateCard()
    {
        # Here is Luhn algorithm, no comments :))
        $number = strrev(preg_replace('/[^\d]+/', '', $this->cardnum));
        $sum = 0;
        for ($i = 0, $j = strlen($number); $i < $j; $i++) {
            if (($i % 2) == 0) {
                $val = $number[$i];
            } else {
                $val = $number[$i] * 2;
                if ($val > 9)  {
                    $val -= 9;
                }
            }
            $sum += $val;
        }

        if(!(($sum % 10) === 0))
          $this->addError('cardnum','Card number is not valid!');
    }
}