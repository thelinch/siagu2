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
Route::group(['prefix' => 'bienestar', 'namespace' => 'App\Modules\BienestarUniversitario\Controllers\restControllers'], function () {
    Route::get('/', ['as' => 'bienestar.index', 'uses' => 'IndexController@index']);
    Route::get('/{id}', ['as' => 'bienestar.findById', 'uses' => 'IndexController@findById']);
    Route::get("/{id}/destroy", ["as" => "bienestar.destroy", "uses" => "IndexController@destroy"]);

    //RUTAS DE REQUISITO
    Route::get("/requisito/all", ["as" => "bienestar.requisito.all", "uses" => "requisitoController@all"]);
    Route::post("/requisito/create", ["as" => "bienestar.requisito.create", "uses" => "requisitoController@store"]);
    Route::post("/requisito/{id}/edit", ["as" => "bienestar.requisito.all", "uses" => "requisitoController@update"]);
    Route::get("/requisito/{id}/delete", ["as" => "bienestar.requisito.delete", "uses" => "requisitoController@delete"]);
    Route::post("/requisito/updateTipo", ["as" => "bienestar.requisito.updateTipo", "uses" => "requisitoController@updateTipo"]);
    Route::post("/requisito/updateServicio", ["as" => "bienestar.requisito.updateServicio", "uses" => "requisitoController@updateServicio"]);
    Route::post("/requisito/archivos", ["as" => "bienestar.requisito.archivos", "uses" => "requisitoController@getArchivosPorRequisitoId"]);
    Route::post("/requisito/updateActualizacion", ["as" => "bienestar.requisito.cambiarActualizacion", "uses" => "requisitoController@cambiarActualizacion"]);
    Route::post("/requisito/listarArchivos", ["as" => "bienestar.requisito.listarArchivos", "uses" => "requisitoController@listarArchivosPorServicio"]);

    //FIN DE RUTAS DE REQUISITO


    Route::get("/tipoRequisito/all", ["as" => "bienestar.tipo.all", "uses" => "requisitoController@todos_tiposRequisito"]);
    //RUTAS DE SERVICIO
    Route::get("/servicio/all", ["as" => "bienestar.servicio.all", "uses" => "servicioController@all"]);
    Route::get("/servicio/all/servicioActivados", ["as" => "bienestar.servicio.serviciosActivados", "uses" => "servicioController@serviciosActivados"]);
    Route::post("/servicio/alumno/requisitos", ["as" => "bienestar.servicio.requisitos", "uses" => "servicioController@requisitosPorArrayServicio"]);
    Route::post("/servicio/alumno/servicios", ["as" => "bienestar.alumno.servicios", "uses" => "servicioController@listaServiciosPorAlumno"]);

    Route::post("/servicio/create", ["as" => "bienestar.servicio.create", "uses" => "servicioController@store"]);
    Route::post("/servicio/{id}/edit", ["as" => "bienestar.servicio.edit", "uses" => "servicioController@edit"]);
    Route::get("/servicio/{id}/delete", ["as" => "bienestar.servicio.delete", "uses" => "servicioController@delete"]);
    Route::post("/servicio/activarServicio", ["as" => "bienestar.servicio.activarServicio", "uses" => "servicioController@activarServicio"]);
    Route::post("/servicio/requisitos", ["as" => "bienestar.servicio.requisitos", "uses" => "servicioController@requisitosPorIdServicio"]);
    Route::post("/servicio/alumnosPorIdServicio", ["as" => "bienestar.servicio.alumnosPorIdServicio", "uses" => "servicioController@alumnosPorIdServicio"]);

    //FIN DE RUTAS DE SERVICIO

    //Rutas para AlumnoRequisito
    Route::post("/alumnoRequisito/listaPorAlumno", ["as" => "bienestar.alumnoRequisitoController.listaPorAlumno", "uses" => "alumnoRequisitoController@listaAlumnoRequisitoPorAlumno"]);
    Route::post("/alumnoRequisito/listaArchivo", ["as" => "bienestar.alumnoRequisitoController.listaArchivo", "uses" => "alumnoRequisitoController@listaArchvivoPorAlumnoRequisito"]);
    Route::post("/alumnoRequisito/historialDeEstadosPorArchivo", ["as" => "bienestar.alumnoRequisitoController.historialDeEstadosPorArchivo", "uses" => "alumnoRequisitoController@historialDeEstadosPorArchivo"]);

    //Fin de Rutas por AlumnoRequisito
    //ServicioSolicitado
    Route::post("/servicioSolicitado/listaServicioSolicitadoPorSemestreActual", ["as" => "bienestar.servicioSolicitado.listaServicioSolicitadoPorSemestreActual", "uses" => "servicioSolicitadoController@listaServicioSolicitadoPorSemestreActual"]);
    Route::post("/servicioSolicitado/registroServicioSolicitadoPorAlumno", ["as" => "bienestar.servicioSolicitado.registroServicioSolicitadoPorAlumno", "uses" => "servicioSolicitadoController@registroServicioSolicitadoPorAlumno"]);
    Route::post("/servicioSolicitado/servicioSolicitadoPorAlumnoComedorYInternadoYSemestreActual", ["as" => "bienestar.servicioSolicitado.servicioSolicitadoPorAlumnoComedorYInternadoYSemestreActual", "uses" => "servicioSolicitadoController@servicioSolicitadoPorAlumnoComedorYInternadoYSemestreActual"]);

    //Ampliaciones
    Route::post("/ampliacion/create", ["as" => "bienestar.ampliacion.create", "uses" => "ampliacionController@create"]);
    Route::post("/ampliacion/listaAmpliacionesPorServicio", ["as" => "bienestar.ampliacion.listaAmpliacionesPorServicio", "uses" => "ampliacionController@listaAmpliacionesPorServicio"]);
    Route::post("/ampliacion/pruebaRequest", ["as" => "bienestar.ampliacion.pruebaRequest", "uses" => "ampliacionController@pruebaRequest"]);

    //servicioSolicitadoRequisito
    Route::post("/servicioSolicitadoRequisito/create", ["as" => "bienestar.servicioSolicitadoRequisito.create", "uses" => "servicioSolicitadoRequisitoController@create"]);
    Route::post("/obuSolicitudRequisitoArchivo/create", ["as" => "bienestar.obuSolicitudRequisitoArchivosController.create", "uses" => "obuSolicitudRequisitoArchivosController@create"]);
    Route::post("/requisitoArchivo/create", ["as" => "bienestar.requisitoArchivoController.create", "uses" => "requisitoArchivoController@create"]);


});
