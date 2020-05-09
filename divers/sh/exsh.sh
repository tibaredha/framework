#! /bin/bash



### FONCTIONS

show_help(){
	echo "Utilisation: exsh [OPTION]... [FICHIER]"
	echo "Création rapide de script bash exécutable, en-tête, ouverture et droit automatique"
	echo "===================================================================================================="
	echo -e "  -p[val],\t\t attribue la permission [val] au(x) fichier(s),"
	echo -e "  --permissions=[val]\t si non précisé la permission est par défaut 700"
	echo "===================================================================================================="
	echo -e "  -o, \t\t\t n'ouvre pas le(s) fichier(s) après la fin du processus"
	echo -e "  -O, \t\t\t n'ouvre que le premier fichier passé en paramètre"
	echo -e "  -b, \t\t\t ne transforme pas le fichier en script bash (enlève '#! /bin/bash')"
	echo -e "  -s, \t\t\t pas de signature dans l'en-tête du script"
	echo -e "  -e, \t\t\t garde l'extension du fichier, ainsi que dans sa signature"
	echo ""
	echo -e "  --help, \t\t afficher l'aide"
	echo -e "  --version, \t\t afficher des informations de version"
	echo "===================================================================================================="
	echo "Exemples:"
	echo -e "  exsh -p750 script \t\t Créer le fichier 'script' avec la permission 750(rwxr-x---)"
	echo ""
	echo -e "  exsh -pu+rwx -o script \t Créer le fichier 'script' avec la permission passée en paramètre et n'ouvre pas le fichier"			 
	echo ""
	echo -e "  exsh s1 s2 -O -s s3\t\t Créer les fichiers s1, s2, s3 avec le droit par défaut 700, n'ouvre que le premier script (s1), n'écrit pas la signature dans les fichiers"
	exit 0
}

show_version(){
	echo "exsh (Script utils) 1.2"
	echo "Copyright © 2018 Pierre-Loup Gosse."
	echo "C'est logiciel libre, vous êtes libre de le modifier et de le redistribuer.Ce logiciel n'est accompagné d'ABSOLUMENT AUCUNE GARANTIE, dans les limites autorisées par la loi applicable."
	echo "===================================================================================================="
	echo "Écrit par Pierre-Loup Gosse."

	exit 0
}

show_error_miss(){
	echo "exsh: opérande manquant"
	echo "Saisissez « exsh --help » pour plus d'informations."
	exit 1
}

show_error_cmd(){
	echo "exsh: erreur interne"
	echo "Assurez-vous que les fichiers ont des noms corrects"
	exit 1
}

### VARIABLES
IFS=";"

droit="" # droit par défaut
fichiers="" # liste des fichiers
ouvrir=0 # 0 : ouvre le fichier après création / 1 : n'ouvre pas
ouvrir_premier=1 # 0 : ouvre le premier fichier uniquement si plusieurs fichiers sont passées en paramètre / 1 : ne tient pas en compte
chemin_bash=0 # 0 : ajoute le chemin "#! /bin/bash" et le transforme en script / 1 : n'ajoute pas
signature=0 # 0 : affiche la signature du fichier (dans l'en-tête = script.sh) / 1 : non
extension=0 # 0 : ne prend pas en compte l'extension (considéré comme .sh ou rien) / 1 : garde l'extension donné ainsi que dans la signature 
extension_fichier="" # extension du fichier



### CORPS DU SCRIPT
script(){
	fichier=$1
	# garde l'extention ou non
	if [ $extension -eq 0 ] ; then
		fichier=$(sed -nr 's/^([^/.]*).*/\1/p' <<< $1)
		extension_fichier=".sh"
	else
		extension_fichier=""
	fi

	# teste si le fichier est vide
	if [ -z $fichier ] || [ $fichier = "" ] ; then
		show_error_miss
	fi

	# supprime et écrit le nouveau fichier
	rm -f $fichier
	touch $fichier
	if [ $? -eq 1 ] ; then
		show_error_cmd
	fi
	# applique les droits
	if [ -z $droit ] ; then
		chmod 700 $fichier
	else
		chmod $droit $fichier
	fi

	# le fichier devient un script
	if [ $chemin_bash -eq 0 ] ; then
		echo "#! /bin/bash" > $fichier
	fi

	# ajoute la signature
	if [ $signature -eq 0 ] ; then
		echo "# $fichier$extension_fichier" >> $fichier
	fi

	# ouvre le fichier
	if [ $ouvrir -eq 0 ] ; then
		# si on ne doit qu'ouvrir le premier, on change la variable
		if [ $ouvrir_premier -eq 0 ] ; then
			ouvrir=1
		fi
		# gedit $fichier &
	fi
	
}



### GESTIONNAIRES D'OPTIONS

# si pas de paramètre, affiche une erreur
if [ $# -eq 0 ] ; then
	show_error_miss
fi

for option in "$@" ; do
	case $option in
		# droit numérique
		-p*) 
		droit=$(sed -nr 's/^-p([0-7]{3}|[a-z\,+=-]{2,})$/\1/p' <<< $option);;
		
		# droit par chaîne de caractère
		--permissions=*) 
		droit=$(sed -nr 's/^--permissions=([0-7]{3}|[a-z\,+=-]{2,})$/\1/p' <<< $option);;
		
		
		# si indiqué, n'ouvre pas le fichier à la fin du processus
		-o)
		ouvrir=1;;
				
		# si indiqué, n'ouvre que le premier fichier parmis ceux donnés
		-O)
		ouvrir_premier=0;;
		
		# si indiqué, n'affiche pas le chemin "#! /bin/bash"
		-b)
		chemin_bash=1;;
		
		# si indiqué, n'affiche pas la signature du fichier dans le script (deuxième ligne)
		-s)
		signature=1;;
		
		# si indiqué, garde l'extension orignale du fichier ainsi que dans la signature
		-e)
		extension=1;;
		
		# affiche l'aide
		--help)
		show_help;;
		
		# affiche la version
		--version)
		show_version;;
		
				
		# les élements sans '-' sont des fichiers, on les stocke dans une variable
	
		[^-/]*)
		set $option
		for f in "$@" ; do
			# ajoute les fichiers, on les sépare par des ';' (IFS=";")
			fichiers="$fichiers$f;"
		done
		;;
	esac
done

if [ -z "$fichiers" ] ; then
	show_error_miss
fi

# une fois la lecture des paramètres effectué, on lance le script pour chaque fichier
while read f
do
	set $f
	for fichier in "$@" ; do
		script $fichier
	done
done <<< "$fichiers"





