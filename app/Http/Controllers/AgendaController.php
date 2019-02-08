<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 02/12/2018
 * Time: 12:40 AM
 */

namespace App\Http\Controllers;


use App\Mail\Titulación;
use App\Models\Agenda;
use App\Models\Estado;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;

class AgendaController extends Controller
{

    public function calendar()
    {
        return view('calendar.calendar');
    }

    public function calendarPost(Request $request)
    {
        $fecha = str_replace('T', ' ', $request->input('fecha'));
        $fecha = Carbon::createFromFormat('Y-m-d H:i:s', $fecha);
        $request->merge(["fecha" => $fecha]);
        $agenda = new Agenda();
        $agenda->fill($request->all());
        $agenda->fk_id_usuario = \Auth::user()->id;
        $agenda->fk_id_estado = 1;
        if ($agenda->save()) {
            return redirect()->route('calendar_show');
        }
    }

    public function getEvents()
    {
        $usuario = \Auth::user();
        $agendas = Agenda::whereFkIdUsuario($usuario->id)->orWhere('fk_id_estado', 2)->get();
//        return dd($agendas);

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
                    $color = "#ffa500";
                    break;
                case 5:
                    $color = "#b1002c";
                    break;
            }
            $id = $agenda->id;
            $evento = [
                'id' => $id,
                'title' => $title . " - " . $agenda->usuario->nombre,
                'start' => $start,
                'end' => $end,
                'color' => $color,
                'userId' => $agenda->fk_id_usuario,
                'status' => $agenda->fk_id_estado
            ];
            $eventos[] = $evento;
        }
        return response()->json($eventos);
    }

    public function updateStatus(Request $request, $agendaId)
    {
        $agenda = Agenda::find($agendaId);
        $agenda->fk_id_estado = $request->input('estado');
    }

    public function getAllEvents()
    {
        $agendas = Agenda::all();
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
                    $color = "#ffa500";
                    break;
                case 5:
                    $color = "#b1002c";
                    break;
            }
            $id = $agenda->id;
            $evento = [
                'id' => $id,
                'title' => $title . " - " . $agenda->usuario->nombre,
                'start' => $start,
                'end' => $end,
                'color' => $color,
                'status' => $agenda->fk_id_estado,
                'titulo' => $agenda->proyecto,
                'alumno' => $agenda->alumno,
                'no_control' => $agenda->no_control,
                'asesor' => $agenda->usuario->getFullNameAttribute()
            ];
            $eventos[] = $evento;
        }
        return response()->json($eventos);
    }

    public static function mapStatusAdmin()
    {
        return Estado::whereIn('id', [2, 3])
            ->get()
            ->pluck('nombre', 'id');
    }

    public static function mapStatusProfe()
    {
        return Estado::whereIn('id', [4])
            ->get()
            ->pluck('nombre', 'id');
    }

    public static function mapStatusAdminCancel()
    {
        return Estado::whereIn('id', [5])
            ->get()
            ->pluck('nombre', 'id');
    }

    public function updateStatusAdmin(Request $request, $agendaId)
    {
//        return dd($request->all());
        $agenda = Agenda::find($agendaId);
        $agenda->fk_id_estado = $request->input('fk_id_estado');
        if ($agenda->save()) {
            if ($agenda->fk_id_estado != 4) {
                $this->sendMail($agenda);
            }
            return redirect()->route('calendar_show');
        }
    }

    public function getPendingEvents()
    {
        $events = Agenda::whereIn('fk_id_estado', [1, 4])->get();
        foreach ($events as $event) {
            $event->fecha = Carbon::make($event->fecha)->format('Y-m-d');
            $event->usuario;
            $color = 0;
            switch ($event->fk_id_estado) {
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
                    $color = "#ffa500";
                    break;
                case 5:
                    $color = "#b1002c";
                    break;
            }
            $event->color = $color;
        }
        return $events;
    }

    /**
     * @param $agenda Agenda
     */
    public function sendMail($agenda)
    {
//        $agenda = Agenda::find(1);
//        return view('mail.mail', ['agenda' => $agenda]);
//        return dd($agenda->alumno_email);
        Mail::to($agenda->usuario->correo)
            ->send(new Titulación($agenda));
    }
}
