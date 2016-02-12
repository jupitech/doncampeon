@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Don Campeón Sports',
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')

        <p>Today will be a great day!</p>

    @include('beautymail::templates.sunny.contentEnd')


@stop