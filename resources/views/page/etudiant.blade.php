@extends('index')
@section('contenu')

    <div class="col-md-3">
        <div>
            <div class="panel  panel-info">
                <div class="panel-heading ">
                    Ajouter un Etudiant
                </div>
                <div class="panel-body">
                    <form action="{{ url('/') }}" method="post">
                        @method('post')
                        {{ csrf_field() }}
                        @if(session()->has('success'))
                            <div class="alert alert-success">{{ session()->get('success') }}</div>
                        @endif
                        <div class="form-group">
                            <label>Nom Etudiant</label>
                            <input class="form-control" name="nom">
                        </div>
                        <div class="form-group">
                            <label>Semestre</label>
                            <select name="semestre" id="" class="form-control">
                                <option value="">Faites votre choix</option>
                                @foreach($semestres as $s)
                                <option value="{{$s->id}}">{{$s->semestre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Matiere</label>
                            <select name="matiere" id="" class="form-control">
                                <option value="">Faites votre choix</option>
                            @foreach($matieres as $m)
                                <option value="{{$m->id}}">{{$m->matiere}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Note</label>
                            <input type="text" class="form-control" name="note">
                        </div>
                        <div class="form-group">
                            <label>Examen</label>
                            <input type="text" class="form-control" name="exam">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Enregistre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading" style="display:flex;align-items: center;justify-content: space-between;">
                Liste des Etudiants
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                    <th>Id</th>
                    <th>Nom Etudiant</th>
                    <th>Matiere</th>
                    <th>Note 1</th>
                    <th>Examen</th>
                    <th>Semestre</th>

                    </thead>
                    <tbody>
                    @foreach($etudiants as $e)
                    </tr>
                    <td>{{$e->id}}</td>
                    <td>{{$e->nom}}</td>
                    <td>{{$e->matiere}}</td>
                    <td>{{$e->note}}</td>
                    <td>{{$e->examen}}</td>
                    <td>{{$e->semestre}}</td>


                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div>
            <div class="panel  panel-info">
                <div class="panel-heading">
                    Detail de la Etudiant
                    &emsp;&emsp;&emsp;&emsp;&emsp;
                </div>
                <div class="panel-body jumbotron">
                    <div class="btn btn-info ">Meilleur Etudiant => {{$semestres1max[0]->nom}} note => {{$semestres1max[0]->note}}</div>
                    <br><br>
                    <div class="btn btn-danger ">Moyenne general classe => time is over</div>
                    <br><br>

                </div>
            </div>
        </div>
    </div>


@endsection
