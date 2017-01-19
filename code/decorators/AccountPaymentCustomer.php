<?php
/*
*	AccountPaymentCustomer extends Customer
*/
class AccountPaymentCustomer extends DataExtension
{
    public static $db = array(
        'AccountNumber' => 'Varchar(250)'
    );

    public static $has_one = array(
    );

    public static $has_many = array(
    );

    public function updateCMSFields(FieldList $fields)
    {
        return $fields;
    }
}

/*
*	AccountPaymentAccountPage_Controller extends AccountPage_Controller
*/
class AccountPaymentAccountPage_Controller extends DataExtension
{
    // Registration form
    public function updateRegisterAccountFields($fields, $customer, $required)
    {
        $fields->insertBefore(TextField::create('AccountNumber', 'Account Number'), 'Password');
        return $fields;
    }

    // Do account registration
    public function updateAccountRegister($data, $customer)
    {
        $customer->AccountNumber = isset($data['AccountNumber']) ? $data['AccountNumber'] : '';
        return $customer;
    }

    // Edit form
    public function updateEditAccountFields($fields, $customer, $required)
    {
        $fields->insertBefore(TextField::create('AccountNumber', 'Account Number', $customer->AccountNumber), 'Password');
        return $fields;
    }

    // Do edit account info
    public function updateAccountEdit($data, $customer)
    {
        $customer->AccountNumber = isset($data['AccountNumber']) ? $data['AccountNumber'] : '';
        return $customer;
    }
}
