#! /bin/ksh

docker ps -a

echo -e "\033[1;32mType Container ID\033[0m"
read  word

yes="y"
no="n"

echo -e "\033[1;33mStopping the docker container...\033[0m"
docker stop $word
echo -e "\033[1;33mDeleting the docker container...\033[0m"
docker rm $word
docker image ls

echo -e "\033[1;32mDo you want to clean non tag images? [y/n]\033[0m"
read ans
if [ ${yes} = $ans ]; then
    docker rmi $(docker images -f "dangling=true" -q)
    echo -e "\033[1;31mNone tagged images are deleted.\033[0m"
fi

echo -e "\033[1;32mType Tag name\033[0m"
read tname
echo -e "\033[1;33mBuilding new docker image...\033[0m"
docker build --tag $tname .
echo -e "\033[1;33mRunning docker container...\033[0m"
docker run -d -p 80:80 $tname
docker ps -a
