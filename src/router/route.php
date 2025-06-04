<?


use controller\Adm;

use utils\Route;

Route::Get('/', 'home');
Route::Get('/adm', 'adm');
Route::Get('/auth', 'auth');
Route::Get('/adduser', 'adduser');
Route::Get('/upuser', 'upuser');

Route::Post('/auth_form', Adm::class, 'auth');
Route::Post('/adduser_form', Adm::class, 'addUser');
Route::Post('/upuser_form', Adm::class, 'upUser');
Route::Post('/upImg', Adm::class, 'upImg');
Route::Post('/out', Adm::class, 'logout');


Route::Contens();
