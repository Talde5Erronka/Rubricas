#! /bin/bash
clear

echo "Asegurese de estar en la carpeta con los datos a subir." 
read -p "¿CONTINUAR?(si/no):" respuesta

#while ["$respuesta"!="no"] | ["$respuesta"!="NO"] | ["$respuesta"!="nO"] | ["$respuesta"!="No"] | ["$respuesta"!="si"] | ["$respuesta"!="SI"] | ["$respuesta"!="sI"] | ["$respuesta"!="Si"] do
	
#	if ["$respuesta"=="no"] | [$respuesta=="NO"] | [$respuesta=="nO"] | [$respuesta=="No"] 
#	then
#	    exit
#	elif ["$respuesta"!="si"] | ["$respuesta"!="SI"] | ["$respuesta"!="sI"] | ["$respuesta"!="Si"] 
#	then
	
#	  read -p "Respuesta no válida. Escriba 'si' o 'no') : " respuesta
#	fi
#done
#echo "Respuesta inválida. Por favor, escriba si o no"


#sudo apt-get update -y
sudo apt-get install git -y


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




