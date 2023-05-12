<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\movil;
use App\Models\caidasmovil;
use App\Models\rechazosmovil;
use App\Models\legalizacionmovil;
use App\Models\Planesyofertas;
use App\Models\Register;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class LineaNuevaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movil = movil::all();
        $User = User::all();
        return view('LineaNueva.index')->with('movil', $movil, 'User', $User);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Carbon::setLocale('co');
        $date = Carbon::now()->format('Y-m-d');
        $texto = trim($request->get('texto'));

        $registros = DB::table('registers')->select('Cod_registro', 'Campaña', 'Lin_contac1' ,'Lin_contac2', 'Documento_Bd', 'Cuenta_Bd','Nombre_Bd', 'Rango_Recargas' ,'Servi_Contratados' ,'Correo_Bd')
            ->where('Cod_registro', '=', $texto)
            ->paginate(6);

      	return view('LineaNueva.create', compact('texto', 'registros', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movil = new movil();
        
        $movil->Nombre_Asesor = $request->get('Nombre_Asesor');
        $movil->Cedula_Asesor = $request->get('Cedula_Asesor');   
        $movil->Campaña = $request->get('Campaña');
        $movil->Origen_Cliente = $request->get('Origen_Cliente');
        $movil->Producto = $request->get('Producto');
        $movil->Estado_Venta = $request->get('Estado_Venta');
        $movil->FVenta = $request->get('FVenta');
        $movil->NumeroA_Gestionar = $request->get('NumeroA_Gestionar');
        $movil->Region = $request->get('Region');
        $movil->Nombre_Titular = $request->get('Nombre_Titular');
        $movil->Tipo_Documento = $request->get('Tipo_Documento');
        $movil->Numero_Documento = $request->get('Numero_Documento');
        $movil->Correo = $request->get('Correo');
        $movil->FNacimiento = $request->get('FNacimiento');
        $movil->FExpedicion = $request->get('FExpedicion');
        $movil->Lugar_Expedicion = $request->get('Lugar_Expedicion');
        $movil->CelularC_Adicional = $request->get('CelularC_Adicional');
        $movil->departamento = $request->get('departamento');
        $movil->id_ciudad = $request->get('id_ciudad');
        $movil->Direccion_Resid = $request->get('Direccion_Resid');
        $movil->Barrio_Resid = $request->get('Barrio_Resid');
        $movil->Plan_Ofertado = $request->get('Plan_Ofertado');
        $movil->TM_CODE = $request->get('TM_CODE');
        $movil->CFMCon_Iva = $request->get('CFMCon_Iva');
        $movil->CFMSin_Iva = $request->get('CFMSin_Iva');
        $movil->Sim_Adquirida = $request->get('Sim_Adquirida');
        $movil->NumeroSim_Adquirida = $request->get('NumeroSim_Adquirida');
        $movil->ICCIDSim_Adquirida = $request->get('ICCIDSim_Adquirida');
        $movil->Direccion_Entrega = $request->get('Direccion_Entrega');
        $movil->Departamento_Entrega = $request->get('Departamento_Entrega');
        $movil->Ciudad_Entrega = $request->get('Ciudad_Entrega');
        $movil->Barrio_Entrega = $request->get('Barrio_Entrega');
        $movil->Franja = $request->get('Franja');
        $movil->ClienteTo_Claro = $request->get('ClienteTo_Claro');
        $movil->CedulaT_Claro = $request->get('CedulaT_Claro');
        $movil->Afinidad = $request->get('Afinidad');
        $movil->Observaciones_Asesor = $request->get('Observaciones_Asesor');
        $movil->Nombre_Supervisor = $request->get('Nombre_Supervisor');
        $movil->Nombre_Base = $request->get('Nombre_Base');
        $movil->AdjuntarId_Llamada = $request->get('AdjuntarId_Llamada');
        $movil->Validacion_Identidad = $request->get('Validacion_Identidad');
        $movil->Validacion_Identidad2 = $request->get('Validacion_Identidad2');
        $movil->Consulta_Credito = $request->get('Consulta_Credito');
        $movil->Otros_Soportes = $request->get('Otros_Soportes');  
        

          if($request->hasFile('AdjuntarId_Llamada')){
            $movil['AdjuntarId_Llamada']=$request->file('AdjuntarId_Llamada')->store('uploads','public');
          }
          if($request->hasFile('Validacion_Identidad')){
            $movil['Validacion_Identidad']=$request->file('Validacion_Identidad')->store('uploads','public');
          }
          if($request->hasFile('Validacion_Identidad2')){
            $movil['Validacion_Identidad2']=$request->file('Validacion_Identidad2')->store('uploads','public');
          }
          if($request->hasFile('Consulta_Credito')){
            $movil['Consulta_Credito']=$request->file('Consulta_Credito')->store('uploads','public');
          }
          if($request->hasFile('Otros_Soportes')){
            $movil['Otros_Soportes']=$request->file('Otros_Soportes')->store('uploads','public');
          }
        
        $movil->save();

        

        return redirect()->route('Inicio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('LineaNueva.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view('LineaNueva.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
