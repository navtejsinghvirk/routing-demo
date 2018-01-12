<?php
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
//run fat free
$f3->run();
?>