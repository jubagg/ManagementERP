  <?php
  manejo de archivos para reportes
    $img= Storage::disk('img')->path('');
    var_dump($img);
    $input = Storage::disk('reports')->path('Blank_A4.jrxml');

    $output = Storage::disk('reports')->path('');

    $jasper = new PHPJasper;
    $jasper->compile($input)->execute();

    $input = Storage::disk('reports')->path('Blank_A4.jasper');
    $logo = Storage::disk('img')->path('logo.png');
    //$output = $jasper->listParameters($input)->execute();

    //$output = $jasper->listParameters($input)->execute();

    $options = [
        'format' => ['pdf'],
        'params' =>['param' => $logo, 'img' => $img],
    ];


/*         dd($jasper->process(
            $input,
            $output,
            $options
        )->output()); */

        $jasper->process(
            $input,
            $output,
            $options
        )->execute();


        //$pathToFile = base_path() . '/vendor/geekcom/phpjasper/examples/Blank_A4.pdf';
        //$path = Storage::putFile('reports', $pathToFile);

        //$content = Storage::disk('reports')->url('Blank_A4.pdf');
        //$dato = Storage::disk('reports')->download('Blank_A4.pdf');



///////////////////////////////////////////////////////////////////////
 //$resultado = \Funciones::pruebasAFIP();

 //var_dump($resultado);

 $img= Storage::disk('img')->path('');
    var_dump($img);
    $input = Storage::disk('reports')->path('Blank_A4.jrxml');

    $output = Storage::disk('process')->path('cli');

    $jasper = new PHPJasper;
    $jasper->compile($input)->execute();

    $input = Storage::disk('reports')->path('Blank_A4.jasper');
    $logo = Storage::disk('img')->path('logo.png');
    //$output = $jasper->listParameters($input)->execute();

    //$output = $jasper->listParameters($input)->execute();
    $valores = App\Articulos::getAll();
    //var_dump($valores);
    $valores = json_encode($valores);

    //$clientes = json_encode($clientes);
    //$clientes = substr($clientes, 1, -1);
    //$clientes  = str_replace('"', '', $clientes);

    //var_dump($clientes);
    $options = [
        'format' => ['pdf'],
        'params' =>['clientes' => 'aaa'],
        'db_connection' => [
            'driver' => 'mysql', //mysql, ....
            'username' => 'root',
            'password' => 'root01',
            'host' => 'localhost',
            'database' => 'managementerp',
            'port' => '3306'],
    ];

/*
         dd($jasper->process(
            $input,
            $output,
            $options
        )->output()); */

         $jasper->process(
            $input,
            $output,
            $options
        )->execute();


        $pathToFile = Storage::disk('reports')->path('Blank_A4.pdf');
        return Response::make(file_get_contents($pathToFile),200,[
            'Content-Type' => 'application/pdf',
        ]);
        //$path = Storage::putFile('reports', $pathToFile);

        //$content = Storage::disk('reports')->url('Blank_A4.pdf');
        //$dato = Storage::disk('reports')->download('Blank_A4.pdf');



        jaspersoft
        ($P{siscod}.isEmpty()==true ? "" : "'" + $P{siscod} +"'" )
