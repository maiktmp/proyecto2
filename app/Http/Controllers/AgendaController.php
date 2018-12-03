<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 02/12/2018
 * Time: 12:40 AM
 */

namespace App\Http\Controllers;


use App\Models\Agenda;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

    public function calendar()
    {
        return view('calendar.calendar');
    }

    public function calendarPost(Request $request)
    {
//        return dd($request->all());
        $agenda = new Agenda();
        $agenda->fill($request->all());
        $agenda->fk_id_usuario = \Auth::user()->id;
        $agenda->fk_id_estado = 1;

        if ($agenda->save()) {
            return redirect()->route('calendar_show');
        }
    }

    /**
     * @var $usuario Usuario;
     */
    public function getEvents()
    {
        $usuario = \Auth::user();

        $agendas = Agenda::whereFkIdUsuario($usuario->id)->orWhere('fk_id_estado',2)->get();
//        return dd($agendas->toSql());

        $eventos = [];

        foreach ($agendas as $agenda) {
            $carbon = Carbon::make($agenda->fecha);
            $date = explode(" ", $agenda->fecha);
            $start = $date[0] . 'T' . $carbon->format('H') . ':00:00.008';
            $end = $date[0] . 'T' . $carbon->addHour()->format('H') . ':00:00.008';
            $title = $agenda->proyecto;
            $color = "";
            switch ($agenda->fk_id_estado) {
                case 1:
                    $color = "#f59563";
                    break;
                case 2:
                    $color = "#6dbb47";
                    break;
                case 3:
                    $color = "#b1002c";
                    break;
                case 4:
                    $color = "#f59563";
                    break;
                case 5:
                    $color = "#b1002c";
                    break;
            }
            $evento = [
                'title' => $title,
                'start' => $start,
                'end' => $end,
                'color' => $color
            ];
            $eventos[] = $evento;
        }
        return response()->json($eventos);
    }

}