@extends('layouts.app')
@section('content')
    <div class="flex items-center justify-between mt-5 max-w-2xl mx-auto">
            @foreach ($big_questions as $big_question)
                <a class="underline text-lg text-gray-600 hover:text-gray-900" href="quiz/{{ $loop->iteration }}">{{ $big_question->name }}の画面へ</a>
            @endforeach
    </div>
@endsection
