@extends('templates.default')
@section('content')
    <header>
        <nav>
            <section class="logo">Logo</section>
            <section class="menu">
                <a href="#">Cadastrar notícias</a>
                <a href="#">Exibir notificas</a>
            </section>
            <section class="filter">
                <div class="input-filter">
                    <input />
                </div>
            </section>
        </nav>
    </header>
    <main>
        <section class="card-list">
            @for ($i = 0; $i < 50; $i++)
                <article class="card">
                    <b>lorem ipsum</b>
                    <span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut facilisis dui. Aenean ut ultricies
                        nunc. Donec eu semper velit. Curabitur quis gravida nulla. Praesent nec sapien risus. Aliquam
                        porttitor
                        efficitur nisl vitae fringilla. Sed iaculis, dui id bibendum vestibulum, quam ante maximus nulla,
                        vel
                        maximus risus odio sit amet elit. Quisque massa enim, rhoncus vel fringilla eu, rhoncus vel tellus.
                    </span>
                    <div class="card-footer">
                        <button>Acessar</button>
                    </div>
                </article>
            @endfor
        </section>
    </main>
    <footer>FOOTER</footer>
@endsection
