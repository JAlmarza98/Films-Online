# Films-Online

Films-Online es el proyecto de fin de grado superior en Desarrollo de Aplicaciones Web (DAW) de [Borja Martin](https://github.com/BorjaMartin90 "Perfil en Github") y [Joel Almarza](https://github.com/JAlmarza98 "Perfil en Github").

![Imagén de la pagina principal](img/readme/catalogo.PNG)

## Índice

---

- Objetivo del Proyecto
- Configuraciones necesarias
- Información Importante

## Objetivo del Proyecto

---

Esta experiencia docente ha tenido como tarea fundamental la realización de una aplicación web en donde tenga cabida una forma radicalmente distinta de afrontar los contenidos teóricos y prácticos por parte de los alumnos aprendidos en clase plasmándolos en el proyecto.
Esta aplicación nace del reciente incremento y necesidad del mercado de plataformas de video bajo demanda a través de internet en las cuales los usuarios puedan elegir que quieren ver y cuando quieren verlo desde el dispositivo y el lugar que mejor les convenga según el momento.

## Configuraciones necesarias

---

Para poder desplegar el proyecto en su maximo explendor es necesario un servido Apache, una base de datos MySQL y un servidor de correo.
Por nuestra parte, al no poder contar con un servidor dedicado, realizamos el desarrollo utilizando [XAMPP](https://www.apachefriends.org/es/index.html "web oficial"), ya que nos otorgaba todos los modulos que requeriamos. Aun asi fue necesario configurar el modulo _Mercury_ para que fuese capaz de enviar correos desde un servidor local, para configurarlo correctamente puedes seguir [este tutorial](http://www.medisoft.cl/configurar-mercury-xampp-para-enviar-correos-desde-localhost/ "Tutorial").
Por otro lado se debe configurar la subida de archivos al servido apache modificando los siguientes campos en el archivo _php.ini_ y dejandolos igual que estan a continuanción:

```

file_uploads = On
...
upload_tmp_dir = "C:\xampp\tmp"
...
upload_max_filesize = 40960M
...
max_file_uploads = 20
...
post_max_size = 40960M
....
max_input_time = 60
...
memory_limit = 8192M
...
max_execution_time = 40960

```

## Información Importante

---

- Una vez importado el archivo _BBDD.sql_ en MySQL y una vez ejecutada la aplicación dispondra de dos opciones: puede optar por crear una cuenta nueva si quiere disfrutar de una experiencia de usuario completa o por utilizar la cuenta de administrador:

|      Email      | Contraseña |
| :-------------: | :--------: |
| admin@admin.com | P@ssword01 |

Por favor, modifique la contraseña desde la aplicación (en la pestaña _Editar Perfil_, que encontrará en la barra de navegacion) en vez de hacerlo desde su gestor de base de datos ya que utilizamos un hash de una sola vía y no sería capaz de entrar en su cuenta.

- La aplicación contiene imagenes y trailers de muestra, estos son facilmente eliminables o modificables desde el apartado de administración, el cual unicamente es accesible desde una cuentra administradora.

- Toda la web tiene un diseño responsive a excepcion del apartado de administración puesto que entendemos que un adminstrador siempre utilizará un ordenador para acceder
