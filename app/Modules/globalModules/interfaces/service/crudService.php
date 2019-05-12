<?php
namespace App\Modules\globalModules\interfaces\service;
use Illuminate\Http\Request;


interface crudService
{
    public function all();
    public function find($id);
    public function delete($id);
    public function create(Request $data);
    public function edit($id, array $data);
}
