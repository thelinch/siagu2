<?php
/*
|--------------------------------------------------------------------------
| ModuleOne Module Routes
|--------------------------------------------------------------------------
|
| All the routes related to the ModuleOne module have to go in here. Make sure
| to change the namespace in case you decide to change the 
| namespace/structure of controllers.
|
 */
Route::group(['prefix' => 'gradostitulos', 'namespace' => 'App\Modules\GradosyTitulos\Controllers\restControllers'], function () {
    Route::get('/alumnos', ['as' => 'gradostitulos.index', 'uses' => 'alumnoController@alumnofiltradotipo']);
    Route::get('/nombreprograma/listaNombreprogramaEstudio', ['as' => 'gradostitulos.nombreProgramaBachiller', 'uses' => 'nombreProgramaestudioController@listaNombreprogramaEstudio']);
    Route::get('/modalidadestudio/listaModalidadEstudio', ['as' => 'gradostitulos.modalidadEstudioBachiller', 'uses' => 'modalidadEstudioController@listaModalidadEstudio']);
    Route::get('/obtenciongrado/listaObtencionGrado', ['as' => 'gradostitulos.obtencionGradoBachiller', 'uses' => 'obtencionGradoController@listaObtencionGrado']);
    
   
    Route::post('/denominaciones/denominacionesPorEspecialidad', ['as' => 'gradostitulos.denominacionesPorEspecialidad', 'uses' => 'denominacionGradoController@listaDenominacionPorEscuelaProfesional']);
    Route::post('/empresa/listaEmpresa', ['as' => 'gradostitulos.empresaBachiller', 'uses' => 'empresaController@listaEmpresa']); 
    Route::post('/alumnoGraduado/create', ['as' => 'gradostitulos.create', 'uses' => 'alumnoGraduadoTituladoController@create']);
    Route::post('/registroalumnograduado/create', ['as' => 'gradostitulos.create', 'uses' => 'registroAlumnoGraduadoTituladoController@create']);
    Route::post('/alumnoGraduado/{id}/editar', ['as' => 'gradostitulos.edit', 'uses' => 'alumnoGraduadoTituladoController@edit']);
});
