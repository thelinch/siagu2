<?php
use Illuminate\Http\Request;









Route::group(['prefix' => 'global', "middleware" => "cors", 'namespace' => 'App\Modules\globalModules\controllers'], function () {
    Route::get("/alumnosPregrado", ["as" => "global.tipo.all", "uses" => "alumnoController@alumnosPregrado"]);
    Route::get("/escuelaProfesional", ["as" => "global.tipo.all", "uses" => "escuelaProfesionalController@escuelaProfesional"]);

    Route::post("/alumno/bienestarUniversitario", ["as" => "bienestar.global.bienestarUniversitario", "uses" => "alumnoController@buscarAlumnoConRequisitosYServiciosPorId"]);
    Route::post("/alumno/servicios", ["as" => "bienestar.global.listaServiciosPorAlumno", "uses" => "alumnoController@listaServiciosPorAlumno"]);
    Route::post("/alumno/requisitos", ["as" => "bienestar.global.requisitos", "uses" => "alumnoController@listarRequisitosPorAlumnoYSemestreActual"]);

    Route::post("/fileUpload", ["as" => "bienestar.global.fileUpload", "uses" => "fileController@fileUpload"]);
    Route::post("/download/file", function (Request  $request) {
        $archivo = $request->json()->all();
        $url = public_path() . '/storage/requisitos/' . $archivo["archivo"];

        if (\Storage::disk("local")->exists("requisitos/" . $archivo["archivo"])) {
            $headers = ["Content-Type" => mime_content_type($url)];
            return response()->download($url, $archivo["archivo"], $headers);
        }
        abort(404);
    });

    Route::post("/fileUpload/Requisito", ["as" => "bienestar.global.fileUpload.Requisito", "uses" => "fileController@fileUploadRequisito"]);
});
