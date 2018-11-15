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
    $juegos = json_decode(\Tvseries::all());

    // Mostramos la vista
    return $this->view->render($res, 'tvserieslist_template.php', [
        'items' => $juegos
    ]);
})->setName('series');


/*  Obtención de un videojuego en concreto  */
$app->get('/tvseries/{name}', function ($req, $res, $args) {

    // Creamos un objeto collection + json con el videojuego pasada como parámetro

    // Obtenemos el videojuego de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \TVseries::find($args['name']);
    $juego = json_decode($p);

    // Mostramos la vista
    return $this->view->render($res, 'tvserie_template.php', [
        'item' => $juego
    ]);

});

/*  Eliminacion de un videojuego en concreto  */
$app->delete('/tvseries/{name}', function ($req, $res, $args) {

    // Obtenemos el videojuego de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \TVseries::find($args['name']);
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
            $category = $datos[$i]['value'];
            break;
        case "seasons":
            $seasons = $datos[$i]['value'];
            break;
				case "language":
		            $languages = $datos[$i]['value'];
		            break;
				case "episodes":
				        $episodes = $datos[$i]['value'];
				        break;
        case "datePublished":
            $date = $datos[$i]['value'];
            break;

        }
    }

    $tvseries = new TVseries;
    $tvseries->name = $name;
    $tvseries->description = $desc;
    $tvseries->channelPlatform = $plataf;
    $tvseries->category = $categ;
    $tvseries->seasons =  $seaso;
		$tvseries->languages =  $langua;
		$tvseries->episodes =  $episod;
    $tvseries->datePublished = $date;

    $tvseries->save();
});


//Actualizar videojuego

$app->put('/tvseries/{name}', function ($req, $res, $args) {

	// Creamos un objeto collection + json con el libro pasado como parámetro

	// Obtenemos el libro de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
	$nuevo_videogame = \TVseries::find($args['name']);

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
            $desc = $item['value'];
            break;
        case "channelPlatform":
            $plataf = $item['value'];
            break;

        case "category":
            $categ = $item['value'];
            break;

        case "seasons":
            $seaso = $item['value'];
            break;

        case "languages":
            $langua = $item['value'];
            break;
				case "episodes":
		            $episod = $item['value'];
		            break;
        case "datePublished":
            $date = $item['value'];
            break;
		}
	}

	$nuevo_tvseries['name'] = $name;
	$nuevo_tvseries['description'] = $desc;
	$nuevo_tvseries['channelPlatform'] = $plataf;
	$nuevo_tvseries['category'] = $categ;
	$nuevo_tvseries['seasons'] = $seaso;
	$nuevo_tvseries['languages'] = $langua;
	$nuevo_tvseries['episodes'] = $episod;
	$nuevo_tvseries['datePublished'] = $date;
	$nuevo_tvseries->save();

});


?>
