# Att sätta upp en lokal utvecklingsmiljö
Den rekommenderade metoden är att använda Docker och Laravel Sail. 

## Docker

Du behöver ha dessa två verktyg installerade på din dator:
* Git
* Docker

1. Använd git för att hämta pythonlabbet-repot från github. 

2. För att kunna använda [Laravel Sail](https://laravel.com/docs/10.x/sail#installing-sail-into-existing-applications) behöver du antingen installera PHP8.2 och composer lokalt (och köra `composer install --ignore-platform-reqs`), eller så kör du nedanstående kommando som använder Docker för att sätta upp Laravel med vendors-mappen. Arbeta från `/src`-foldern.

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

Om det uppstår problem i det här steget, prova att googla eller att starta en diskussion här på pythonlabbet-repot så försöker vi lösa det.

3. Från `/src` bör du nu kunna köra följande kommando:

`./vendor/bin/sail artisan migrate` - skapar tabeller i databasen

`./vendor/bin/sail artisan command:seed` - kör SeedDatabase.php som initialiserar databasen

`./vendor/bin/sail npm install --force` - installerar node_modules

`./vendor/bin/sail npm run dev` - skapar app.js och app.css

Nu ska allt vara klart och du kan köra

`./vendor/bin/sail up` för att starta och sedan komma åt din lokala Pythonlabbet på [0.0.0.0](http://0.0.0.0)

Läs mer om [Laravel Sail](https://laravel.com/docs/8.x/sail)

## Andra metoder
För Mac OS finns [Laravel Valet](https://laravel.com/docs/8.x/valet) och för Windows/Linux finns (Laravel Homestead)[https://laravel.com/docs/8.x/homestead].

En annan metod (troligen besvärligt) kan såklart vara att installera allt lokalt på sin dator också.