<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>

    <header>
        <div class="header h1">
            <h1>Biblioteca<br></h1>
            <h2>Datos de un libro<br></h2>
        </div>
    </header>

    <div class="container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="row g-4 mt-3">
            <div class="col-6">
                <label for="libroInput" class="form-label">Autor</label>
                <input type="text" class="form-control" id="libroInput" name="libro">
            </div>

            <div class="col-6">
                <label for="tituloInput" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="tituloInput" name="titulo">
            </div>

            <div class="col-6">
                <label for="edicionInput" class="form-label">Edicion</label>
                <input type="text" class="form-control" id="edicionInput" name="edicion">
            </div>

            <div class="col-6">
                <label for="lugarInput" class="form-label">Lugar de Edicion</label>
                <input type="text" class="form-control" id="lugarInput" name="lugar">
            </div>

            <div class="col-8">
                <label for="editorialInput" class="form-label">Editorial</label>
                <input type="text" class="form-control" id="editorialInput" name="editorial">
            </div>

            <div class="col-4">
                <label for="añoInput" class="form-label">Año de Edicion</label>
                <input type="date" class="form-control" id="añoInput" name="año">
            </div>

            <div class="col-4">
                <label for="paginasInput" class="form-label">Numero de Paginas</label>
                <input type="numeric" class="form-control" id="paginasInput" name="paginas">
            </div>

            <div class="col-4">
                <label for="isbnInput" class="form-label">ISBN</label>
                <input type="numeric" class="form-control" id="isbnInput" name="isbn">
            </div>

            <div class="col-12">
                <label for="notasInput" class="form-label">Notas</label>
                <input type="text" class="form-control" id="notasInput" name="notas">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary" value="Enviar">Ingresar Libro</button>
            </div>
        </form>
    </div>

    <?php

    class Libro
    {
        public $libro;
        public $titulo;
        public $edicion;
        public $lugar;
        public $editorial;
        public $año;
        public $paginas;
        public $isbn;
        public $notas;

        public function __construct($libro, $titulo, $edicion, $lugar, $editorial, $año, $paginas, $isbn, $notas)
        {
            $this->libro = $libro;
            $this->titulo = $titulo;
            $this->edicion = $edicion;
            $this->lugar = $lugar;
            $this->editorial = $editorial;
            $this->año = $año;
            $this->paginas = $paginas;
            $this->isbn = $isbn;
            $this->notas = $notas;
        }
    }

    function agregar_libro($libro, &$libros)
    {
        array_push($libros, $libro);
    }

    $libros = array();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtenemos los datos del formulario
        $libro = $_POST["libro"];
        $titulo = $_POST["titulo"];
        $edicion = $_POST["edicion"];
        $lugar = $_POST["lugar"];
        $editorial = $_POST["editorial"];
        $año = $_POST["año"];
        $paginas = $_POST["paginas"];
        $isbn = $_POST["isbn"];
        $notas = $_POST["notas"];


        $libro = new Libro($libro, $titulo, $edicion, $lugar, $editorial, $año, $paginas, $isbn, $notas);
        agregar_libro($libro, $libros);
    }


    for ($i = 0; $i < count($libros); $i++) {
        $libro = $libros[$i];
        $tabla = "<table class='table '><tr>";
        $tabla .= "<td>Nombre Autor: </td>";
        $tabla .= "<td>" . $libro->libro  . "</td></tr>";
        $tabla .= "<tr><td> Titulo Libro: </td>\n";
        $tabla .= "<td>" . $libro->titulo . "</td></tr>";
        $tabla .= "<tr><td>Lugar de Edicion: </td>";
        $tabla .= "<td> " . $libro->edicion . "</td></tr>";
        $tabla .= "<tr><td> Lugar: </td>";
        $tabla .= "<td> " . $libro->lugar . "</td></tr>";
        $tabla .= "<tr><td> Editorial: </td>";
        $tabla .= "<td> " . $libro->editorial . "</td></tr>";
        $tabla .= "<td>Año de publicacion: </td>";
        $tabla .= "<td>" . $libro->año  . "</td></tr>";
        $tabla .= "<tr><td> Numero de paginas: </td>\n";
        $tabla .= "<td>" . $libro->paginas . "</td></tr>";
        $tabla .= "<tr><td>ISBN: </td>";
        $tabla .= "<td> " . $libro->isbn . "</td></tr>";
        $tabla .= "<tr><td> Notas: </td>";
        $tabla .= "<td> " . $libro->notas . "</td></tr>";
        $tabla .= "</table>";
        echo $tabla;
    }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>