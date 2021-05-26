<?php
class Model_Detail extends Orm\Model {
    protected static $_connection = 'production';
    protected static $_table_name = 'detail_form';
    protected static $_primary_key = array('id');

    protected static $_properties = array (
        'id',
        'form_id',
        'book_id',
    );

}