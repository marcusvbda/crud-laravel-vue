@extends('templates.default')
@section('content')
    <header-nav></header-nav>
    <main>
        <div class="pagination">
            {{ $list->links() }}
        </div>
        <card-list :list='@json($list)'></card-list>
    </main>
    <footer>Desenvolvido por Vinicius Bassalobre</footer>
@endsection
