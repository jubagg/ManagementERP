<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$titulo ?? '' ?? ''}}</title>

       <!-- Required meta tags -->
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <!-- Bootstrap CSS -->
        <link href="{{asset('tabulator-master/dist/css/tabulator.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="{{asset('css/table.css')}}">
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
        <link href="{{ asset('js/handsontable/dist/handsontable.full.min.css')}}" rel="stylesheet" media="screen">
        <script src="{{ asset('js/handsontable/dist/handsontable.full.min.js')}}" ></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

   </head>

   <body>
<div class="container-fluid">
         <nav class="navbar navbar-expand  sticky-top  navbar-light bg-light row">
            @if (\Auth::check())
           <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="nav navbar-nav">
                   @foreach ($menus as $key => $item)
                       @if ($item['parent'] != 0)
                           @break
                       @endif
                       @include('partials.menu-item', ['item' => $item])
                   @endforeach
               </ul>
               @endif

                <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                </ul>
           </div>
   </nav>
        <div class="row py-2" style= >
            @section('header')
            @show
        </div>
            <div class="container-fluid">
                <div class="row">
                    @if(!empty($menu))
                    <div class= " col-2 d-none d-inline-block">
                        @section('lateral')
                        @show
                    </div>
                    <div class="py-2 col-10" id="contenido">
                        @section('content')
                        @show
                    </div>
                    @else
                    <div class="py-2 col-12" id="contenido">
                        @section('content')
                        @show
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
       <!-- Optional JavaScript -->
       <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="https://kit.fontawesome.com/3211b460a4.js" crossorigin="anonymous" async="async" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="{{ asset('js/localidad.js') }}" async="async" type="text/javascript"></script>
        <script src="{{ asset('js/listcli.js') }}" async="async" type="text/javascript"></script>
        <script src="{{ asset('js/bancos.js') }}" async="async" type="text/javascript"></script>
        <script src="{{ asset('js/cuentasbancarias.js') }}" async="async" type="text/javascript"></script>
        <script src="{{ asset('js/articulos.js')}}" async="async" type="text/javascript"></script>
        @if($slug  ==  'movimientos_stockf')
            <script src="{{ asset('js/movstkn.js')}}" async="async" type="text/javascript"></script>
        @endif
        <script type="text/javascript" src="{{asset('tabulator-master/dist/js/tabulator.min.js')}}"></script>


     </body>
   </html>

   <script>
    function controlempresa() {
        $("#tablasempresa tr").mouseenter(function() {
            $('#tablasempresa tr').css("background-color", "");
            $(this).css("background-color", '#FFF3E0');
            $("#tablasempresa tr").mouseleave(function() {
                $('#tablasempresa tr').css("background-color", "");
            });
        });
    }

    $('#tablasempresa ').ready(function() {
        controlempresa();
    });

    $("#tablasempresa tr").click(function() {
        var arrai = [];
        largo = $("td").length;
        largo = largo + 1;
        console.log(largo);
        for(var i=1; i < largo ; i++){
            arrai.push($(this).find("td:nth-child("+i+")").text());
        }

        $('#empid').val(arrai[0]);
        $('#empnom').val(arrai[1]);
        $('#empcuit').val(arrai[2]);
        $('#empdir').val(arrai[3]);
        $('#emptel').val(arrai[4]);
        $('#empmail').val(arrai[5]);
      });

      function controlsucursales() {
        $("#tablassucursal tr").mouseenter(function() {
            $('#tablassucursal tr').css("background-color", "");
            $(this).css("background-color", '#FFF3E0');
            $("#tablassucursal tr").mouseleave(function() {
                $('#tablassucursal tr').css("background-color", "");
            });
        });
    }

    $('#tablassucursal ').ready(function() {
        controlsucursales();
    });

    $("#tablassucursal tr").click(function() {
        var arrai = [];
        largo = $("td").length;
        largo = largo + 1;
        console.log(largo);
        for(var i=1; i < largo ; i++){
            arrai.push($(this).find("td:nth-child("+i+")").text());
        }

        $('#sucid').val(arrai[0]);
        $('#sucnom').val(arrai[1]);
        $('#sucabr').val(arrai[2]);

      });


</script>
