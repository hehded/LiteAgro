    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\CompanyController;
    use App\Http\Controllers\FieldController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\TaskController;
    use App\Http\Controllers\UserController;

    /*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/company', 'App\Http\Controllers\CompanyController@all')->middleware(EnsureToken::class);
    Route::get('/company/{id}', 'App\Http\Controllers\CompanyController@id')->middleware(EnsureToken::class);
    Route::post('/company', 'App\Http\Controllers\CompanyController@create');
    Route::patch('/company/{id}', 'App\Http\Controllers\CompanyController@update');
    Route::delete('/company/{id}', 'App\Http\Controllers\CompanyController@delete');


    Route::get('/task', 'App\Http\Controllers\TaskController@all');
    Route::post('/task', 'App\Http\Controllers\TaskController@create');
    Route::patch('/task/{id}', 'App\Http\Controllers\TaskController@update');
    Route::delete('/task/{id}', 'App\Http\Controllers\TaskController@delete');
    Route::get('/task/{id}', 'App\Http\Controllers\TaskController@id');

    Route::get('/field', 'App\Http\Controllers\FieldController@all');
    Route::post('/field', 'App\Http\Controllers\FieldController@create');
    Route::patch('/field/{id}', 'App\Http\Controllers\FieldController@update');
    Route::delete('/field/{id}', 'App\Http\Controllers\FieldController@delete');
    Route::get('/field/{id}', 'App\Http\Controllers\FieldController@id');

    Route::get('/user', 'App\Http\Controllers\UserController@all');
    Route::post('/user', 'App\Http\Controllers\UserController@create');
    Route::patch('/user/{id}', 'App\Http\Controllers\UserController@update');
    Route::delete('/user/{id}', 'App\Http\Controllers\UserController@delete');
    Route::get('/user/{id}', 'App\Http\Controllers\UserController@id');





    Route::get('/dashboard/edit/{id}', [CompanyController::class, 'GetData'], function () {
        return view('dashboardedit');
    });

    Route::post('/dashboard/edit/dataUpdate{id}', [CompanyController::class, 'EditData'], function () {
        return view('dashboard');
    });

    Route::get('/dashboard/createpage', [CompanyController::class, 'GetDataCreate'], function () {
        return view('dashboardadd');
    });

    Route::post('/dashboard/dataCreate', [CompanyController::class, 'CreateData'], function () {
        return view('dashboard');
    });

    Route::get('dashboard/delete/{id}', [CompanyController::class, 'DeleteData'], function () {
        return view('dashboard');
    });

    Route::get('dashboard/map/{id}', [MapController::class, 'GetGeofield'], function () {
        return view('dashboardmap');
    });






    Route::get('/tasks', [TaskController::class, 'show'], function () {
        return view('tasksview');
    })->middleware(['auth', 'verified'])->name('tasksview');

    Route::get('/tasks/edit/{id}', [TaskController::class, 'GetTask'], function () {
        return view('tasksedit');
    })->middleware(['auth', 'verified'])->name('taskedit');

    Route::post('/tasks/edit/dataUpdate{id}', [TaskController::class, 'EditTask'], function () {
        return view('tasksview');
    })->middleware(['auth', 'verified'])->name('tasksview1');

    Route::get('/tasks/delete/{id}', [TaskController::class, 'DeleteTask'], function () {
        return view('dashboard');
    });

    Route::get('/tasks/create', [TaskController::class, 'GetTaskCreate'], function () {
        return view('tasksadd');
    })->middleware(['auth', 'verified'])->name('tasksadd');

    Route::post('/tasks/dataCreate', [TaskController::class, 'CreateTask'], function () {
        return view('tasksview');
    })->middleware(['auth', 'verified'])->name('tasksview');





    Route::get('/users', [UserController::class, 'show'], function () {
        return view('userview');
    })->middleware(['auth', 'verified'])->name('userview');

    Route::get('/users/edit/{id}', [UserController::class, 'GetUser'], function () {
        return view('useredit');
    })->middleware(['auth', 'verified'])->name('useredit');

    Route::get('/users/create', [UserController::class, 'GetUserCreate'], function () {
        return view('useradd');
    });


    Route::post('/users/dataCreate', [UserController::class, 'CreateUser'], function () {
        return view('userview');
    })->middleware(['auth', 'verified'])->name('userview');

    Route::post('/users/edit/dataUpdate{id}', [UserController::class, 'EditUser'], function () {
        return view('userview');
    })->middleware(['auth', 'verified'])->name('userview');

    Route::get('/users/delete/{id}', [UserController::class, 'DeleteUser'], function () {
        return view('userview');
    })->middleware(['auth', 'verified'])->name('userview');




    Route::get('/companies', [CompanyController::class, 'show'], function () {
        return view('compview');
    })->middleware(['auth', 'verified'])->name('compview');

    Route::get('/companies/create', function () {
        return view('compadd');
    });

    Route::post('/companies/dataCreate', [CompanyController::class, 'CreateCompany'], function () {
        return view('compview');
    })->middleware(['auth', 'verified'])->name('compview');

    Route::get('/companies/edit/{id}', [CompanyController::class, 'GetCompany'], function () {
        return view('compedit');
    })->middleware(['auth', 'verified'])->name('compedit');

    Route::get('/companies/delete/{id}', [CompanyController::class, 'DeleteCompany'], function () {
        return view('compview');
    })->middleware(['auth', 'verified'])->name('compview');


    Route::post('/companies/edit/dataUpdate{id}', [CompanyController::class, 'EditCompany'], function () {
        return view('compview');
    })->middleware(['auth', 'verified'])->name('compview');
    // Route::get('/companyid', [CompanyController::class, 'company']);

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', [CompanyController::class, 'company'],  function () {
        return view('dashboard', compact('geofield'));
    });

    Route::get('/dashboard1', [FieldController::class, 'show'], function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    require __DIR__ . '/auth.php';
