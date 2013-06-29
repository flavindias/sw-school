<?php

class Company extends AppModel {

   public $useTable = 'companies';

   //public $hasOne = 'Documento';

   public $hasOne = array(
      'Address' => array(
         'className' => 'Address',
         'foreignKey' => 'company_id',
         'fields' => array('id', 'address', 'number','neighborhood','city','state','complement','zip_code'),
         'conditions' => array(),         
         'dependent' => true
      ),
	  'Sponsor' => array(
         'className' => 'Sponsor',
         'foreignKey' => 'company_id',
         'fields' => array('id', 'name', 'phone1', 'phone2','email'),
         'conditions' => array(),       
         'dependent' => true
      ),
	  'Financial' => array(
         'className' => 'Financial',
         'foreignKey' => 'company_id',
         'fields' => array('id', 'name', 'phone1','phone2','email'),
         'conditions' => array(),       
         'dependent' => true
      ),
	  'Sepg' => array(
         'className' => 'Sepg',
         'foreignKey' => 'company_id',
         'fields' => array('id', 'name', 'phone1','phone2','email'),
         'conditions' => array(),       
         'dependent' => true
      ),
      'BankInfoCompany' => array(
         'className' => 'BankInfoCompany',
         'foreignKey' => 'companies_id',
         'fields' => array('name_bank', 'number_agency','number_account', 'companies_id'),
         'conditions' => array(),         
         'dependent' => true
      )
   );

}

?>
