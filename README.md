# Daily mail generator
A daily mail generator built on top of Symfony4. On a REALLY early stage. to be coded.

- [x] Docker conf
- [x] Initial commit
- [x] Basic CRUD for developper entity (make:crud)
- [ ] Finish Developper entity
- [ ] Create Project entity
- [ ] Add Trello configuration
- [ ] Add Google Sheet configuration
- [ ] Make the magic happen

# How to build environment

Run 
``
docker-compose build
``

Then
``
docker-compose up
``

Don't forget to add vagrant ip to your host
``
sudo echo "0.0.0.0    dailymail.vm" >> /etc/hosts
``

Then you can install composer inside symfony (php container)

``
docker-compose exec php bash
``

``
composer install
``

# Cheat sheet


Run php bash
``
docker-exec php bash
``


Run mysql
``
docker-exec db mysql -uroot -proot
``
