<?php

namespace App\Modules\GradosyTitulos\Repository\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\globalModules\Models\EscuelaProfesionale;

class denominacionGradoTitulo extends Model
{
    protected $table = "denominaciones_grados_titulos";
    public function escuelaProfesional()
    {
        return $this->belongsTo(EscuelaProfesionale::class);
    }
    public function gradosTitulo()
    {
        return $this->belongsTo(gradoTitulo::class);
    }
    public function mensionMaestria()
    {
        return $this->belongsTo(mensionMaestria::class);
    }
}
