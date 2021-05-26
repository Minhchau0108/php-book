<?php
class Model_Form extends Orm\Model {
    protected static $_connection = 'production';
    protected static $_table_name = 'form';
    protected static $_primary_key = array('id');

    protected static $_properties = array (
        'id',
        'user_id',
        'phone',
        'address',
        'created_at'
    );

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'property' => 'created_at',
            'mysql_timestamp' => false,
        ),
    );

}