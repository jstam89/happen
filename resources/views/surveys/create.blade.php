@extends('layouts.app', ['pageSlug' => 'survey.create'])

@section('content')
    <h1> survey create </h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form" method="POST" action="{{route('survey.store')}}">
                    @csrf
                    @method('post')
                    <input type="text" name="name"/>
                    <select name="type">
                        <option value="togo">TO-GO</option>
                        <option value="overwerk">OVERWERK</option>
                    </select>
                    <input type="checkbox" name="isActive"/>
                    <button class="btn btn-primary" type="submit">Verzenden</button>
                </form>
            </div>
        </div>
    </div>
@endsection

