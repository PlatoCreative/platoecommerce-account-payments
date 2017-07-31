<?php
/*
*	AccountPaymentCustomer extends Customer
*/
class AccountPaymentCustomer extends DataExtension {
	public static $db = array(
		'AccountNumber' => 'Varchar(250)'
	);

	public static $has_one = array(
	);

	public static $has_many = array(
	);

	public function updateCMSFields(FieldList $fields){
		return $fields;
	}
}
