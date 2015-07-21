<?php
$str_datos = file_get_contents("http://utilsfalabella.appspot.com/eventos/api/?id_evento=1432650270");
$traerJson = json_decode($str_datos,true);

?>
<!DOCTYPE html>
<html lang="es">
  <head>
        <title>Prueba Falabella</title>
        <meta name="author" content="Jonnathan Ariza">
        <meta name="robots" content="noindex">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/layout-jake.css" />
        <link rel="stylesheet" type="text/css" href="css/normalize.css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    </head>
    <body class="body_home>
        
         <!--home Test start-->
        <div id="main-jake">
           <section class="contenido-de-primer-nivel">
                <?php

                    foreach ($traerJson as $asignacionProducto) 
                    {

                        if (!isset($asignacionProducto["oferta"]["precio1"]))
                        {
                            ?>
                                             
                                <article class="producto-cuadro even">
                                    <div class="contenido-bloque-articulo">
                                        <a href="<?php echo $asignacionProducto["oferta"]["url"]; ?>" title="Ir al producto" alt="producto">
                                            <figure class="bloque-imagen">
                                                <img src="http://falabella.scene7.com/is/image/FalabellaCO/<?php echo $asignacionProducto["oferta"]["sku"]; ?>" alt="Ver" width="">
                                            </figure>
                                        </a>
                                        <p class="marca"><?php echo $asignacionProducto["oferta"]["marca"]; ?></p>
                                        <div class="crm-descuento"><?php echo $asignacionProducto["oferta"]["CRMDescuento"]; ?></div>
                                        <a class="linea" href="<?php echo $asignacionProducto["oferta"]["url"]; ?>" title="Ir a linea 2015" alt="linea">Incluye línea 2015</a>
                                        <div class="cantidad"><?php echo $asignacionProducto["oferta"]["unidades"]; ?> unidades disponibles</div>
                                        <p class="descripcion-larga">Oferta valida desde el <?php echo $asignacionProducto["oferta"]["validoDesde"]." hasta el ".$asignacionProducto["oferta"]["validoHasta"]; ?> y/o hasta agotar existencias.</p>
                                        <span class="marca-falabella">Exclusivo Falabella.com</span>
                                    </div>
                                </article>
                        <?php
                        }
                        else
                        {
                            ?>
                                <article class="producto-cuadro even">
                                    <div class="contenido-bloque-articulo">
                                        <a href="<?php echo $asignacionProducto["oferta"]["url"]; ?>" title="Ir al producto" alt="producto">
                                            <figure class="bloque-imagen">
                                                <img src="http://falabella.scene7.com/is/image/FalabellaCO/<?php echo $asignacionProducto["oferta"]["sku"]; ?>" alt="Ver" width="">
                                            </figure>
                                        </a>
                                        <div class="titulo-tematico-especifico"><?php echo $asignacionProducto["oferta"]["marca"]; ?></div>
                                        <p class="descripcion-corta"><?php echo $asignacionProducto["oferta"]["descripcion"]; ?></p>
                                        <div class="costo-actual"><?php echo "$". $asignacionProducto["oferta"]["precio2"]; ?></div>
                                        <div class="costo-anterior">Normal <span class="tacho"><?php echo $asignacionProducto["oferta"]["precio3"]; ?></span></div>
                                        <div class="cantidad"><?php echo $asignacionProducto["oferta"]["unidades"]; ?> unidades disponibles</div>
                                        <p class="descripcion-larga">Oferta valida desde el <?php echo $asignacionProducto["oferta"]["validoDesde"]." hasta el ".$asignacionProducto["oferta"]["validoHasta"]; ?> y/o hasta agotar existencias.</p>
                                        <span class="marca-falabella">Exclusivo Falabella.com</span>
                                    </div>
                                </article>
                            <?php   
                        }
                    }
                ?>
            </section>
        </div>

    </body>
    
</html>