<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AdminHomeController extends Controller
{
    public function create(){
        
        

        if(Auth::user()->userfrom == 'MDRRMO'){
            $totalFire = Report::where('emergency_type','Fire')->where('status' , '1' )->count();
            $totalMedic = Report::where('emergency_type','Medical')->where('status' , '1' )->count();
            $totalAccident = Report::where('emergency_type','Accident')->where('status' , '1' )->count();
            $totalCrime = Report::where('emergency_type','Crime')->where('status' , '1' )->count();
            $totalAcceptedReport = Report::where('status','1')->count();
            $totalActiveReport = Report::where('status','0')->count();

        }elseif(Auth::user()->userfrom != 'MDRRMO'){
            $totalFire = Report::where('emergency_type','Fire')->where('status' , '1' )->where('userfrom', auth()->user()->userfrom)->count();
            $totalMedic = Report::where('emergency_type','Medical')->where('status' , '1' )->where('userfrom', auth()->user()->userfrom)->count();
            $totalAccident = Report::where('emergency_type','Accident')->where('status' , '1' )->where('userfrom', auth()->user()->userfrom)->count();
            $totalCrime = Report::where('emergency_type','Crime')->where('status' , '1' )->where('userfrom', auth()->user()->userfrom)->count();
            $totalAcceptedReport = Report::where('status','1')->where('userfrom', auth()->user()->userfrom)->count();
            $totalActiveReport = Report::where('status','0')->where('userfrom', auth()->user()->userfrom)->count();
        }

        //by department/barangays
        $bfp = Report::where('userfrom','BFP')->where('status' , '1' )->count();
        $mdrrmo = Report::where('userfrom','MDRRMO')->where('status' , '1' )->count();
        $pnp = Report::where('userfrom','PNP')->where('status' , '1' )->count();
        $bagbaguin = Report::where('userfrom','BAGBAGUIN')->where('status' , '1' )->count();
        $balasing = Report::where('userfrom','BALASING')->where('status' , '1' )->count();
        $buenavista = Report::where('userfrom','BUENAVISTA')->where('status' , '1' )->count();
        $bulac = Report::where('userfrom','BULAC')->where('status' , '1' )->count();
        $camangyanan = Report::where('userfrom','CAMANGYANAN')->where('status' , '1' )->count();
        $catmon = Report::where('userfrom','CATMON')->where('status' , '1' )->count();
        $caypombo = Report::where('userfrom','CAY POMBO')->where('status' , '1' )->count();
        $caysio = Report::where('userfrom','CAYSIO')->where('status' , '1' )->count();
        $guyong = Report::where('userfrom','GUYONG')->where('status' , '1' )->count();
        $lalakhan = Report::where('userfrom','LALAKHAN')->where('status' , '1' )->count();
        $magasawangsapa = Report::where('userfrom','MAG ASAWANG SAPA')->where('status' , '1' )->count();
        $mahabangparang = Report::where('userfrom','MAHABANG PARANG')->where('status' , '1' )->count();
        $manggahan = Report::where('userfrom','MANGGAHAN')->where('status' , '1' )->count();
        $parada = Report::where('userfrom','PARADA')->where('status' , '1' )->count();
        $poblacion = Report::where('userfrom','POBLACION')->where('status' , '1' )->count();
        $pulongbuhangin = Report::where('userfrom','PULONG BUHANGIN')->where('status' , '1' )->count();
        $sangabriel = Report::where('userfrom','SAN GABRIEL')->where('status' , '1' )->count();
        $sanjosepatag = Report::where('userfrom','SAN JOSE PATAG')->where('status' , '1' )->count();
        $sanvicente = Report::where('userfrom','SAN VICENTE')->where('status' , '1' )->count();
        $santaclara = Report::where('userfrom','SANTA CLARA')->where('status' , '1' )->count();
        $santacruz = Report::where('userfrom','SANTA CRUZ')->where('status' , '1' )->count();
        $silangan = Report::where('userfrom','SILANGAN')->where('status' , '1' )->count();
        $santotomas = Report::where('userfrom','STO. TOMAS')->where('status' , '1' )->count();
        $tumana = Report::where('userfrom','TUMANA')->where('status' , '1' )->count();
        
        return view('admin.dashboard' , compact( 
            'totalFire',
            'totalMedic', 
            'totalAccident', 
            'totalCrime' , 
            'totalAcceptedReport' , 
            'totalActiveReport',
            'bfp',
            'mdrrmo',
            'pnp',
            'bagbaguin',
            'balasing',
            'buenavista',
            'bulac',
            'camangyanan',
            'catmon',
            'caypombo',
            'caysio',
            'guyong',
            'lalakhan',
            'magasawangsapa',
            'mahabangparang',
            'manggahan',
            'parada',
            'poblacion',
            'pulongbuhangin',
            'sangabriel',
            'sanjosepatag',
            'sanvicente',
            'santaclara',
            'santacruz',
            'silangan',
            'santotomas',
            'tumana'
        ));
    }

  
}
