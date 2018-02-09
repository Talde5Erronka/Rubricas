#! /bin/bash
clear

echo "Asegurese de estar en la carpeta correcta antes de iniciar."
echo "¿CONTINUAR?(si/no):" 
read respuesta

#INICIAR SCRIPT
if [ "$respuesta" = "si" ]; then


			echo "¿Es la primera vez que usa este script?"
			read -p "(si/no)" respuesta2

				#COMPRUEBA SI LA RESPUESTA ES SI O NO

				#SI NO TIENE GIT INSTALADO, LO INSTALA Y DESCARGA EL PROYECTO
				if [ "$respuesta" = "si" ]; then

					sudo apt-get install git -y

					echo "Iniciando Git..."
					git init 

					echo "Enlazando cuenta..."
					git config --global user.email talde5aip@gmail.com
					echo "Cuenta enlazanda al correo: talde5aip@gmail.com"

					echo "Enlazando carpeta a repositorio..."
					git remote rm origin
					git remote add origin https://github.com/Talde5Erronka/Rubricas
					echo "Carpeta enlazada..."

					echo "Descargando los datos..."
					git pull origin master
					
					echo "A configurado correctamente GitHub. Muchas gracias por su paciencia."
				
				#SI TIENE GIT INSTALADO, SUBE EL PROYECTO A GITHUB
				elif [ "$respuesta" = "no" ]; then

					echo "Iniciando Git..."
					git init

					echo "Añadiendo archivos..."
					git add .
					echo "Archivos añadidos"
			 
					read -p "Asigne un nombre a la consolidación:" nombreCons
					echo "Creando consolidación..."
					git commit -m "$nombreCons"
					echo "Consolidación creada con el nombre: $nombreCons"

					echo "Enlazando cuenta..."
					git config --global user.email talde5aip@gmail.com
					echo "Cuenta enlazanda al correo: talde5aip@gmail.com"

					echo "Enlazando carpeta a repositorio..."
					git remote rm origin
					git remote add origin https://github.com/Talde5Erronka/Rubricas
					echo "Carpeta enlazada..."

					echo "Subiendo los datos..."
					git push -u origin master

				#SI NO HA RESPONDIDO NI SI NI NO
				else
					
					echo "Respuesta inválida. Por favor, escriba si o no."

				fi
		
		#SI NO PERTENECE A TALDE 5
		elif [ "$respuesta" = "no" ]; then
		
			echo "¿Es la primera vez que usa este script?"
			read -p "(si/no)" respuesta2

				#COMPRUEBA SI LA RESPUESTA ES SI O NO

				#SI NO TIENE GIT INSTALADO, LO INSTALA Y DESCARGA EL PROYECTO
				if [ "$respuesta" = "no" ]; then

					sudo apt-get install git -y

					echo "Iniciando Git..."
					git init 

					read -p "Introduzca el email asignado a su cuenta de GitHub:" emailGH
					echo "Enlazando cuenta..."
					git config --global user.email $emailGH
					echo "Cuenta enlazanda al correo: $emailGH"

					read -p "Introduzca el nombre de su cuenta de GitHub:" nombreCuentaGH
					read -p "Introduzca el nombre del repositorio al que desea subir la consolidación:" nombreRepositorio
					echo "Enlazando carpeta a repositorio..."
					git remote rm origin
					git remote add origin https://github.com/$nombreCuentaGH/$nombreRepositorio
					echo "Carpeta enlazada..."

					echo "Descargando los datos..."
					git pull origin master
					
					echo "A configurado correctamente GitHub. Muchas gracias por su paciencia."
				
				#SI TIENE GIT INSTALADO, SUBE EL PROYECTO A GITHUB
				elif [ "$respuesta" = "si" ]; then

					echo "Iniciando Git..."
					git init

					echo "Añadiendo archivos..."
					git add .
					echo "Archivos añadidos"
			 
					read -p "Asigne un nombre a la consolidación:" nombreCons
					echo "Creando consolidación..."
					git commit -m "$nombreCons"
					echo "Consolidación creada con el nombre: $nombreCons"

					read -p "Introduzca el email asignado a su cuenta de GitHub:" emailGH
					echo "Enlazando cuenta..."
					git config --global user.email $emailGH
					echo "Cuenta enlazanda al correo: $emailGH"

					read -p "Introduzca el nombre de su cuenta de GitHub:" nombreCuentaGH
					read -p "Introduzca el nombre del repositorio al que desea subir la consolidación:" nombreRepositorio
					echo "Enlazando carpeta a repositorio..."
					git remote rm origin
					git remote add origin https://github.com/$nombreCuentaGH/$nombreRepositorio
					echo "Carpeta enlazada..."

					echo "Subiendo los datos..."
					git push -u origin master

				#SI NO HA RESPONDIDO NI SI NI NO
				else
					
					echo "Respuesta inválida. Por favor, escriba si o no."

				fi

	

#SI EL USUARIO NO ESTA EN LA CARPETA CORRECTA, CIERRA EL PROGRAMA
else
	echo "Asegurese de estar en la carpeta correcta e inicie de nuevo el script por favor."

fi
