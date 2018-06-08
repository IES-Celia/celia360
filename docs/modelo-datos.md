# Especificación para el modelo de datos de CeliaTour

Este documento es una especificación informal de las necesidades del modelo de datos de CeliaTour.

## Escenas

La aplicación se estructura alrededor de las imágenes panorámicas en 360º tomadas por una cámara específica para ello. Estas imágenes son, simplemente, archivos JPG subidos al servidor, y las llamamos *escenas*. Cada escena se caracteriza por un id, un nombre descriptivo y el archivo que contiene la imagen (ruta relativa dentro del servidor). Además, hay que guardar las coordenadas hacia las que la cámara “mira” al entrar en la escena. Esas coordenadas son una pareja de números reales llamados *pitch* y *yaw*.

## Hotspots

Cada escena puede contener varios puntos de interacción que vamos a denominar *hotspots*. Los hotspots tienen un id, un título descriptivo, un texto (para descripciones más largas), el pitch y el yaw dentro de la escena (es decir, las coordenadas en la que se ubica el hotspot dentro de su escena 360) y un tipo. Según el tipo, puede ser necesario almacenar información adicional para cada hotspot.

Hay cinco tipos de hotspot:

1. **Hotspots tipo salto**: son puntos de salto de una escena a otra, es decir, enlaces entre escenas. Los hotspots de este tipo, además de los datos comunes a todos los hotspots, deben almacenar la escena a la que enlazan y el pitch y el yaw (coordenadas a donde “mira” la cámara) al entrar en la escena de destino.

2. **Hotspots tipo audio**: sirven para insertar una audiodescripción (o cualquier otro sonido) en una escena. Más abajo hablamos de los audios.

3. **Hotspots tipo vídeo**: sirven para incrustar un vídeo en una escena. Más abajo hablamos de los vídeos.

4. **Hotspots tipo panel**: el panel, básicamente, es una galería de imágenes incrustada en una escena. Más abajo hablamos de los paneles.

5. **Hotspots tipo escalera**: permite cambiar entre los diferentes planos. Más abajo hablaremos de los planos. Estos son los únicos hotspots que no necesitan ningún dato adicional a parte de los generales de cualquier hotspot.


## Audios y vídeos

Las audiodescripciones se almacenan en archivos MP3. Interesa guardar de cada una de ellas esta información: id, descripción, ruta relativa al archivo mp3 y tipo. Hay dos tipos: audio para visita guiada y audiodescripción. De la visita guiada hablamos más abajo.

De los vídeos solo guardaremos el id, una descripción y una ruta. En este caso se trata de una ruta absoluta, ya que los alojaremos en un servidor de streaming externo, como Vimeo.

## Paneles (galerías de imágenes)

Los paneles (galerías de imágenes) son más complejos. Por un lado están las imágenes en sí, de las que nos interesa guardar un id, la ruta relativa a la imagen, un título y un texto (descripción larga). También la fecha de subida. 

Los paneles, por su parte, se componen de imágenes. Un panel está asociado, por un lado, a una y solo una escena y, por otro, puede contener varias imágenes. Hay que tener en cuenta que una imagen puede aparecer en varios paneles. 

Los paneles, para complicarlo un poco más, tienen su propia descripción. Una de las imágenes del panel se debe marcar como imagen destacada: será la que aparecerá en primer lugar en la galería de imágenes. Además, debe ser posible asociar un archivo PDF al panel, de modo que pueda descargarse toda la información del panel al disco duro del visitante. Este archivo PDF no es obligatorio: algunos paneles lo tendrán y otros no.

## Mapas

Las escenas se asignan a mapas. Un mapa no es más que un plano del edificio. Si el edificio tiene varias plantas, tendremos un plano por cada planta. Cada mapa tendrá un id (que, además, indicará su orden relativo), la ruta relativa al archivo de la imagen, un título y un código de escena inicial. Esta será la escena que se visualizará por defecto al entrar en ese mapa.

Cada escena tiene que estar asignada a un (y solo un) mapa, y necesitamos conocer las coordenadas (top y left) del punto dentro de la imagen del mapa para poder mostrar las escenas como puntos dentro del mismo.

Para terminar con los mapas, hay algunas configuraciones generales que también se guardarán en la base de datos:
* El mapa inicial por el que empezará la visita. No tiene por qué ser el que tenga el primer id en la tabla de mapas. Por ejemplo, en el CeliaTour el mapa con id 0 es el del sótano, mientras que la visita comienza por el mapa con id 1 (la planta baja).
* La escena inicial (debe pertenecer al mapa inicial, claro).

## Visita guiada y visita de puntos destacados 

La visita guiada, con todos estos elementos, es fácil de modelar: no es más que una sucesión de escenas con audiodescripciones asociadas. Cada escena tendrá su propio título en la visita guiada. Las audiodescripciones tienen que ser del tipo "visita guiada". Revisa la especificación sobre los audios para más detalles.

La visita de puntos destacados, por su parte, es una colección de escenas, pero en este caso no está organizada como una secuencia, sino como una tabla. Cada escena ocupará una fila y una columna en esa tabla. También es necesario guardar un título para cada escena en la visita de puntos destacados, que no tiene por qué coincidir con el título de la escena en la tabla de escenas.

## Biblioteca

La biblioteca, de momento, se modelará de forma muy simplificada: de cada libro, a parte del id, nos interesa guardar su título, su autor, su editorial, el lugar y fecha de la edición, y el ISBN. Necesitamos saber si el libro tiene formato apaisado o no (para cambiar su visualización), y si es un libro histórico o no.

## Usuarios

De los usuarios guardaremos su id, su nombre y apellidos, un email, una password (encriptada) y un tipo. Los tipos pueden ser: pendiente de confirmación, bibliotecario, mapeador y administrador. Cada tipo tendrá unos privilegios suficientes sobre la aplicación.

De momento no nos interesa guardar el rastro de actividad de cada usuario en la aplicación. Es decir, **no** almacenaremos por ahora qué usuario crea una escena, sube una imagen o elimina un audio, por poner tres ejemplos.

