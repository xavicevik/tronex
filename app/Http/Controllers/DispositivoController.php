<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\Dispositivo;
use App\Models\Historialcaja;
use App\Models\Pago;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use PhpMqtt\Client\Facades\MQTT;
use PhpMqtt\Client\Logger;
use PhpMqtt\Client\MqttClient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\Jetstream;

class DispositivoController extends Controller
{
    const canPorPagina = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filtros = json_decode($request->filtros);

        $buscar = $request->buscar;
        if ($request->has('sortBy') && $request->sortBy <> ''){
            $sortBy = $request->sortBy;
        } else {
            $sortBy = 'dispositivos.id';
        }

        if ($request->has('sortOrder') && $request->sortOrder <> ''){
            $sortOrder = $request->sortOrder;
        } else {
            $sortOrder = 'desc';
        }

        if (is_null($filtros)){
            $dispositivos = Dispositivo::orderBy($sortBy, $sortOrder)
                ->paginate(self::canPorPagina);
        } else {
            $dispositivos = Dispositivo::orderBy($sortBy, $sortOrder);

            if(!is_null($filtros->fechainicio) && $filtros->fechainicio <> '') {
                $dispositivos = $dispositivos->where('dispositivos.created_at', '>=', $filtros->fechainicio);
            }
            if(!is_null($filtros->fechafin) && $filtros->fechafin <> '') {
                $dispositivos = $dispositivos->where('dispositivos.created_at', '<=', $filtros->fechafin);
            }
            /*
            if(!is_null($filtros->cliente) && $filtros->cliente <> '') {
                $dispositivos = $dispositivos->join('users as t1', 'dispositivos.idcliente', '=', 't1.id')
                    ->where('t1.nombre', 'like', '%'.$filtros->cliente.'%')
                    ->orWhere('t1.apellido', 'like', '%'.$filtros->cliente.'%');
            }
            if(!is_null($filtros->vendedor) && $filtros->vendedor <> '') {
                $dispositivos = $dispositivos->join('users as t2', 'dispositivos.idvendedor', '=', 't2.id')
                    ->where('t2.nombre', 'like', '%'.$filtros->vendedor.'%')
                    ->orWhere('t2.apellido', 'like', '%'.$filtros->vendedor.'%');
            }

            if(!is_null($filtros->venta) && $filtros->venta <> '') {
                $dispositivos = $dispositivos->where('dispositivos.id', 'like', '%'.$filtros->venta.'%');
            }
            if(!is_null($filtros->puntoventa) && $filtros->puntoventa <> '') {
                $dispositivos = $dispositivos->join('puntos_dispositivos', 'dispositivos.idpuntoventa', '=', 'puntos_dispositivos.id')
                    ->where('puntos_dispositivos.nombre', 'like', '%'.$filtros->puntoventa.'%');
            }
            */
            if(!is_null($filtros->nombre)) {
                $dispositivos = $dispositivos->where('nombre', 'like', '%'.$filtros->nombre.'%');
            }

            $dispositivos = $dispositivos->select('dispositivos.*')->paginate(self::canPorPagina);
        }

        if ($request->has('ispage') && $request->ispage){
            return ['data' => $dispositivos];
        } else {
            return Inertia::render('Dispositivos/Index', ['data' => $dispositivos]);
        }
    }

    public function show(Dispositivo $dispositivo)
    {
        $reported = null;
        try {
            $mensaje = '{ }';

            $mqtt = MQTT::connection();

            $mqtt->registerLoopEventHandler(function (MqttClient $mqtt, float $elapsedTime) {
                if ($elapsedTime >= 5) {
                    $mqtt->interrupt();
                }
            });
            $mqtt->subscribe('$aws/things/'.$dispositivo->thingname.'/shadow/get/accepted', function (string $topic, string $message) use ($mqtt, &$reported) {
                $state = json_decode($message, true);
                $reported = $state['state']['reported'];
                $mqtt->interrupt();
            });

            $mqtt->publish('$aws/things/raspberry/shadow/get', $mensaje);
            $mqtt->loop(true);
            $mqtt->disconnect();

        } catch (MqttClientException $e) {
            dd('error');
        }

        if (!is_null($reported)) {
            foreach ($reported['ports'] as $clave=>$valor) {
                $dispositivo->$clave = $valor;
            }
            $dispositivo->estado = $reported['estado']['disponibilidad'];
        }

        $dispositivo->save();

        return ['data' => $dispositivo];
    }

    public function update(Request $request, Dispositivo $dispositivo)
    {
        $dispositivo->update($request->all());
        $mensaje['state']['desired']['estado']['disponibilidad'] = $dispositivo->disponibilidad?1:0;
        $mensaje['state']['desired']['estado']['estado'] = $dispositivo->estado?1:0;
        $mensaje['state']['desired']['ports']['GPIO02'] = $dispositivo->GPIO02?1:0;
        $mensaje['state']['desired']['ports']['GPIO03'] = $dispositivo->GPIO03?1:0;
        $mensaje['state']['desired']['ports']['GPIO04'] = $dispositivo->GPIO04?1:0;
        $mensaje['state']['desired']['ports']['GPIO05'] = $dispositivo->GPIO05?1:0;
        $mensaje['state']['desired']['ports']['GPIO06'] = $dispositivo->GPIO06?1:0;
        $mensaje['state']['desired']['ports']['GPIO07'] = $dispositivo->GPIO07?1:0;
        $mensaje['state']['desired']['ports']['GPIO08'] = $dispositivo->GPIO08?1:0;
        $mensaje['state']['desired']['ports']['GPIO09'] = $dispositivo->GPIO09?1:0;
        $mensaje['state']['desired']['ports']['GPIO10'] = $dispositivo->GPIO10?1:0;
        $mensaje['state']['desired']['ports']['GPIO11'] = $dispositivo->GPIO11?1:0;
        $mensaje['state']['desired']['ports']['GPIO12'] = $dispositivo->GPIO12?1:0;
        $mensaje['state']['desired']['ports']['GPIO13'] = $dispositivo->GPIO13?1:0;
        $mensaje['state']['desired']['ports']['GPIO14'] = $dispositivo->GPIO14?1:0;
        $mensaje['state']['desired']['ports']['GPIO15'] = $dispositivo->GPIO15?1:0;
        $mensaje['state']['desired']['ports']['GPIO16'] = $dispositivo->GPIO16?1:0;
        $mensaje['state']['desired']['ports']['GPIO17'] = $dispositivo->GPIO17?1:0;
        $mensaje['state']['desired']['ports']['GPIO18'] = $dispositivo->GPIO18?1:0;
        $mensaje['state']['desired']['ports']['GPIO19'] = $dispositivo->GPIO19?1:0;
        $mensaje['state']['desired']['ports']['GPIO20'] = $dispositivo->GPIO20?1:0;
        $mensaje['state']['desired']['ports']['GPIO21'] = $dispositivo->GPIO21?1:0;
        $mensaje['state']['desired']['ports']['GPIO22'] = $dispositivo->GPIO22?1:0;
        $mensaje['state']['desired']['ports']['GPIO23'] = $dispositivo->GPIO23?1:0;
        $mensaje['state']['desired']['ports']['GPIO24'] = $dispositivo->GPIO24?1:0;
        $mensaje['state']['desired']['ports']['GPIO25'] = $dispositivo->GPIO25?1:0;
        $mensaje['state']['desired']['ports']['GPIO26'] = $dispositivo->GPIO26?1:0;
        $mensaje['state']['desired']['ports']['GPIO27'] = $dispositivo->GPIO27?1:0;

        $disired = json_encode($mensaje);

        try {
            $mensaje = '{ }';

            $mqtt = MQTT::connection();

            $mqtt->publish('$aws/things/raspberry/shadow/update', $disired);
            $mqtt->disconnect();

        } catch (MqttClientException $e) {
            dd('error');
        }

        return ['data' => $dispositivo];
    }

    public function getState(Request $request)
    {
        $reported = null;
        try {
            $mensaje = '{ }';

            $mqtt = MQTT::connection();

            $mqtt->registerLoopEventHandler(function (MqttClient $mqtt, float $elapsedTime) {
                if ($elapsedTime >= 10) {
                    $mqtt->interrupt();
                }
            });
            $mqtt->subscribe('$aws/things/'.$request->thingname.'/shadow/get/accepted', function (string $topic, string $message) use ($mqtt, $request, &$reported) {
                $state = json_decode($message, true);
                $reported = $state['state']['reported'];
                $mqtt->interrupt();
            });

            $mqtt->publish('$aws/things/raspberry/shadow/get', $mensaje);
            $mqtt->loop(true);
            $mqtt->disconnect();

        } catch (MqttClientException $e) {
            dd('error');
        }

        return ['data' => $reported];
    }

    public function getStatePorts(Dispositivo $dispositivo)
    {
        $reported = null;
        try {
            $mqtt = MQTT::connection();

            $mqtt->registerLoopEventHandler(function (MqttClient $mqtt, float $elapsedTime) {
                if ($elapsedTime >= 5) {
                    $mqtt->interrupt();
                }
            });

            $mqtt->subscribe('$aws/things/'.$dispositivo->thingname.'/shadow/name/ports/update/delta', function (string $topic, string $message) use ($mqtt, &$reported) {
                $state = json_decode($message, true);
                $reported = $state['state']['ports'];
                $mqtt->interrupt();
            });

            $mqtt->loop(true);
            $mqtt->disconnect();

        } catch (MqttClientException $e) {
            dd('error');
        }

        if (!is_null($reported)) {
            foreach ($reported['ports'] as $clave=>$valor) {
                $dispositivo->$clave = $valor;
            }
            if (!is_null($reported['estado']['disponibilidad'])) {
                $dispositivo->estado = $reported['estado']['disponibilidad'];
            }
        }

        $dispositivo->save();

        return ['data' => $dispositivo];
    }

}
