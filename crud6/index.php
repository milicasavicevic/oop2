
<?PHP


   
spl_autoload_register(function ($class)
{
    include $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\', '/', $class) . '.php';

});
$projectController = new Controllers\ProjectController();
$clientController = new Controllers\ClientController();
$userController = new Controllers\UserController();
//$pageController = new controllers\PageController();
$taskController = new Controllers\TaskController();


//index
Route::add('/',function(){
  include('views/home.php');
});

//home
Route::add('/home',function(){
});
//users
Route::add('/users',function(){
  include ('views/view_user.php');
});
//clients
Route::add('/clients',function(){
  include ('views/view_client.php');
});
//projects
Route::add('/projects',function(){
  include ('views/view_project.php');
});
//tasks
Route::add('/tasks',function(){
  include ('views/view_task.php');
});
//add project
Route::add('/addproject',function(){
  $projectController->addProject();
},['get','post']);
//edit project
Route::add('/editproject',function(){
  $projectController->editProject();
},['get','post']);
//delete project
Route::add('/deleteproject',function(){

  $projectController->deleteProject();

});
//add user
Route::add('/adduser',function(){
  include $_SERVER['DOCUMENT_ROOT'] . '/Controllers/UserController.php';

  $userController = new userController();
  $userController->addUser();
},['get','post']);
//edit user
Route::add('/edituser',function(){
 include $_SERVER['DOCUMENT_ROOT'] . '/controllers/userController.php';

  $userController = new userController();
  $userController->updateUser();
},['get','post']);
//delete user
Route::add('/deleteuser',function(){
 include $_SERVER['DOCUMENT_ROOT'] . '/controllers/userController.php';

  $userController = new userController();
  $userController->deleteUser();;

});
//add client
Route::add('/addclient',function(){
  include $_SERVER['DOCUMENT_ROOT'] . '/controllers/ClientController.php';

  $clientController = new ClientController();
  $clientController->addClient();
},['get','post']);
//edit client
Route::add('/editclient',function(){
 include $_SERVER['DOCUMENT_ROOT'] . '/controllers/clientController.php';

  $clientController = new clientController();
  $clientController->editClient();

},['get','post']);
//delete client
Route::add('/deleteclient',function(){
 include $_SERVER['DOCUMENT_ROOT'] . '/controllers/clientController.php';

  $clientController = new clientController();
  $clientController->deleteClient();

});
//add task
Route::add('/addtask',function(){
   include $_SERVER['DOCUMENT_ROOT'] . '/controllers/TaskController.php';

  $taskController = new taskController();
  $taskController->createTask();
},['get','post']);
//edit task
Route::add('/edittask',function(){
 include $_SERVER['DOCUMENT_ROOT'] . '/controllers/TaskController.php';

  $taskController = new taskController();
  $taskController->editTask();
},['get','post']);
//delete task
Route::add('/deletetask',function(){
include $_SERVER['DOCUMENT_ROOT'] . '/controllers/TaskController.php';

  $taskController = new taskController();
  $taskController->deleteTask();

});

Route::pathNotFound(function($path){
  echo 'Error 404 :-(<br/>';
  echo 'The requested path "'.$path.'" was not found!';
});

// Add a 405 method not allowed route
Route::methodNotAllowed(function($path, $method){
  echo 'Error 405 :-(<br/>';
  echo 'The requested path "'.$path.'" exists. But the request method "'.$method.'" is not allowed on this path!';
});


Route::run('/');


?>
