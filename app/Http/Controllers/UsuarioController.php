<?php
namespace App\Http\Controllers;


use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('usuario.index');
    }

    public function indexContents(Request $request)
    {
        $page = $request->get('page', 0);
        $size = $request->get('size', 30);
        $skip = $page * $size;

        $query = Usuario::whereFkIdRol(2)
            ->with(['rol']);

        $count = $query->count();
        $profesores = $query
            ->limit($size)
            ->skip($skip)
            ->get();

        return response()->json([
            'page' => $page,
            'size' => $size,
            'count' => $count,
            'data' => $profesores
        ]);
    }

    public function agregar()
    {
        return view('usuario.agregar');
    }

    public function agregarPost(Request $req)
    {
        $profesor = new Usuario();
        $profesor->fill($req->all());
        $profesor->password = bcrypt($profesor->password);
        $profesor->fk_id_rol = 2;

        if ($profesor->save()) {
            return redirect()->route('profesores_index');
        }
        else{
            return back()
                ->withErrors(['general', 'No fue posible agregar el usuario en este momento']);
        }
    }
}