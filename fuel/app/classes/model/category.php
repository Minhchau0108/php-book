  
<?php
class Model_Category extends Orm\Model {
    protected static $_connection = 'production';
    protected static $_table_name = 'category';
    protected static $_primary_key = array('id');

    protected static $_properties = array (
        'id',
        'name' => array (
            'data_type' => 'varchar',
            'label' => 'Category name',
            'validation' => array (
                'required',
            ),
            'form' => array (
                'type' => 'text'
            ),
        ),
    );
    protected static $_observers = array('Orm\\Observer_Validation' => array (
        'events' => array('before_save')
    ));
}