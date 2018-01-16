<?php
session_start();
//error_reporting(E_ALL);
//ini_set("display_errors",1);

//require the autolaod file
require_once ('vendor/autoload.php');

//create an instance of the base class
$f3 = Base::instance();

//Set debug level
$f3->set('DEBUG',3);

//define a default route
$f3->route('GET /',
    function() {
       echo'<h1>Routing Demo</h1>';
      }
);
//define a Page1 route
$f3->route('GET /page1',
    function() {
        echo'<h1>This is page1</h1>';
    }
);

//define a Page2 route
$f3->route('GET /page2',
    function() {
        echo'<h1>Page2</h1>';
    }
);
//define a page-sub route
$f3->route('GET /page1/subpage-a',
    function() {
        echo'<h1>Subpage-a</h1>';
    }
);
//define a template route
$f3->route('GET /jewelry/rings/toe-rings',
    function() {
      echo'<h1>Toe Rings</h1>';
      //  $template = new Template();
     // echo $template->render('views/toe-rings.html');
    }
);

$f3->route('GET /hello/@name',function  ($f3,$params) {
      //  $name = $params['name'];
       // echo "<h1>Hello,$name</h1>";
        $f3-> set('name',$params['name']);
        $template = new Template();
        echo $template->render('views/hello.html');

    });

$f3->route('GET /hi/@first/@last',function  ($f3,$params) {
    //  $name = $params['name'];
    // echo "<h1>Hello,$name</h1>";
    $f3-> set('first',$params['first']);
    $f3-> set('last',$params['last']);
    $f3-> set('message','hi');

    $_SESSION['first'] = $f3-> get('first');
    $_SESSION['last'] = $f3-> get('last');
    $template = new Template();
    echo $template->render('views/hi.html');

});
$f3-> route('GET /hi-again',function($f3,$params){
    echo 'Hi again, '.$_SESSIONcd['first'];
});
$f3->route('GET /language/@lang', function($f3,$params){
    switch ($params['lang']){
        case 'swahili';
        echo 'Jumbo'; break;
        case 'spanish';
            echo 'Hola'; break;
        case 'Privet';
            echo 'farsi'; break;
            case'french';
            $f3->reroute('/');
        default:
            $f3->error(404);

    }
});

//run fat free
$f3->run();
?>