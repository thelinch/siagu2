<?php namespace App\Modules\BienestarUniversitario\Controllers\restControllers;

use App\Http\Controllers\Controller;

/**
 * IndexController
 *
 * Controller to house all the functionality directly
 * related to the ModuleOne.
 */
class IndexController extends Controller
{
  public function __construct()
  { }
  public function index()
  {
    // ModuleOne is the module name and dummy is the blade file
    // you can specify ModuleOne::someFolder.file if your file exists
    // inside a folder. Also the blade will use the same syntax i.e.
    // ModuleName::viewName
    header("Access-Control-Allow-Origin: *");
    return response()->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET, PUT, POST, DELETE')->json($this->serviceAlumno->all());
  }
  public function modelTest()
  {
    // Added just to demonstrate that models work
  }
  public function findById($id)
  {
  }
  public function destroy($id)
  {
  }
}
