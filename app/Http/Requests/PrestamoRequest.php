<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Model\User;
use Illuminate\Support\Facades\DB;

class PrestamoRequest extends FormRequest
{
    private $_mensaje;
    private $_reglasx;

    public function __construct(){
        $this->_mensaje = [
            'libro_id.required'         => 'Seleccione un libro',
            'user_id.required'          => 'Seleccione un usuario',
            'fecha_prestamo.required'   => 'Digite la fecha en la que se realizó el préstamo',
            'fecha_entrega.required'    => 'Digite la fecha en la que se debe devolver',
            'estado_id.required'        => 'Seleccione un estado'
        ];
        $this->_reglasx = [
            'libro_id'          => ['required'],
            'user_id'           => ['required'],
            'fecha_prestamo'    => ['required'],
            'fecha_entrega'     => ['required'],
            'estado_id'         => ['required']
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    public function messages(){
        return $this->_mensaje;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        $this->validar();
        return  $this->_reglasx;
    }

    public function validar(){
        $dataxxxx = $this->toArray();

        
        $totalLibros = $this->canLibro($dataxxxx['user_id'])->total;
        if ($totalLibros >= 3) {
            
            $this->_reglasx['numerolibros'] = 'required';
            $this->_mensaje['numerolibros.required'] = 'El usuario ya cuenta con tres libros prestados';
        }
        
        $estdoLibro = $this->estLibro($dataxxxx['libro_id'])->estado_id;
        
        if($estdoLibro != 1) {
            
            //dd($estdoLibro);
            
            $this->_reglasx['esLibro'] = 'required';
            $this->_mensaje['esLibro.required'] = 'El libro no se encuentra disponible';
        }
    }

    private function canLibro($id){
        $query = DB::table('prestamos')
            ->select(array(DB::raw('COUNT(prestamos.user_id) as total')))
            ->join('users', 'prestamos.user_id', '=', 'users.id', 'left', true)
            ->where('prestamos.user_id', '=', $id)
            ->first();

        return $query;
    }

    private function estLibro($id){
        $query = DB::table('libros')
            ->select('libros.estado_id')
            ->where('libros.id', '=', $id)
            ->first();

        return $query;
    }
}
