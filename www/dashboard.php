<br><br><br>

<div class="login-logo">
    <img src="https://i.imgur.com/xfIjEJn.png" alt="xfIjEJn.png" border="0" width="125px">
</div>

<?php
    session_start();

    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Bienvenido/a';
    
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<h4>$username</h4>";
    } else {
        echo "<h4>Bienvenido/a</h4>";
    }
?>

<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            background-color: #edf2ee;
            font-family: Arial, sans-serif;
            margin: 20px;
            align-items: center;
            
        }

        .container {
            display: flex;
            justify-content: space-around;
        }

        .login-logo {
            text-align: center;
            margin-top: -20px;
            margin-bottom: 18px;
        }

        h4 {
            text-align: center;
        }

		.add-button {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 5px;
        padding: 10px;
        font-size: 18px;
        text-align: center;
        text-decoration: none;
        width: 300px;
        height: 30px;
        border: 2px solid #dfe8e1;
        color: white;
        background-color: #dfe8e1; /* Ajusta el color de fondo según sea necesario */
        border-radius: 5px;
        transition: background-color 0.3s;
        cursor: pointer;
        margin: auto;
    }


		.add-button:hover {
   			background-color: #dfe8e1; /* color botón al pasar el ratón*/
    		color: #fff;
		}

		.text-title {
    		color: #000000;
    		text-align: left; /* Cambiado a izquierda */
		}
        
 		.grid-container {
            display: grid;
            grid-template-columns: repeat(2, 150px);
            gap: 20px;
            justify-content: center; /* Centra los elementos vertical*/
            align-items: center; /* Centra los elementos horizontal */
        }

        .custom-button {
            padding: 10px;
            text-align: center;
            color: black;
            background-color: #dfe8e1; /* color fondo del boton tareas */
            border: 3px solid #aebdb1; /* color borde del boton tareas */
            border-radius: 20px;
            cursor: pointer;
        }

        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            z-index: 1;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 0;
        }

        .custom-button:hover {
            background-color: #aebdb1;
        }
        
        footer {
        position: fixed;
        bottom: 0;
        left: 0; /* Ajusta esto según sea necesario */
        width: 100%;
        background-color: #dfe8e1;
        padding: 10px;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }


        button {
            padding: 10px;
            color: black;
            background-color: #dfe8e1; /* color del botón menú*/
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        button:hover {
            background-color: #aebdb1; /* color al pasar el ratón por el botón */
        }

        .text-title2 {
    		color: #000000;
    		text-align: left; /* Cambiado a izquierda */
		}
        
        .image-grid {
            display: flex;
            gap: 20px; /* espacios entre fotos*/
            flex-wrap: wrap;
            justify-content: space-around;
            max-width: 800px; /* Tamaño máximo del contenedor de la cuadrícula */
            margin: 20px auto;
        }

        .image-container {
            flex: 1 0 48%; /* Ajusta el ancho de las imágenes y deja un pequeño espacio entre ellas */
            margin-bottom: 20px;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .image-container img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 8px; /* Ajusta el radio de borde de la imagen al del contenedor */
        }   
   </style>
</head>
<body>

<div class="add-button">
    <button id="mostrarVentanaBtn"><img src="imagenes/anadir.png" alt="+" border="0" width="25px"></button>
</div>

<br>

<h4>Tareas pendientes</h4>

<div class="modal" id="miModal"></div>

<div class="overlay" id="miOverlay"></div>

<!-- Contenedor para mostrar la información guardada -->
<div id="informacion-container"></div>

<!-- Contenedor para mostrar los botones generados -->
<div id="contenedor-botones" class="grid-container"></div>

<script>
    // Array para almacenar la información de cada tarea
    var tareas = [];

    function mostrarVentana(indice) {
    var modal = document.getElementById('miModal');
    var overlay = document.getElementById('miOverlay');

    // Limpiar el contenido existente del modal
    modal.innerHTML = '';

    // Verificar si es una tarea nueva o una edición
    var esEdicion = indice !== undefined;
    var textoTarea = esEdicion ? tareas[indice].texto : '';

    // Agregar el contenido HTML al modal
    modal.insertAdjacentHTML('beforeend', `
    <span class="close-button" onclick="cerrarModal()">✖</span>
    <form id="miFormulario" onsubmit="return guardarInformacion(${indice})">
        <br><label for="texto">Introduce tu tarea:</label><br><br>
        <textarea id="texto" name="texto" required>${textoTarea}</textarea>
        <br><br>
        <button type="submit">Guardar</button>
        ${esEdicion ? `<button type="button" onclick="eliminarTarea(${indice})">Eliminar</button>` : ''}
    </form>
`);


    modal.style.display = 'block';
    overlay.style.display = 'block';
}

function eliminarTarea(indice) {
    tareas.splice(indice, 1);
    actualizarBotones();
    cerrarModal();
}

    function cerrarModal() {
        var modal = document.getElementById('miModal');
        var overlay = document.getElementById('miOverlay');
        modal.style.display = 'none';
        overlay.style.display = 'none';
    }

    function mostrarInformacionGuardada(indice) {
    var modal = document.getElementById('miModal');
    var overlay = document.getElementById('miOverlay');
    var informacionContainer = document.getElementById('informacion-container');
    var textoGuardado = tareas[indice].texto;

    // Limpiar el contenido existente
    informacionContainer.innerHTML = '';

    // Crear el contenedor div para el texto y los botones
    var contenidoDiv = document.createElement('div');
    contenidoDiv.className = 'modal-content'; // Agrega una nueva clase para el contenido

    // Agregar el texto guardado
    var textoElement = document.createElement('p');
    textoElement.textContent = textoGuardado;
    contenidoDiv.appendChild(textoElement);

    // Agregar el botón de eliminar
    var eliminarButton = document.createElement('button');
    eliminarButton.textContent = 'Eliminar';
    eliminarButton.onclick = function () {
        eliminarTarea(indice);
        cerrarInformacion();
    };
    contenidoDiv.appendChild(eliminarButton);

    // Agregar el botón de cerrar
    var closeButton = document.createElement('span');
    closeButton.className = 'close-button';
    closeButton.textContent = '✖';
    closeButton.onclick = function () {
        cerrarInformacion();
    };
    contenidoDiv.appendChild(closeButton);

    // Agregar el contenidoDiv al informacionContainer
    informacionContainer.appendChild(contenidoDiv);

    // Mostrar la ventana modal y el overlay
    modal.style.display = 'flex'; 
    overlay.style.display = 'block';
}



    function cerrarInformacion() {
        var modal = document.getElementById('miModal');
        var overlay = document.getElementById('miOverlay');
        var informacionContainer = document.getElementById('informacion-container');

        informacionContainer.innerHTML = '';

        modal.style.display = 'none';
        overlay.style.display = 'none';
    }

    function guardarInformacion(indice) {
        var texto = document.getElementById('texto').value;

        if (indice !== undefined) {

        } else {
            // Si es una nueva tarea, agregarla al array
            tareas.push({ texto: texto });
        }

        actualizarBotones();

        // Cierra la ventana modal después de guardar
        cerrarModal();

        return false;
    }


    function actualizarBotones() {
    var contenedorBotones = document.getElementById('contenedor-botones');
    contenedorBotones.innerHTML = '';

    tareas.forEach(function(tarea, indice) {
        var mostrarInfoBoton = document.createElement('button');
        mostrarInfoBoton.textContent = tarea.texto;
        mostrarInfoBoton.className = 'custom-button';
        mostrarInfoBoton.addEventListener('click', function () {
            mostrarInformacionGuardada(indice);
        });
        contenedorBotones.appendChild(mostrarInfoBoton);
    });
}

    document.getElementById('mostrarVentanaBtn').addEventListener('click', function () {
        cerrarInformacion();
        mostrarVentana();
    });

    // Agregar evento clic a los nuevos botones generados
    document.getElementById('contenedor-botones').addEventListener('click', function (event) {
        if (event.target.classList.contains('custom-button')) {
            var indice = Array.from(contenedorBotones.children).indexOf(event.target);
            mostrarInformacionGuardada(indice);
        }
    });


    document.getElementById('ajustesBtn').addEventListener('click', function () {
        // Redirigir a la página 'ajustes.php'
        window.location.href = 'ajustes.php';
    });

</script>

<br>

<h4>Tareas realizadas</h4>

<footer>
    <button id="perfilBtn"><img src="imagenes/usuario.png" alt="Perfil" border="0" width="20px"></button>
    <button><a href="ajustes.php" id="ajustesBtn"><img src="imagenes/configuraciones.png" alt="Ajustes" border="0" width="20px"></a></button>
</footer>


</body>
</html>