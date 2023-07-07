# Att sätta upp en lokal utvecklingsmiljö
Den rekommenderade metoden är att använda Docker och Laravel Sail. Nedanstående är främst testat på Linux men bör därmed fungera med WSL 2.0 i Windows också. Det bör fungera för mac OS också.

## Docker

Du behöver ha dessa två verktyg installerade på din dator:
* Git
* Docker

1. Använd git för att hämta pythonlabbet-repot från github. 

2. Kopiera .env.copy till .env i `/src`. I filen .env kan du ändra/sätta lokala inställningar om det skulle behövas, bör dock inte behövas.

3. För att kunna använda [Laravel Sail](https://laravel.com/docs/10.x/sail#installing-sail-into-existing-applications) behöver du antingen installera PHP8.2 och composer lokalt (och köra `composer install --ignore-platform-reqs`), eller så kör du nedanstående kommando som använder Docker för att sätta upp Laravel med vendors-mappen. Arbeta från `/src`-foldern.

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

Om det uppstår problem i det här steget, prova att googla eller att starta en diskussion här på pythonlabbet-repot så försöker vi lösa det.

4. Om du är på Linux kan du börja med att sätta följande miljövariabler:

```
export APP_PORT=${APP_PORT:-80}
export APP_SERVICE=${APP_SERVICE:-"laravel.test"}
export DB_PORT=${DB_PORT:-3306}
export WWWUSER=${WWWUSER:-$UID}
export WWWGROUP=${WWWGROUP:-$(id -g)}
```
Det är inte alltid nödvändigt dock. Om du får problem med filrättigheter är de två sista särskilt viktiga att få rätt på. Om du får problmem med filrättigheter läs mer här: [Laravel sail issue 81](https://github.com/laravel/sail/issues/81)

Från `/src` bör du nu kunna köra följande kommando:

```./vendor/bin/sail up``` - starta upp alla docker containers (tar en flera minuter första gången)

```./vendor/bin/sail artisan migrate``` - skapar tabeller i databasen

```./vendor/bin/sail artisan command:seed``` - kör SeedDatabase.php som initialiserar databasen

```./vendor/bin/sail npm install --force``` - installerar node_modules

```./vendor/bin/sail npm run dev``` - skapar app.js och app.css

Nu ska det fungera att komma åt Pythonlabbet på [127.0.0.1](http://127.0.0.1)! Se nedan för att kunna använda `laravel.test` istället (ändra i hosts).

Senare räcker det att skriva
```./vendor/bin/sail up``` för att starta och sedan komma åt din lokala Pythonlabbet på [127.0.0.01](http://127.0.0.1)

Läs mer om [Laravel Sail](https://laravel.com/docs/8.x/sail)

### Test
Det finns ett antal Browser-tests som använder Dusk. Kör dem med `./vendor/bin/sail artisan dusk`. Du behöver köra `./vendor/bin/sail artisan dusk:install` först. 

Lägg också till `laravel.test` som en host för 127.0.0.1. På Linux/Mac görs ändras det i `/etc/hosts`. På Windows är det i `C:\Windows\System32\drivers\etc\hosts`. Lägg till följande rad:

`127.0.0.1 laravel.test`

## Andra metoder
För Mac OS finns [Laravel Valet](https://laravel.com/docs/8.x/valet) och för Windows/Linux finns [Laravel Homestead](https://laravel.com/docs/8.x/homestead).

En annan metod (troligen besvärligt) kan såklart vara att installera allt lokalt på sin dator också.