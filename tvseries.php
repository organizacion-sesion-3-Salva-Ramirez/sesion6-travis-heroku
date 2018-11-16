<?php

// Modelo de objetos que se corresponde con la tabla de MySQL
class Tvserie extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
}

/* Obtención de la lista de series */

$app->get('/tvseries', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la lista de películas

    // Obtenemos la lista de películas de la base de datos y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $peliss = json_decode(\Tvserie::all());

    // Mostramos la vista
    return $this->view->render($res, 'tvserieslist_template.php', [
        'items' => $peliss
    ]);
})->setName('tvseries');


/*  Obtención de una película en concreto  */
$app->get('/tvseries/{name}', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la película pasada como parámetro

    // Obtenemos la película de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \Tvserie::find($args['name']);
    $seri = json_decode($p);

    // Mostramos la vista
    return $this->view->render($res, 'tvseries_template.php', [
        'item' => $seri
    ]);

});

//Borrar pelicula
$app->delete('/tvseries/{name}', function ($req, $res, $args) {
    //Le pasamos la variable para que la encuentre
    $seri = Tvserie::find($args['name']);
    //Borramos la pelicula encontrada
    $seri->delete();
});

//Guardar nueva pelicula
$app->post('/tvseries', function ($req, $res, $args)  {
    $template = $req->getParsedBody();

    $datos = $template['template']['data'];
    //longitud del vector
    $longitud = count($datos);
    //bucle que recorre vector
    for ($i = 0; $i < $longitud; $i++)
    {
        switch($datos[$i]['name'])
        {
        case "name":
            $name = $datos[$i]['value'];
            break;
        case "description":
            $description = $datos[$i]['value'];
            break;
        case "channelPlatform":
            $channelPlatform = $datos[$i]['value'];
            break;
        case "category":
            $category = $datos[$i]['value'];
            break;
        case "seasons":
            $seasons = $datos[$i]['value'];
            break;
        case "language":
            $language = $datos[$i]['value'];
            break;
        case "episodes":
            $episodes = $datos[$i]['value'];
            break;
        case "datePublished":
            $datePublished = $datos[$i]['value'];
            break;
        }
    }
    $nueva_serie = new Tvserie;
    $nueva_serie['name'] = $name;
    $nueva_serie['description'] = $description;
    $nueva_serie['channelPlatform'] = $channelPlatform;
    $nueva_serie['category'] = $category;
    $nueva_serie['seasons'] = $seasons;
    $nueva_serie['language'] = $language;
    $nueva_serie['episodes'] = $episodes;
    $nueva_serie['datePublished'] = $datePublished;

    $nueva_serie->save();
});
//Actualizar pelicula
$app->put('/tvseries/{id}', function ($req, $res, $args) {
    $template = $req->getParsedBody();
    $datos = $template['template']['data'];
    //longitud del vector
    $longitud = count($datos);
    //bucle que recorre vector
    for ($i = 0; $i < $longitud; $i++)
    {
     switch($datos[$i]['name'])
     {
      case "name":
          $name = $datos[$i]['value'];
          break;
      case "description":
          $description = $datos[$i]['value'];
          break;
      case "channelPlatform":
          $channelPlatform = $datos[$i]['value'];
          break;
      case "category":
          $category = $datos[$i]['value'];
          break;
      case "seasons":
          $seasons = $datos[$i]['value'];
          break;
      case "language":
          $language = $datos[$i]['value'];
          break;
      case "episodes":
          $episodes = $datos[$i]['value'];
          break;
      case "datePublished":
          $datePublished = $datos[$i]['value'];
          break;
      }
    }

    $nueva_serie = new Tvserie::find($args['id']);
    $nueva_serie['name'] = $name;
    $nueva_serie['description'] = $description;
    $nueva_serie['channelPlatform'] = $channelPlatform;
    $nueva_serie['category'] = $category;
    $nueva_serie['seasons'] = $seasons;
    $nueva_serie['language'] = $language;
    $nueva_serie['episodes'] = $episodes;
    $nueva_serie['datePublished'] = $datePublished;

    $nueva_serie->save();

});

?>
