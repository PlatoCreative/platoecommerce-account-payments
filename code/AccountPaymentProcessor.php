<?php

class AccountPaymentProcessor extends PaymentProcessor
{
        
    public function capture($data)
    {
        $extradata = isset($data['ExtraData']) ? $data['ExtraData'] : false;
        if ($extradata) {
            unset($data['ExtraData']);
        }
        $this->payment->AccountPaymentNumber = isset($extradata['AccountPaymentNumber']) ? $extradata['AccountPaymentNumber'] : null;
        
        parent::capture($data);
        
        // Do redirection
        $this->doRedirect();
    }
}
