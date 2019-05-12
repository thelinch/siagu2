<?php
namespace App\Modules\globalModules\interfaces\repository;

use Illuminate\Http\Request;


interface crudRepository
{
    public function all();
    public function find($id);
    public function delete($id);
    public function create(Request $data);
    public function edit($id,array $data);
    
}
