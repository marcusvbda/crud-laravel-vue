@extends('templates.default')
@section('content')
    <home-fragments :list='@json($list)'>
        {{ $list->links() }}
    </home-fragments>
@endsection
