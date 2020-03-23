#!/bin/bash

################################################################
#index.sh                                                      #
#aide git a executer les commandes plus rapidement             #
#auteur tiba redha                                             #
#historique                                                    #
################################################################

# {=123  |=124  }=125  ~=126  <=60  ==61 >=62  ?=63 @=64  
################################################################
author="redha tiba"
script=`basename $(pwd)`
version="1.0.0"
annee=2020
username="tibaredha"
useremail="tibaredha@yahoo.fr"

# COLOR
DARKGRAY='\033[1;30m'
RED='\033[0;31m'
LIGHTRED='\033[1;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
PURPLE='\033[0;35m'
LIGHTPURPLE='\033[1;35m'
CYAN='\033[0;36m'
WHITE='\033[1;37m'
DEFAULT='\033[0m'
ORANGE='\033[1;33m'
SUM='\033[1;36m'
HEADER='\033[1;36m'
HIGHLINE='\033[7;37m'
NC='\033[0m'

#exec vim "$@"
##########################################################################
# MESSAGES : message d'aide
show_help(){
	echo  "+---------------|-----------------------------------------+"
	# echo "Utilisation: $0 [EXTENSIONS]"
	# echo "Additionneur de ligne de code de vos projets"
	# echo  "+---------------|-------|--------------------------------+"
	#Configuration
	echo -e "| --version,  \t afficher des informations de version     |"
	echo -e "| --cfg       \t git init (-gh)*create remote repository  |"
	echo -e "| --ssh       \t set ssh key                              |"
	echo -e "| --ignore    \t add .gitignore                           |"
	echo -e "| --listdir   \t afficher list des dossiers               |"
	echo -e "| --listpath  \t afficher list path                       |"
	echo -e "| --help,     \t afficher l'aide                          |"
	#importe un projet  ou clone le projet d'xy 
	echo -e "| --cl,       \t git clone                                |" 
	echo  "+---------------|-----------------------------------------+"
	#Faire des modifications
	echo -e "| -st,       \t git status                               |"
	echo -e "| -ac,       \t git add + commit                         |"
	echo -e "| -at,       \t git tag -a -m                            |"
	#Voir l'historique
	echo -e "| -lo,       \t git log --oneline                        |"
	#Gérer des branches /tags
	echo -e "| -rv        \t git remote -v                            |"
	echo -e "| -po,       \t git push origin master                   |"
	echo -e "| -pl,       \t git pull origin master                   |"
	echo  "+---------------|-----------------------------------------+"
	exit 0
}
##########################################################################
# MESSAGES : message de version
show_version(){
	echo -e "+---------------|-------|-----------------------------------+"
	echo -e "|(Script tools) $version                                       |"
	echo -e "|                                                           |"
	echo -e "|Copyright © $annee $author.                               |"
	echo -e "|                                                           |"
	echo -e "|Écrit par $author.                                      |"
	echo -e "+---------------|-------|-----------------------------------+"
	git --version
	exit 0
}
##########################################################################
# MESSAGES : message d'erreur
show_error_miss(){
	echo  "+--------------|-------|----------------------------------+"
	printf "|${GREEN}$0:${YELLOW}[EXTENSIONS]:Opérateur Non pris en charge !!! ${NC}|\n"
	# echo "Saisissez « $0 --help » pour plus d'informations."
	show_help
	echo  "+--------------|-------|-----------------------------------"
	exit 1
}

##########################################################################
clone_status(){
echo  "---------------|-------|-----------------------------------"
read -p "Do you want to clone this repository $script ? (y/n)" answerx
case $answerx in
  y)
	echo  "---------------|-------|-----------------------------------"
	# Check for $script Directory
	if [ ! -d $script ]; then
	   echo "/$script folder doesn't exist"
	   git clone git@github.com:$username/$script.git  $script
	   echo  "---------------|-------|-----------------------------------"
	   echo "/$script done"
	else
	   echo "/$script folder exist"
	fi
	echo  "---------------|-------|-----------------------------------"
	;;
  n)
    read -p 'git_repository_to_clone :' repo
	if [ ! -d $repo ]; then
	   echo "/$repo folder doesn't exist"
	   git clone git@github.com:$username/$repo.git  $repo
	   echo  "---------------|-------|-----------------------------------"
	   echo "/$repo done"
	else
	   echo "/$repo folder exist"
	fi
	echo  "---------------|-------|-----------------------------------"
    ;;
  *)
    ;;
esac
# read -p 'Do you want to clone this repository '$script' ? (y/n)' repo
# read -p 'git_repository_to_clone :' repo
# read -p 'dir_repository_to_clone :' direc
# git clone  git@github.com:tibaredha/framework.git  framework
# git clone /opt/git/projet.git   git clone file:///opt/git/projet.git  git clone ssh://utilisateur@serveur/projet.git 
}

##########################################################################
show_status(){
git status
}
##########################################################################
add_status(){
git add .
# echo "ajouter message : "
read -p 'ajouter message : ' msg
git commit -a -m "$msg"
}
##########################################################################
add_tag(){
read -p "Do you want to add tag? (y/n)" answer
case $answer in
  y)
    # show all tags
    git tag
    # add a new tag
    read -p "Tag Version: " tagVersion
    read -p "Tagging Message: " taggingMessage
    git tag -a $tagVersion -m "$taggingMessage"
    git push --tags
    # What's new in **** 3.0 (release date: Dec 29, 2012)
    # -------------------------------------------------------
	git tag > tag.txt
	;;
  n)
    ;;
  *)
    ;;
esac
}
##########################################################################
view_status(){
# echo "preciser le nombre de commit : "
read -p 'preciser le nombre de commit :' nbr
git log --oneline  -$nbr
}
##########################################################################
pull_status(){
echo  "---------------|-------|-----------------------------------"
read -p "Do you want to pull whith msg?(y/n): " answer_pull
case $answer_pull in
  y)
   git pull  
    ;;
  n)
	git pull --quiet
	;;
  *)
    ;;
esac
# git pull origin  develop
# git pull origin  master
# git fetch xxx
}
##########################################################################
push_status(){
echo  "---------------|-------|-----------------------------------"
read -p "Do you want to push whith msg?(y/n): " answer_push
case $answer_push in
  y)
   git push  
    ;;
  n)
	git push --quiet
	;;
  *)
    ;;
esac
# git push origin  develop
# git push origin  master
}
##########################################################################
config_status(){
git init              #--bare 
git config --local user.name "$username"
git config --local user.email "$useremail"
git config --local alias.co checkout
git config --local alias.br branch
git config --local alias.ci commit
git config --local alias.st status
echo  "---------------|-------|-----------------------------------"
echo "list configuration : "
echo  "---------------|-------|-----------------------------------"
git config --list
echo  "---------------|-------|-----------------------------------"
}
##########################################################################
remote_status(){

# git remote
echo  "---------------|-------|-----------------------------------"
git remote -v 
# git remote show origin
# git remote add xxx urlxx   git remote add proj_local /opt/git/projet.git
# git remote rename xxx  yyy
# git remote rm  xxx
echo  "---------------|-------|-----------------------------------"
read -p "Do you want to open the new repo page $script in browser?(y/n): " answer_browser
case $answer_browser in
  y)
    echo "Opening in a browser ..."
    start https://github.com/$username/$script
    ;;
  n)
	read -p 'git_repository_to_open :' repo
	echo "Opening in a browser ..."
    start https://github.com/$username/$repo
	;;
  *)
    ;;
esac
}

##########################################################################
list_status(){
list=($(ls))
echo  "---------------|-------|-----------------------------------"
for f in "${list[@]}";do
	if [[ -d $f ]]
	then	
		printf "|${YELLOW} $f  ${NC}\n"
	else
	    printf "|${WHITE} $f  ${NC}\n"
	fi
	sleep 1
	echo  "---------------|-------|-----------------------------------"
done
}
##########################################################################
show_listpath () {
echo  "---------------|-------|-----------------------------------"
#a revoir
# PATH=$PATH:.
# echo $PATH
# export PATH=$PATH:/home/user/mes_prog
# echo 'export PATH=$PATH:/home/user/mes_prog' >> /home/user/.bashrc
echo $PATH | tr : \\n
echo  "---------------|-------|-----------------------------------" 
}
##########################################################################
ssh_status (){
# Exit script on Error
set -e
# Check for SSH Directory
echo  "---------------|-------|-----------------------------------"
if [ ! -d ~/.ssh ]; then
   mkdir -p ~/.ssh/
   echo "/.ssh folder doesn't exist and it was created"
else
	echo "/.ssh folder exist"
fi
# Check for existence of passphrase
if [ ! -f ~/.ssh/id_rsa.pub ]; then
        ssh-keygen -t rsa -N "" -f ~/.ssh/id_rsa
        echo "Execute ssh-keygen --[done]"
else
	    echo "/.ssh/id_rsa.pub fille exist"		
fi
# Check for existence of authorized_keys and append the shared ssh keys
if [ ! -f ~/.ssh/authorized_keys ]; then
        touch ~/.ssh/authorized_keys
        echo "Create ~/.ssh/authorized_keys --[done]"
        chmod 700 ~/.ssh/authorized_keys
        cat ~/.ssh/id_rsa.pub >> ~/.ssh/authorized_keys
        echo "Append the public keys id_rsa into authorized keys --[done]"
        chmod 400 ~/.ssh/authorized_keys
        chmod 700 ~/.ssh/
fi
# Create user's ssh config it not exist
if [ ! -f ~/.ssh/config ]; then
        touch ~/.ssh/config
        echo "StrictHostKeyChecking no" > ~/.ssh/config
        echo "StrictHostKeyChecking no --[done]"
        chmod 644 ~/.ssh/config
fi
# Unset error on exit or it will affect after bash command ðŸ™‚
set +e
echo  "---------------|-------|-----------------------------------"
}
##########################################################################
addToGitignore () {
    # add filename to .gitignore
    printf "${YELLOW} Hit q for quit ${NC}\n"
    while :
    do
        read -p "Type file name to add to .gitignore: " filename
        # quit when
        if [ $filename = "q" ]
            then
                break
            else
                echo $filename >> .gitignore
        fi
    done

}

ignore_status(){
echo  "---------------|-------|-----------------------------------"
if [ ! -f  .gitignore  ]; then
	printf "${YELLOW} .gitignore doesn't exist  ${NC}\n"
echo  "---------------|-------|-----------------------------------"
	read -p "Do you want to add .gitignore? (y/n)" answer
	case $answer in
	  y)
		touch .gitignore
		addToGitignore
		;;
	  n)
		;;
	  *)
		;;
	esac
else
	printf "${YELLOW} .gitignore exist  ${NC}\n"
echo  "---------------|-------|-----------------------------------"
	read -p "Do you want to update .gitignore? (y/n)" answer
	case $answer in
	  y)
		addToGitignore
		;;
	  n)
		;;
	  *)
		;;
	esac		
fi
echo  "---------------|-------|-----------------------------------"
}

##########################################################################
if [ -z  $1  ]; then 
 show_error_miss
fi
##########################################################################
user_status(){
echo  "---------------|-------|-----------------------------------"
# get user name
username=`git config user.name`
if [ "$username" = "" ]; then
    echo "Could not find username, run 'git config --global user.name 'tibaredha'"
    invalid_credentials=1
else 
	echo $username	
fi
echo  "---------------|-------|-----------------------------------"
# get user email
useremail=`git config user.email`
if [ "$useremail" = "" ]; then
    echo "Could not find useremail, run 'git config --global user.email 'tibaredha@yahoo.fr'"
    invalid_credentials=1
else 
	echo $useremail	
fi
#pasword
echo  "---------------|-------|-----------------------------------"
}
github_status(){

user_status

dir_name=`basename $(pwd)`
read -p "Do you want to use '$dir_name' as a repo name?(y/n)" answer_dirname
case $answer_dirname in
  y)
    # use currently dir name as a repo name
    reponame=$dir_name
    ;;
  n)
    read -p "Enter your new repository name: " reponame
    if [ "$reponame" = "" ]; then
        reponame=$dir_name
    fi
    ;;
  *)
    exit 1
    ;;
esac

# create repo
echo "Creating Github repository '$reponame' ..."
curl -u "tibaredha:git030570" https://api.github.com/user/repos -d '{"name":"'$reponame'"}'
echo " done."

# create empty README.md
echo "Creating README ..."
touch README.md
echo "tibaredha" >> README.md
echo " done."

# push to remote repo
echo "Pushing to remote ..."
git init
git add README.md
git commit -m "first commit"
git remote add origin git@github.com:tibaredha/$reponame.git
git push -u origin master
echo " done."

echo "Opening in a browser ..."
start https://github.com/tibaredha/$reponame
}

##########################################################################
# SWITCHER
for option in "$@" ; do
	case $option in
	
        # git github_status
		-gh)
		github_status;;
		
		
		# git status
		-st)
		show_status;;
		
		# git add_status
		-ac)
		add_status;;
		
		# git add_tag
		-at)
		add_tag;;
		
		
		# git view_status
		-lo)
		view_status;;
		
		# git pull_status
		-pl)
		pull_status;;
		
		# git push_status
		-po)
		push_status;;
		
		# git remote_status
		-rv)
		remote_status;;
		
		# git ssh_status
		--ssh)
		ssh_status;;
		
		# git clone_status
		--cl)
		clone_status;;
		
		# git config_status
		--cfg)
		config_status;;
		
		# git ignore_status
		--ignore)
		ignore_status;;
		
		
		# affiche listpath
		--listpath)
		show_listpath;;
		
		
		# affiche l'aide
		--help)
		show_help;;
		
		# affiche la version
		--version)
		show_version;;
		
		# affiche la version
		--listdir)
		list_status;;
		
		# rien ne correspond
		*)
		show_error_miss;;
        # rien ne correspond
	esac
done
##########################################################################
# get user name
# username=`git config user.name`
# if [ "$username" = "" ]; then
    # echo "Could not find username, run 'git config --global user.name 'tibaredha'"
    # invalid_credentials=1
# else 
# echo $username	
# fi
# get repo name
# dir_name=`basename $(pwd)`
# read -p "Do you want to use '$dir_name' as a repo name?(y/n)" answer_dirname
# case $answer_dirname in
  # y)
    # reponame=$dir_name
    # ;;
  # n)
    # read -p "Enter your new repository name: " reponame
    # if [ "$reponame" = "" ]; then
        # reponame=$dir_name
    # fi
    # ;;
  # *)
    # ;;
# esac
# create repo
# echo "Creating Github repository '$reponame' ..."
# curl -u $username https://api.github.com/user/repos -d '{"name":"'$reponame'"}'
# echo " done."
#create empty README.md
# echo "Creating README ..."
# touch README.md
# echo " done."
# push to remote repo
# echo "Pushing to remote ..."
# git init
# git add -A
# git commit -m "first commit"
# git remote rm origin
# git remote add origin https://github.com/$username/$reponame.git
# git push -u origin master
# echo " done."

# open in a browser
# read -p "Do you want to open the new repo page in browser?(y/n): " answer_browser

# case $answer_browser in
  # y)
    # echo "Opening in a browser ..."
    # open https://github.com/$username/$reponame
    # ;;
  # n)
    # ;;
  # *)
    # ;;
# esac
##########################################################################


# shift $(($OPTIND - 1))

# DARKGRAY='\033[1;30m'
# RED='\033[0;31m'
# LIGHTRED='\033[1;31m'
# GREEN='\033[0;32m'
# YELLOW='\033[1;33m'
# BLUE='\033[0;34m'
# PURPLE='\033[0;35m'
# LIGHTPURPLE='\033[1;35m'
# CYAN='\033[0;36m'
# WHITE='\033[1;37m'
# DEFAULT='\033[0m'

# COLORS=($DARKGRAY $RED $LIGHTRED $GREEN $YELLOW $BLUE $PURPLE $LIGHTPURPLE $CYAN $WHITE )

# for c in "${COLORS[@]}";do
    # printf "\r $c tibaredha $DEFAULT "
    # sleep 1
# done



#$0,$1....$9, $#, $* et $@,

# -eq	==	Equal
# -ne	!=	Not equal
# -gt	>	Greater than
# -ge	>=	Greater than or equal
# -lt	<	Less than
# -le	<=	Less than or equal
# -z	== null	Is null


# FILES=/Users/tania/dev/*

# for file in $FILES
# do
    # echo $(basename $file)
# done


# for F in *
# do
	# if [[ -f $F ]]
	# then
		# echo $F: $(cat $F | wc -l)
	# fi
# done

#ls -all > tiba.txt
# mkdir mimi

#. ./myscript.sh    Notice the dot and space before the script name.

#cd mimi 

 # if [ ! -d "$HOME"/git-sources ]; then
    # mkdir "$HOME"/git-sources
# fi

# cd "$HOME"/git-sources || { printf "cd failed, exiting\n" >&2;  return 1; }

# printf "Gitsource: "
# read -r gitsource

# git clone "$gitsource"

# unset gitsource

# echo "Please choose from the options bellow"

# echo "1) Go back to your working directory"
# echo "2) Go to the 'git-sources' folder"

# read -r ans
# back="1"
# stay="2"
# if [ "$ans" = "$back" ]; then
      # cd - || { printf "cd failed, exiting\n" >&2; unset ans; return 1; }
# elif [ "$ans" = "$stay" ]; then
      # cd "$HOME"/git-sources || { printf "cd failed, exiting\n" >&2; unset ans; return 1; }
# fi

# unset ans

 # if [ $# -eq 0 ]; then     $#=nombre d' argument    $@ tous les arguments 
  # echo "oui = 0" 
 # else
  # echo "non != 0"  
 # fi

# read filename
# if [ -f $filename  ]; then
  # echo "oui this fille name "$filename" exist" 
 # else
  # echo "non this fille name "$filename" doesn't exist" 
 # fi