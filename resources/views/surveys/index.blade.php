@extends('layouts.app', ['pageSlug' => 'surveys'])

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title menu-title">{{ __('Surveys') }}</h2>
                </div>

                <div class="card-body">
                    <form action="/survey" method="get">
                        <div class="form-group">
                            <select class="form-control" style="background-color:#27293d;" name="survey_id">
                                @foreach($surveys as $survey)
                                    <option value="{{$survey->id}}">{{$survey->name}}</option>
                                @endforeach
                            </select>
                            <button class="btn btn" type="submit">Selecteren</button>
                        </div>
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

