<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    /**
     * Devuelve un listado JSON con los alumnos
     * inscriptos a un determinado curso
     * 
     * @param int $course_id
     * @return Response JSON
     */
    public function index($course_id = '')
    {
        if(!empty($course_id)){
            $sql = "SELECT u.id, u.name, u.lastname, u.email 
                    FROM subscriptions AS s, users AS u
                    WHERE s.course_id = $course_id
                    AND s.user_id = u.id";

            $data = DB::select(DB::raw($sql));

            if(count($data) !== 0){
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'data' => $data
                ];
            } else {
                $data = [
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'No se encotraron alumnos para este curso'
                ];
            }
        } else {
            $data = [
                'code' => 422,
                'status' => 'error',
                'message' => 'La consulta está mal formulada'
            ];
        }

        return response()->json($data, $data['code']);
    }
}
