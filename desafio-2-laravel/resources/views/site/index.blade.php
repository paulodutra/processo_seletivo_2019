@extends('templates.template')

@section('content')

<section class="conteudo-internas">
  <div class="centraliza">
    <div class="conteudo-esquerda">
      <div class="lista"><!--Lista de Noticias-->

        <form action="" class="form-group row">
          <div class="col-12 busca">
            <input type="text"  class="form-control col-8" placeholder="Digite sua busca">
            <button class="btn btn-primary col-2"> Buscar </button>
          </div>
          
        </form>
        @foreach($news->noticias as $new)
         <article class="box-noticia"><!--Notícia-->
              <a href="{{$new->url}}" target="__blank" >
                  <figure>
                      <img src="{{$new->imagem}}" alt="{{$new->titulo}}" >
                  </figure>
                  <div class="texto-lista-noticias">
                      <span class="data-lista-noticia">{{$new->data_formatada}}</span>
                      <h1>{{$new->titulo}}</h1>
                      <p>{!! str_limit(strip_tags(htmlspecialchars_decode($new->texto)), $limit = 300, $end = '...') !!}</p>
                  </div>
              </a>
          </article><!--Fim Notícia-->
          <hr>
        @endforeach
        <ul class="pagination">
            <li class="active page-item"><a class="page-link"href="?page=1">1</a></li>
            @for ($i = 2; $i <= $pages; $i++)
              <li class="page-item"><a class="page-link"href="?page={{$i}}">{{$i}}</a></li>
            @endfor                             
            <li class="page-item">
              <a class="page-link" href="" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
        </ul>
    
        <!--Fim Paginação-->
            
        </div><!--Fim Lista de Noticias-->

    </div> <!-- final conteudo-esquerda -->


</div> <!-- final centraliza -->

</section>



@endsection