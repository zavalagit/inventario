<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcomes');
// });

// Route::get('home','GeneticaController@home');
// Route::get('inicio','GeneticaController@inicio');
 //Route::get('muestras/{buscar?}','GeneticaController@todas');
 //Route::get('kit/{buscar?}','GeneticaController@kit');

//Route::get('admin/permiso', 'Admin\PermisoController@index')->name('permiso');

//pagina de inicio
Route::get('/', 'InicioController@index')->name('inicio');

//seguridad
Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');

Route::post('ajax-sesion', 'AjaxController@setSession')->name('ajax')->middleware('auth');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'superadmin']], function () {
    Route::get('', 'AdminController@index');

    /*RUTAS DE USUARIOS*/
    Route::get('usuario', 'UsuarioController@index')->name('usuario');
    Route::get('usuario/crear', 'UsuarioController@crear')->name('crear_usuario');
    Route::post('usuario', 'UsuarioController@guardar')->name('guardar_usuario');
    Route::get('usuario/{id}/editar', 'UsuarioController@editar')->name('editar_usuario');
    Route::put('usuario/{id}', 'UsuarioController@actualizar')->name('actualizar_usuario');
    Route::delete('usuario/{id}', 'UsuarioController@eliminar')->name('eliminar_usuario');

    
    /*RUTAS DE PERMISOS*/
    Route::get('permiso', 'PermisoController@index')->name('permiso');
    Route::get('permiso/crear', 'PermisoController@crear')->name('crear_permiso');
    Route::post('permiso', 'PermisoController@guardar')->name('guardar_permiso');
    Route::get('permiso/{id}/editar', 'PermisoController@editar')->name('editar_permiso');
    Route::put('permiso/{id}', 'PermisoController@actualizar')->name('actualizar_permiso');
    Route::delete('permiso/{id}', 'PermisoController@eliminar')->name('eliminar_permiso');
    
    /*RUTAS DE PERMISOS_ROL*/
    Route::get('permiso-rol', 'PermisoRolController@index')->name('permiso_rol');
    Route::post('permiso-rol', 'PermisoRolController@guardar')->name('guardar_permiso_rol');

    
    /*RUTAS DE MENÚ*/
    //Route::get('menu', 'MenuController@index')->name('menu');
    //Route::get('menu/crear', 'MenuController@crear')->name('crear_menu');
    //Route::post('menu', 'MenuController@guardar')->name('guardar_menu');
    Route::get('menu', 'MenuController@index')->name('menu');
    Route::get('menu/crear', 'MenuController@crear')->name('crear_menu');
    Route::post('menu', 'MenuController@guardar')->name('guardar_menu');
    Route::get('menu/{id}/editar', 'MenuController@editar')->name('editar_menu');
    Route::put('menu/{id}', 'MenuController@actualizar')->name('actualizar_menu');
    Route::get('menu/{id}/eliminar', 'MenuController@eliminar')->name('eliminar_menu');
    Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar_orden');

    /*RUTAS ROL*/
    Route::get('rol', 'RolController@index')->name('rol');
    Route::get('rol/crear', 'RolController@crear')->name('crear_rol');
    Route::post('rol', 'RolController@guardar')->name('guardar_rol');
    Route::get('rol/{id}/editar', 'RolController@editar')->name('editar_rol');
    Route::put('rol/{id}', 'RolController@actualizar')->name('actualizar_rol');
    Route::delete('rol/{id}', 'RolController@eliminar')->name('eliminar_rol');

    /*RUTAS MENU_ROL*/
    Route::get('menu-rol', 'MenuRolController@index')->name('menu_rol');
    Route::post('menu-rol', 'MenuRolController@guardar')->name('guardar_menu_rol');
});

/*RUTAS DE GENETICA*/
    /*RUTAS DE MARCADORES*/
    Route::get('marcador', 'Genetica\MarcadorController@index')->name('marcador');
    Route::get('marcador/crear', 'Genetica\MarcadorController@crear')->name('crear_marcador');
    Route::post('marcador', 'Genetica\MarcadorController@guardar')->name('guardar_marcador');
    Route::get('marcador/{id}/editar', 'Genetica\MarcadorController@editar')->name('editar_marcador');
    Route::put('marcador/{id}', 'Genetica\MarcadorController@actualizar')->name('actualizar_marcador');
    Route::delete('marcador/{id}', 'Genetica\MarcadorController@eliminar')->name('eliminar_marcador');

    /*RUTAS DE KIT*/
    Route::get('kit', 'Genetica\KitController@index')->name('kit');
    Route::get('kit/crear', 'Genetica\KitController@crear')->name('crear_kit');
    Route::post('kit', 'Genetica\KitController@guardar')->name('guardar_kit');
    Route::get('kit/{id}/editar', 'Genetica\KitController@editar')->name('editar_kit');
    Route::put('kit/{id}', 'Genetica\KitController@actualizar')->name('actualizar_kit');
    Route::delete('kit/{id}', 'Genetica\KitController@eliminar')->name('eliminar_kit');

    /*RUTAS DE KIT_MARCADOR*/
    Route::get('kit-marcador/{kit}', 'Genetica\KitMarcadorController@index')->name('kit_marcador');
    Route::post('kit-marcador', 'Genetica\KitMarcadorController@guardar')->name('guardar_kit_marcador');
    Route::get('ordenar-marcador/{kit}', 'Genetica\KitMarcadorController@ordenar')->name('ordenar_marcadores');
    Route::post('guardar-orden-marcador', 'Genetica\KitMarcadorController@guardarOrden')->name('guardar_orden_marcadores');
    //buscar marcador
    Route::post('buscar-marcadores', 'Genetica\KitMarcadorController@BuscarMarcador')->name('buscar_marcador');

    /*RUTAS PARA LE SECUENCIAS*/
    Route::get('secuencia', 'Genetica\SecuenciValorController@index')->name('secuencia');
    Route::get('secuencia/crear', 'Genetica\SecuenciValorController@crear')->name('crear_secuencia');
    Route::post('secuencia', 'Genetica\SecuenciValorController@guardar')->name('guardar_secuencia');
    Route::post('consultar-lista-marcadores', 'Genetica\SecuenciValorController@ListaMarcadores')->name('consultar_lista_marcadores');
    Route::post('agregar-input', 'Genetica\SecuenciValorController@AgregarInput')->name('agregar_input');
    Route::get('secuencia/{id}/editar', 'Genetica\SecuenciValorController@editar')->name('editar_secuencia');
    Route::put('secuencia/{id}', 'Genetica\SecuenciValorController@actualizar')->name('actualizar_secuencia');
    /*vista de tabla en un modal*/
    Route::post('ver-secuencia', 'Genetica\SecuenciValorController@ver')->name('ver_secuencia');

    /*RUTAS PARA LA RELACION Ó BUSQUEDA*/
    Route::get('coincidencia/{id}', 'Genetica\CoincidenciaController@index')->name('coincidencia');
    Route::post('analizar', 'Genetica\CoincidenciaController@analizar')->name('analizar_secuencia');