<?php

// Modelo de objetos que se corresponde con la tabla de MySQL
class Tvseries extends \Illuminate\Database\Eloquent\Model
{
	public $timestamps = false;
}

// Añadir el resto del código aquí
$app->get('/tvseries', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la lista de películas

    // Obtenemos la lista de películas de la base de datos y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $pelis = json_decode(\TvSeries::all());

    // Mostramos la vista
    return $this->view->render($res, 'tvserieslist_template.php', [
        'items' => $pelis
    ]);
})->setName('series');


/*  Obtención de un videojuego en concreto  */
$app->get('/tvseries/{name}', function ($req, $res, $args) {

    // Creamos un objeto collection + json con el videojuego pasada como parámetro

    // Obtenemos el videojuego de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \TvSeries::find($args['name']);
    $peli = json_decode($p);

    // Mostramos la vista
    return $this->view->render($res, 'tvseries_template.php', [
        'item' => $peli
    ]);

});

/*  Eliminacion de un videojuego en concreto  */
$app->delete('/tvseries/{name}', function ($req, $res, $args) {

    // Obtenemos el videojuego de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \TvSeries::find($args['name']);
    $p->delete();

});

/*Crea un nuevo videojuego con los datos recibidos*/
$app->post('/tvseries', function ($req, $res, $args) {
    //Código para peticiones de POST (creación de items)
    $template = $req->getParsedBody();
    $datos = $template['template']['data'];

    $longitud = count($datos);
    for($i=0; $i<$longitud; $i++)
    {
        switch ($datos[$i]['name']){
        case "name":
            $name = $datos[$i]['value'];
            break;
        case "description":
            $desc = $datos[$i]['value'];
            break;
        case "channelPlatform":
            $plataf = $datos[$i]['value'];
            break;
        case "category":
            $catego = $datos[$i]['value'];
            break;
        case "seasons":
            $seaso = $datos[$i]['value'];
            break;
				case "language":
		        $langua = $datos[$i]['value'];
		        break;
				case "episodes":
				    $episod = $datos[$i]['value'];
				    break;
        case "datePublished":
            $date = $datos[$i]['value'];
            break;

        }
    }

    $tvseries = new Tvseries;
    $tvseries->name = $name;
    $tvseries->description = $desc;
    $tvseries->channelPlatform = $plataf;
    $tvseries->category = $catego;
    $tvseries->seasons =  $seaso;
		$tvseries->language =  $langua;
		$tvseries->episodes =  $episod;
    $tvseries->datePublished = $date;

    $tvseries->save();
});


//Actualizar videojuego

$app->put('/tvseries/{name}', function ($req, $res, $args) {

	// Creamos un objeto collection + json con el libro pasado como parámetro

	// Obtenemos el libro de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
	$nuevo_videogame = \TvSeries::find($args['name']);

    $template = $req->getParsedBody();

	$datos = $template['template']['data'];
  	foreach ($datos as $item)
  	{
		switch($item['name'])
		{
        case "name":
            $name = $item['value'];
            break;
        case "description":
            $description = $item['value'];
            break;
        case "channelPlatform":
            $channelPlatform = $item['value'];
            break;

        case "category":
            $category = $item['value'];
            break;

        case "seasons":
            $seasons = $item['value'];
            break;

        case "language":
            $language = $item['value'];
            break;
				case "episodes":
		            $episodes = $item['value'];
		            break;
        case "datePublished":
            $date = $item['value'];
            break;
		}
	}

	$nuevo_tvseries['name'] = $name;
	$nuevo_tvseries['description'] = $description;
	$nuevo_tvseries['channelPlatform'] = $channelPlatform;
	$nuevo_tvseries['category'] = $category;
	$nuevo_tvseries['seasons'] = $seasons;
	$nuevo_tvseries['language'] = $language;
	$nuevo_tvseries['episodes'] = $episodes;
	$nuevo_tvseries['datePublished'] = $datePublished;
	$nuevo_tvseries->save();

});


?>
