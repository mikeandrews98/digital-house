<?php

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

// paginas
Route::get('/', 'PaginasController@index');
Route::get('/pagina/produto/{id}', 'PaginasController@produto');
Route::get('/pagina/marca', 'PaginasController@marca');
Route::get('/pagina/categoria', 'PaginasController@categoria');
Route::get('/pagina/esporte', 'PaginasController@esporte');
Route::get('/pagina/procurar', 'PaginasController@search');
Route::get('/pagina/sobre', 'PaginasController@sobre');
Route::get('/pagina/checkout', 'ProdutosController@showCheckout');
Route::post('/pagina/checkout', 'ProdutosController@postCheckout');

Route::get('/pagina/carrinho', 'ProdutosController@showCarrinho');
//adicionar ao carrinho
Route::get('/add/carrinho/{id}', 'ProdutosController@carrinho');

//orderBy
Route::get('/pagina/marca/ordenar/{id}', 'PaginasController@orderMarca');
Route::get('/pagina/categoria/ordenar/{id}', 'PaginasController@orderCategoria');
Route::get('/pagina/esporte/ordenar/{id}', 'PaginasController@orderEsporte');

//newsletter
Route::get('/pagina/newsletter', 'PaginasController@newsletter');

//User
Route::get('/user/update/{id}', 'userController@showform');
Route::post('/user/update/{id}', 'userController@updateUser');
Auth::routes();
Route::get('/home', 'HomeController@index');


// ADMIN FUNCTIONS
Route::prefix('admin')->group(function() {
  //Login
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  //Adm Index
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  //Alterar imagens
  Route::get('/alterar/banner', 'AdminController@bannerUpdate');
  Route::get('/alterar/promo', 'AdminController@promoAdd');
  //Produtos
  Route::get('/produtos', 'AdmProdutoController@paginaProdutos')->name('admin.produtos');
  Route::get('/produtos/adicionar', 'AdmProdutoController@produtoForm');
  Route::post('/produtos/adicionar', 'AdmProdutoController@produtoAdd');
  Route::get('/produto/delete/{id}', 'AdmProdutoController@produtoDelete');
  Route::get('/produto/edit/{id}', 'AdmProdutoController@produtoEditForm');
  Route::put('/produto/edit/{id}', 'AdmProdutoController@produtoEdit');
  //orderBy produto
  Route::get('/produto/orderName', 'AdmProdutoController@orderName');
  Route::get('/produto/orderNameDesc', 'AdmProdutoController@orderNameDesc');
  Route::get('/produto/orderId', 'AdmProdutoController@orderId');
  Route::get('/produto/orderIdDesc', 'AdmProdutoController@orderIdDesc');

  //Marcas
  Route::get('/marca', 'AdmProdutoController@marcaFormList');
  Route::post('/marca/adicionar', 'AdmProdutoController@marcaAdd');
  Route::get('/marca/delete/{id}', 'AdmProdutoController@marcaDelete');
  //Categorias
  Route::get('/categoria', 'AdmProdutoController@categoriaFormList');
  Route::post('/categoria/adicionar', 'AdmProdutoController@categoriaAdd');
  Route::get('/categoria/delete/{id}', 'AdmProdutoController@categoriaDelete');
  //Esporte
  Route::get('/esporte', 'AdmProdutoController@esporteFormList');
  Route::post('/esporte/adicionar', 'AdmProdutoController@esporteAdd');
  Route::get('/esporte/delete/{id}', 'AdmProdutoController@esporteDelete');
  //tamanho
  Route::get('/tamanho', 'AdmProdutoController@tamanhoFormList');
  Route::post('/tamanho/adicionar', 'AdmProdutoController@tamanhoAdd');
  Route::get('/tamanho/delete/{id}', 'AdmProdutoController@tamanhoDelete');
  //Clientes
  Route::get('/clientes', 'AdminController@paginaClientes')->name('admin.clientes');
  Route::get('/clientes/newsletter', 'AdminController@paginaNews')->name('admin.clientes');
  Route::get('/cliente/adicionar', 'AdminController@paginaCadastoUrs')->name('admin.clientes');
});
