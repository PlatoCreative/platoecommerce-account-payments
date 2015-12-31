<?php

class AccountPaymentGateway extends PaymentGateway
{

    protected $supportedCurrencies = array(
        'USD' => 'United States Dollar',
        'GBP' => 'Great British Pound',
        'NZD' => 'New Zealand Dollar'
    );
    
    public function validate($data)
    {
        $validationResult = $this->getValidationResult();
        
        if (! isset($data['Amount'])) {
            $validationResult->error('Payment amount not set');
        } elseif (empty($data['Amount'])) {
            $validationResult->error('Payment amount cannot be null');
        }
        
        $this->validationResult = $validationResult;
        return $validationResult;
    }
    
    public function process($data)
    {
        return new PaymentGateway_Success();
    }
    
    public function getSupportedCurrencies()
    {
        $config = $this->getConfig();
        if (isset($config['supported_currencies'])) {
            $this->supportedCurrencies = $config['supported_currencies'];
        }
        return $this->supportedCurrencies;
    }
}
