@extends('layouts.app', ['pageSlug' => 'survey.create'])

@section('content')
    <h1>survey show: {{$survey->name}}</h1>
    <ul>
        @foreach($survey->questions as $question)
            <li>{{$question->question}}</li>
        @endforeach
    </ul>
    <a href="/questions/create/?survey={{$survey->id}}">Add question</a>
@endsection
