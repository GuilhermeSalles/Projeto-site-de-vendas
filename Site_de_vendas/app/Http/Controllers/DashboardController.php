<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;

use DB;

class DashboardController extends Controller
{
    public function index(){

        $usuarios = User::all()->count();

        //Grafico 01 - Usuarios
        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total'),
        ])
        ->groupBy('ano')
        ->orderBy('ano', 'asc')
        ->get();

        //Preparar arrays

        foreach($usersData as $user) {
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        //Formatar graficos chartJS
        $userLabel = "'Comparativo de cadastros de usuários'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);


        //grafico 01 - Categorias
        $catData = Categoria::all();

        //Preparar Array
        foreach ($catData as $cat) {
            $catNome[] = "'".$cat->nome."'";
            $catTotal[] = Produto::where('id_categoria', $cat->id)->count();
        }

        //Formatar para chartJS
        $catLabel = implode(',',$catNome);
        $catTotal = implode(',',$catTotal);

        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}
