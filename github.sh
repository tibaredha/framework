#!/bin/sh

# get user name
# username=`git config user.name`
# if [ "$username" = "" ]; then
    # echo "Could not find username, run 'git config --global user.name 'tibaredha'"
    # invalid_credentials=1
# else 
	# echo $username	
# fi


# get repo name
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
    ;;
esac

# create repo
echo "Creating Github repository '$reponame' ..."
curl -u "tibaredha:git030570" https://api.github.com/user/repos -d '{"name":"'$reponame'"}'
echo " done."

# create empty README.md
echo "Creating README ..."
touch README.md
echo " done."

# push to remote repo
echo "Pushing to remote ..."
git init
git add README.md
git commit -m "first commit"
git remote add origin git@github.com:tibaredha/$reponame.git
git push -u origin master
echo " done."
