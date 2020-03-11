@extends('layouts.app', ['pageSlug' => 'surveys'])

@section('content')
    <div class="row">
        <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title menu-title">{{ __('Maken') }}</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('survey.store')}}">
                            @csrf
                            @method('post')

                            <div class="form-group">
                                <input class="form-control" type="text" name="name"/>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="type">
                                    <option class="form-control" value="togo">TO-GO</option>
                                    <option value="overwerk">OVERWERK</option>
                                </select>
                            </div>
                            <label>Actief?
                                <div class="form-group">
                                    <input type="checkbox" name="isActive"/>
                                </div>
                            </label>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Verzenden</button>
                            </div>
                        </form>
                    </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title menu-title">{{ __('Selecteren') }}</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{route('survey.show')}}" method="get">
                            @csrf
                            <div class="form-group">
                                <select class="form-control" style="background-color:#27293d;" name="survey_id">
                                    @foreach($surveys as $survey)
                                        <option value="{{$survey->id}}">{{$survey->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Selecteren</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

