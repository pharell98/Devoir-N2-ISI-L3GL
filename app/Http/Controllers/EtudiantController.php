<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Matiere;
use App\Models\Semestre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtudiantController extends Controller
{
    //
    public function index  (){

        $semestres = Semestre::all();
        $matieres = Matiere::all();
        $etudiants= Etudiant::all();
        $etudiant = DB::table('etudiants')
            ->rightJoin('matieres','etudiants.matiere_id','=',"matieres.id")
            ->rightJoin('semestres','etudiants.semestre_id','=',"semestres.id")
            ->select('etudiants.*','matieres.matiere','semestres.semestre')
            ->get();
        $semestres1max = DB::table('etudiants')->where('note', \DB::raw("(select max(`note`) from etudiants)"))->get();
        return view('page/etudiant',['semestres'=>$semestres,'matieres'=>$matieres,'etudiants'=>$etudiant,'semestres1max'=>$semestres1max]);
    }
    public function store(Request $request)
    {
        Etudiant::create([
            'nom' => $request->nom,
            'note' => $request->note,
            'examen' => $request->exam,
            'matiere_id' => $request->matiere,
            'semestre_id' => $request->semestre,

        ]);
        return redirect()->back()->with('success', 'Etudiant ajouter avec success');
    }

}
