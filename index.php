<?php
// TThis is my CONTROLLER

//Turn on Error reporting
ini_set('display_errors',TRUE);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');

// Create an instance of the Base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);


//Define a default route (home page of our application)
$f3->route('GET /', function (){
   // echo " My Food Page";
   $view = new Template();
  echo $view->render('views/home.html');

});

// Define an "Breakfast route"
$f3->route('GET /breakfast', function (){
    //echo "Breakfast";
    $view = new Template();
    echo $view->render('views/breakfast.html');
});

// Define and " Lunch route"
$f3->route('GET /lunch', function (){
    $views = new Template();
    echo $views->render('views/lunch.html');
});

$f3->route('GET /breakfast/@item', function ($f3, $params){
    var_dump($params);
    $menu = array ('eggs', 'rice' , 'cakes');
    $item = $params['item'];
    if(in_array($item, $menu)) {
        $view = new Templete();
        echo $view->render("views/breakfast_menu.html");
    }
    else{
        echo " sorry, we don't serve $item";
    }
   // $views = new Template();
   // echo $views->render('views/lunch.html');
});

// Run fat free
$f3->run();

