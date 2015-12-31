<?php
/*
*	AccountPaymentCheckoutPage extends CheckoutPage
*/
class AccountPaymentCheckoutPage extends DataExtension
{
    public function onAfterInit()
    {
        Requirements::javascript('swipestripe-account-payments/js/accountpayment.js');
    }

    private static $allowed_actions = array(
        'AccountPaymentFields'
    );

    public function AccountPaymentFields($request)
    {
        if (Director::is_ajax()) {
            $customer = Member::currentUser();
            $fields = CompositeField::create(
                TextField::create('AccountPaymentNumber', 'Account Number', ($customer ? $customer->AccountNumber : ''))->setAttribute('required', 'required')
            )->setName('AccountPaymentFields');

            return $fields->FieldHolder();
        }
        return false;
    }
}
