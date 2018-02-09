#! /bin/bash
clear

#REPITE SI LA RESPUESTA ES CORRECTA (si/no)
respuesta=""
while [ "$respuesta" != "si" ]
do

	echo "Asegurese de estar en la carpeta correcta antes de iniciar."
	echo "¿CONTINUAR?(si/no):" 
	read respuesta

	#COMPRUEBA SI LA RESPUESTA ES 'si' CONTINUA
	if [ "$respuesta" = "si" ]; then
		#REPITE SI LA RESPUESTA ES CORRECTA (si/no)
		respuesta=""
		while [ "$respuesta" != "si" ]
		do 
			read -p "¿Pertenece usted a Talde 5?" respuesta

			#SI LA RESPUESTA ES 'si' CONTINUA
			if [ "$respuesta" = "si" ]; then
				#REPITE SI LA RESPUESTA ES CORRECTA (si/no)
				respuesta=""
				while [ "$respuesta" != "si" ]
				do 
					read -p "¿Es la primera vez que usa este script?" respuesta

					#SI LA RESPUESTA ES 'no' CONTINUA
					if [ "$respuesta" = "no" ]; then
						echo "Iniciando Git..."
						git init

						echo "Añadiendo archivos..."
						git add .
						echo "Archivos añadidos"
			 
						read -p "Asigne un nombre a la consolidación:" nombreCons
						echo "Creando consolidación..."
						git commit -m "$nombreCons"
						 "Consolidación creada con el nombre: $nombreCons"

						echo "Enlazando cuenta..."
						git config --global user.email talde5aip@gmail.com
						echo "Cuenta enlazanda al correo: talde5aip@gmail.com"

						echo "Enlazando carpeta a repositorio..."
						git remote rm origin
						git remote add origin https://github.com/Talde5Erronka/Rubricas
						echo "Carpeta enlazada..."

						echo "Subiendo los datos..."
						git push -u origin master

						exit

					#SI LA RESPUESTA ES 'si' CREA UNA NUEVA CONEXION A GITHUB
					elif [ "$respuesta" = "si" ]; then
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
				
					#SI NINGUNA DE LAS RESPUESTAS ESTA BIEN
					else
						echo "Respuesta inválida, por favor escriba 'si' o 'no'."
					fi
				done
			#SI LA RESPUESTA ES 'no' CONECTA UNA NUEVA CUENTA A GITHUB
			elif [ "$respuesta" = "no" ]; then
				#REPITE SI LA RESPUESTA ES CORRECTA (si/no)
				respuesta=""
				while [ "$respuesta" != "si" ]
				do 
					read -p "¿Es la primera vez que usa este script?" respuesta

					#SI LA RESPUESTA ES 'si' CREA UNA NUEVA CONEXION A GITHUB
					if [ "$respuesta" = "si" ]; then
						sudo apt-get install git -y

						echo "Iniciando Git..."
						git init 
						
						echo "¿Cual es su cuenta de correo de GitHub?"
						read email
						echo "Enlazando cuenta..."
						git config --global user.email $email
						echo "Cuenta enlazanda al correo: $email"
						
						echo "¿Cual es su nombre de usuario?"
						read usuario
						echo "¿Cual es el nombre del repositorio?"
						read repositorio
						echo "Enlazando carpeta al repositorio..."
						git remote rm origin
						git remote add origin https://github.com/$usuario/$repositorio
						echo "Carpeta enlazada..."

						echo "Descargando los datos..."
						git pull origin master
					
						echo "A configurado correctamente GitHub. Muchas gracias por su paciencia."
	
					#SI LA RESPUESTA ES 'no' CONTINUA
					elif [ "$respuesta" = "no" ]; then
						
						echo "Iniciando Git..."
						git init

						echo "Añadiendo archivos..."
						git add .
						echo "Archivos añadidos"
			 
						read -p "Asigne un nombre a la consolidación:" nombreCons
						echo "Creando consolidación..."
						git commit -m "$nombreCons"
						 "Consolidación creada con el nombre: $nombreCons"

						echo "¿Cual es su cuenta de correo de GitHub?"
						read email
						echo "Enlazando cuenta..."
						git config --global user.email $email
						echo "Cuenta enlazanda al correo: $email"
						
						echo "¿Cual es su nombre de usuario?"
						read usuario
						echo "¿Cual es el nombre del repositorio?"
						read repositorio
						echo "Enlazando carpeta al repositorio..."
						git remote rm origin
						git remote add origin https://github.com/$usuario/$repositorio
						echo "Carpeta enlazada..."

						echo "Subiendo los datos..."
						git push -u origin master
						
						exit

					#SI NINGUNA DE LAS RESPUESTAS ESTA BIEN
					else
						echo "Respuesta inválida, por favor escriba 'si' o 'no'."
					fi
				done
			#SI NINGUNA DE LAS RESPUESTAS ESTA BIEN
			else
				echo "Respuesta inválida, por favor escriba 'si' o 'no'."
			fi
		done
	#SI LA RESPUESTA ES 'no' CIERRA EL SCRIPT
	elif [ "$respuesta" = "no" ]; then
		echo "Situese en la carpeta correcta y vuelva a iniciar el script."
		exit
	#SI NINGUNA DE LAS RESPUESTAS ESTA BIEN
	else
		echo "Respuesta inválida, por favor escriba 'si' o 'no'."
	fi
done

