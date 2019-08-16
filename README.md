# Testning
Kvalitetssäkring.
Röd -> Grön -> Refaktor

## PHPUnit
https://phpunit.de/getting-started/phpunit-8.html

Vi kommer att göra detta med WSL.
Så du behöver köra följande.

    sudo apt install composer
    sudo apt install phpunit

    git clone <det här repot>

    cd <repo>

    composer install

Du är nu redo för att köra ett test. För att köra det så använder du

    phpunit --bootstrap vendor/autoload.php tests/TicketTest

### Röd -> Grön
När du kör testet kommer detta att returnerna rött, dvs. att alla dina test misslyckas.
Första steget i ditt arbete blir då att försöka få testet att lyckas, dvs. bli grönt.

I det här stadiet är målet enbart att din kod ska returnera grönt.

Gröna tester? Snyggt jobbat.

### Refaktor
När dina tester är gröna så är det dags att stända upp koden och arbeta om den.
Syftet med detta är att förbättra koden, läsbarhet och kvalitet.

Så i det här steget omarbetar du din kod med syftet att den ska förbättas men fortfarande returnera grönt.

## Länkar
* https://phpunit.readthedocs.io/en/8.3/
* https://www.codecademy.com/articles/tdd-red-green-refactor