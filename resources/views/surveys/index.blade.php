@extends('layouts.app', ['pageSlug' => 'surveys'])

@section('content')
    <div class="row">
        <div class="col-md-4">
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title menu-title">{{ __('Questions') }}</h2>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
@endsection

