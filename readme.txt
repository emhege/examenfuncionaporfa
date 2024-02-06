***********
Ejemplo CI con github actions.
Utililzamos composer para instalar phpunit (composer require --dev symfony/test-pack)
Ignoramos vendor/
Creamos nuestro yml: clonamos, usamos action para composer y ejecutamos phpunit a través de la instalación que ha hecho en vendor
