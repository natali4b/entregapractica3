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
        padding: 8px;
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
    		text-align: left; /* Cambiado a izquierda (NO SE PONE A LA IZQUIERDA) */
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

        .center-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 50px;
    }

    .separator {
        width: 80%;
        margin: 10px 0;
        border: 0.5px solid #c7cfc6; /* Cambiado a un gris más claro */
    }

    .center-container button {
        width: 80%; /* Ancho del botón */
        margin: 10px 0; /* Espaciado entre botones */
        text-align: center;
        background-color: #edf2ee; /* Fondo del botón */
        border: none;
        border-radius: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .center-container button img {
        margin-right: 20px; /* Espaciado entre la imagen y el texto */
    }

    .center-container button:hover {
        background-color: #aebdb1;
    }

    .center-container button  {
        margin: 1;
        font-size: 17px; /* Tamaño del texto */
    }

    .profile-picture {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-top: 20px;
    object-fit: cover; /* Esto asegura que la imagen se ajuste dentro del contenedor manteniendo su relación de aspecto */
}



    .center-container .custom-button {
            width: 80%; /* Ancho del botón */
            margin: 10px 0; /* Espaciado entre botones */
            text-align: center;
            background-color: #edf2ee; /* Fondo del botón */
            border: 3px solid #aebdb1; /* color borde del botón tareas */
            border-radius: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            border: none; 
            outline: none
            transition: background-color 0.3s;
        }

        .center-container .custom-button img {
            margin-right: 20px; /* Espaciado entre la imagen y el texto */
        }

        .center-container .custom-button:hover {
            background-color: #aebdb1;
        }

        .profile-container {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px; /* Agregado para separar del contenido debajo */
    }

    .profile-container img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-right: 30px; /* Reducido el margen a 10px */
        object-fit: cover;
    }

    .profile-container h3 {
        margin: 0;
        margin-top: 25px; /* Agregado un margen superior al texto */
    }

   </style>
</head>
<body>

<script>
// Agregar eventos clic para cada botón
document.getElementById('cambiarFotoBtn').addEventListener('click', function () {
    mostrarConfirmarModal('Cambiar foto de perfil');
});

document.getElementById('eliminarCuentaBtn').addEventListener('click', function () {
    mostrarConfirmarModal('Eliminar cuenta');
});

document.getElementById('cerrarSesionBtn').addEventListener('click', function () {
    mostrarConfirmarModal('Cerrar sesión');
});

// Función para mostrar el modal de confirmación
function mostrarConfirmarModal(accion) {
    var modal = document.getElementById('confirmarModal');
    modal.querySelector('p').textContent = '¿Estás seguro/a de que quieres ' + accion.toLowerCase() + '?';
    modal.style.display = 'block';
    overlay.style.display = 'block';
}

// Función para cerrar el modal
function cerrarModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = 'none';
    overlay.style.display = 'none';
}

// Función para realizar la acción después de confirmar
function realizarAccion() {
    // Lógica para realizar la acción según el botón presionado
    console.log('Acción realizada');
    
    // Cerrar el modal después de realizar la acción
    cerrarModal('confirmarModal');
}

function cerrarSesion() {

        window.location.href = 'login.html';
    }

    function eliminarCuenta() {

        window.location.href = 'singin.html';
    }

    var overlay = document.querySelector('.overlay');

    function handleProfilePictureChange(input) {
        var file = input.files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var profilePicture = document.getElementById('profilePicture');
                profilePicture.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
    // Recuperar la foto de perfil almacenada localmente al cargar la página
    var storedProfilePicture = localStorage.getItem('profilePicture');
    if (storedProfilePicture) {
        document.getElementById('profilePicture').src = storedProfilePicture;
    }

    // Agregar eventos clic para cada botón
    document.getElementById('cambiarFotoBtn').addEventListener('click', function () {
        mostrarConfirmarModal('Cambiar foto de perfil');
    });

    document.getElementById('eliminarCuentaBtn').addEventListener('click', function () {
        mostrarConfirmarModal('Eliminar cuenta');
    });

    document.getElementById('cerrarSesionBtn').addEventListener('click', function () {
        mostrarConfirmarModal('Cerrar sesión');
    });
});

// Función para mostrar el modal de confirmación
function mostrarConfirmarModal(accion) {
    var modal = document.getElementById('confirmarModal');
    modal.querySelector('p').textContent = '¿Estás seguro/a de que quieres ' + accion.toLowerCase() + '?';
    modal.style.display = 'block';
    overlay.style.display = 'block';
}

// Función para cerrar el modal
function cerrarModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = 'none';
    overlay.style.display = 'none';
}

// Función para realizar la acción después de confirmar
function realizarAccion() {
    // Lógica para realizar la acción según el botón presionado
    console.log('Acción realizada');
    
    // Cerrar el modal después de realizar la acción
    cerrarModal('confirmarModal');
}

function cerrarSesion() {
    window.location.href = 'login.html';
}

function eliminarCuenta() {
    window.location.href = 'singin.html';
}

var overlay = document.querySelector('.overlay');

function handleProfilePictureChange(input) {
    var file = input.files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var profilePicture = document.getElementById('profilePicture');
            profilePicture.src = e.target.result;

            // Almacenar la foto de perfil localmente
            localStorage.setItem('profilePicture', e.target.result);
        };

        reader.readAsDataURL(file);
    }
}

</script>
<br><br>
<div class="profile-container">
    <img id="profilePicture" class="profile-picture" src="ruta_predeterminada_de_la_foto" alt="" onerror="this.onerror=null; this.src='imagenes/iconoprovisional.png';">
    <h3>Bienvenido/a</h3>
</div>



<div class="center-container">

    <label for="fileInput" class="custom-button">
        <img src="imagenes/perfil.png" alt="Cambiar Foto" border="0" width="25px">
        Cambiar foto de perfil
    </label>
    <input type="file" id="fileInput" style="display: none;" accept="image/*" onchange="handleProfilePictureChange(this)">


    <hr class="separator">

    <button id="eliminarCuentaBtn" onclick="eliminarCuenta()">
        <img src="imagenes/papelera.png" alt="Eliminar Cuenta" border="0" width="25px">
        Eliminar cuenta
    </button>

    <hr class="separator">

    <button id="cerrarSesionBtn" onclick="cerrarSesion()">
        <img src="imagenes/cerrarsesion.png" alt="Cerrar Sesión" border="0" width="25px">
        Cerrar sesión
    </button>

</div>

<div class="modal" id="confirmarModal">
    <span class="close-button" onclick="cerrarModal('confirmarModal')">✖</span>
    <p>¿Estás seguro/a de que quieres realizar esta acción?</p>
    <button onclick="realizarAccion()">Sí</button>
    <button onclick="cerrarModal('confirmarModal')">No</button>
</div>

<footer>
    <button><a href="dashboard.php" id="perfilBtn"><img src="imagenes/usuariovacio.png" alt="Ajustes" border="0" width="20px"></a></button>
    <button id="ajustesBtn"><img src="imagenes/configuracionesnegro.png" alt="Ajustes" border="0" width="20px"></button>
</footer>

</body>
</html>