<?php

class Controller_Book extends Controller_Template {
    private $current_user;
    public $template = 'layout';

    public function before() {
        parent::before();

        // Assign current_user to the instance so controllers can use it
        $this->current_user = Auth::check() ? Model_User::find(Arr::get(Auth::get_user_id(), 1)) : null;

        Log::debug('Checking auth');
        if (!Auth::check()) {
            Log::debug('Unauthenticated! Redirect to login form');
            Response::redirect('login/login');
        }
    }

    public function action_index() {
        $books = NULL;
        $search_book_name = \Input::param('search_book_name');
        $selected_category = \Input::param('selected_category');
        // Create the view object
        $view = View::forge('book/index');
  

        // fetch the book from database and set it to the view

        if(empty($selected_category)){
            if(empty($search_book_name)){
                $books = Model_Book::find('all');
            }else{
                $books = Model_Book::find('all', array(
                    'where' => array(
                        array('title', 'LIKE', '%'.$search_book_name.'%')
                    )
                ));
            }
        }
        else{
            if(empty($search_book_name)){
                $books = Model_Book::find('all', array(
                    'related' => array(
                        'category' => array(
                            'where' => array(
                                array('name', '=', $selected_category)
                            )
                        )
                    )
                ));
            }else{
                $books = Model_Book::find('all', array(
                    'where' => array(
                        array('title', 'LIKE',  '%'.$search_book_name.'%')
                    ),
                    'related' => array(
                        'category' => array(
                            'where' => array(
                                array('name', '=', $selected_category)
                            )
                        )
                    )
                ));
            }
        }
        
  
        $categories = Model_Category::find('all');
        $view->set('books', $books);
        $view->set('search_book_name', $search_book_name);
        $view->set('categories', $categories);


        // set the template variables
        $this->template->title = "Book index page";
        $this->template->content = $view;

    }
    public function action_addBook() {

        // create a new fieldset and add book model
        $fieldset = Fieldset::forge('book')->add_model('Model_Book');
        $fieldset->delete('category_id');
        // get form from fieldset
        $form = $fieldset->form();

        // add category to the form
        $categories = Model_Category::find('all');
        $op = array();
        foreach ($categories as $category) {
            $op[$category['id']] = $category['name'];
        }

        $form->add(
            'category', 'Book category',
            array('options' => $op, 'type' => 'radio', 'value' => 'true')
        );
        // add submit button to the form
        $form->add('Submit', '', array('type' => 'submit', 'value' => 'Submit'));


        // build the form  and set the current page as action
        $formHtml = $fieldset->build(Uri::create('book/addBook'));
        $view = View::forge('book/addBook');
        $view->set('form', $formHtml, false);

        if (Input::param() != array()) {
            try {
                $book = Model_Book::forge();
                $book->title = Input::param('title');
                $book->author = Input::param('author');
                $book->price = Input::param('price');
                $book->url = Input::param('url');
                $book->category_id= Input::param('category');

                Log::debug('selected category '.$book->category_id);
                Log::debug('selected category '.Input::param('category'));
                $book->save();
                Response::redirect('book');
            } catch (Orm\ValidationFailed $e) {
                $view->set('errors', $e->getMessage(), false);
            }
        }
        $this->template->title = "Book add page";
        $this->template->content = $view; 
    }



        public function action_editBook($id = false) { 
            if(!($book = Model_Book::find($id))) { 
               throw new HttpNotFoundException(); 
            }  
            
            // create a new fieldset and add book model 
            $fieldset = Fieldset::forge('book')->add_model('Model_Book'); 
            $fieldset->populate($book);  
            $fieldset->delete('category_id');
            
            // get form from fieldset 
            $form = $fieldset->form();  
            
            // add submit button to the form
            $form->add('Submit', '', array('type' => 'submit', 'value' => 'Submit'));  
            
            // build the form  and set the current page as action  
            $formHtml = $fieldset->build(Uri::create('book/editBook/' . $id));  
            $view = View::forge('book/addBook'); 
            $view->set('form', $formHtml, false);  
            
            if (Input::param() != array()) { 
               try { 
                  $book->title = Input::param('title'); 
                  $book->author = Input::param('author'); 
                  $book->price = Input::param('price'); 
                  $book->url = Input::param('url');
                  $book->save(); 
                  Response::redirect('book'); 
               } catch (Orm\ValidationFailed $e) { 
                  $view->set('errors', $e->getMessage(), false); 
               } 
            }  
            $this->template->title = "Book edit page"; 
            $this->template->content = $view; 
        }


         public function action_deleteBook($id = null) { 
            if ( ! ($book = Model_Book::find($id))) { 
               throw new HttpNotFoundException(); 
         
            } else { 
               $book->delete(); 
            } 
            Response::redirect('book'); 
         } 

         public function action_hireBook() { 
            $arrayBook= \Input::post('arrayBook', array());
            $books = array();
            if(count($arrayBook) > 0){
                $books = Model_Book::find('all', array(
                    'where' => array(
                        array('id', 'in',  $arrayBook)
                    ),
            ));
            }

           
            $cookie_name="arrayId";
            $cookie_value=implode(",", $arrayBook);
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
            
            $view = View::forge('book/hireBook');
            $view->set('books', $books);
            $this->template->title = "Checkout page"; 
            $this->template->content = $view; 
        }
        public function action_saveOrder(){
            $phone= \Input::post('phone');
            $address= \Input::post('address');
            $cookie_name="arrayId";
            $arrayIdStr = $_COOKIE[$cookie_name];
            $arrayId = explode(",",$arrayIdStr);
            $books = Model_Book::find('all', array(
                'where' => array(
                    array('id', 'in',  $arrayId)
                ),
            ));

            $uniqueform = uniqid();
            try {
                $form = Model_Form::forge();
                $form->id =  $uniqueform;
                $form->user_id = Auth::get_user_id()[1];
                $form->phone = Input::post('phone');
                $form->address = Input::post('address');
                $form->save();
            } catch (Orm\ValidationFailed $e) {
                $view->set('errors', $e->getMessage(), false);
            }
            try {
                foreach ($arrayId as $id) {
                    $detail = Model_Detail::forge();
                    $detail->form_id =  $uniqueform;
                    $detail->book_id = $id;
      
                    $detail->save();;
                }
        
              
            } catch (Orm\ValidationFailed $e) {
                $view->set('errors', $e->getMessage(), false);
            }
           

            $view = View::forge('book/orderSave');
            $view->set('phone', $phone);
            $view->set('address', $address);
            $view->set('books',  $books);
         
      
            $this->template->title = "Thank you for your order"; 
            $this->template->content = $view; 
        }
        public function action_dashboard() { 
            $forms = Model_Form::find('all', array(
                    'where' => array(
                        array('user_id', '=',  Auth::get_user_id()[1])
                    ),
            ));
    
            $view = View::forge('book/dashboard');
            $view->set('forms', $forms);
            $this->template->title = "Your dashboard"; 
            $this->template->content = $view; 
        }
        public function action_detail($id=false) { 
            $details = Model_Detail::find('all', array(
                'where' => array(
                    array('form_id', '=', $id)
                ),
            ));

            $arrayId = array();
            foreach ($details as $detail) {
               array_push($arrayId, $detail['book_id']);
            }
            $books = Model_Book::find('all', array(
                'where' => array(
                    array('id', 'in',  $arrayId)
                ),
            ));

        
            $view = View::forge('book/detail');

            $view->set('books', $books);
             $this->template->title = "Detail form"; 
             $this->template->content = $view; 
        }

}