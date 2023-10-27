@extends('templates.default')
@section('content')
    <header-nav></header-nav>
    <main>
        <div class="pagination">
            {{ $list->links() }}
        </div>
        <news-list :list='@json($list)'></news-list>
    </main>
    <footer>Desenvolvido por Vinicius Bassalobre</footer>
@endsection
