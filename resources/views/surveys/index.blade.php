@extends('layouts.app', ['pageSlug' => 'surveys'])

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title menu-title">{{ __('Surveys') }}</h2>
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title menu-title">{{ __('Vragen') }}</h2>
                </div>
                <div class="card-body">
                    @foreach($survey->questions as $question)
                        <li class="list-group text-light pb-3">{{$question->question}}</li>
                    @endforeach

                    <input type="text" class="form-control" value="Voeg een vraag toe..">
                    <button class="btn" type="submit">Toevoegen</button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

