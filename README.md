# O aplikácií

Aplikácia vznikla kvôli predmetu Vývoj aplikácií pre intranet a internet (VAII). Aplikácia bola myslená ako jednoduchá aplikácia pre zdieľanie článkov o doprave z iných
web stránok. Komunita nadšencov by tieto články pridávala a spravovala.

# Ako aplikácia funguje

Pre zobrazenie existujúcich príspevkov nie je nutné nič robiť. Stačí sa prepnúť na kategóriu, ktorá vás zaujíma a budete vidieť najnovšie články. Alebo keď
vás zaujímajú všetky články, tak tie sa nachádzajú celkom vpravo. po kliknutí na kategóriu "Diaľnice" alebo "Rýchlostné cesty" sa zobrazí progres, ako veľmi
sú diaľnice a rýchlostné cesty aktuálne dokončené. (Zdrojom údajov je Wikipédia)

Pri kliknutí na jednotlivú kategóriu, ktorú má post zobrazenú je možné sa dostať len na články, ktoré sú k tej téme priradené.

Každý používateľ si môže vytvoriť konto kliknutím na **"Prihlásiť sa"** vpravo hore. Registrácia prebieha jednoducho. Je nutné len zadať meno a heslo. Pre predídenie spamu
a tak v budúcnosti nie je vylúčené nutné overenie e-mailu. Keď konto s daným menom existuje **nebudete sa vedieť prihlásiť**, pretože dané meno sa už v databáze nachádza.

Jednotliví používatelia po prihlásení vedia pridávať nové príspevky. Používatelia ďalej vedia príspevky aj označovať ako užitočné.

**Jedine admin má však práva príspevky upravovať alebo vymazať.** Po prvotnom testovaní bude rozhodnuté, či toto právo dostanú aj jednotliví používatelia.

Pri pridávaní/edite príspevku je jediným obmedzením dátum, ktorý nesmie byť v budúcnosti, pretože články sú väčšinou pridávané v aktuálny deň. Je taktiež obmedzené
pridávanie článkov s rovnakou URL, aby používatelia nepridali rovnaký článok viac krát.

Pokiaľ máte nejaké nápady alebo narazíte na chybu, neváhajte a dajte nám to vedieť na [info@dopravanaslovensku.sk](mailto:info@dopravanaslovensku.sk).

# O použitom frameworku

Tento framework vznikol na podporu výučby predmetu Vývoj aplikácií pre intranet a intrenate (VAII)
na [Fakulte informatiky a riadenia](https://www.fri.uniza.sk/) [Žilinskej univerzity v Žiline](https://www.uniza.sk/) Wiki stránky frameworku [tu](https://github.com/thevajko/vaiicko/wiki/00-%C3%9Avodn%C3%A9-inform%C3%A1cie).

# Vlatné spustenie aplikácie

Vytvorte si kópiu tohto adresára, spustite docker a následne inicializáciu databázy. Do databázy sa pridajú všetky diaľnice, rýchlostné cesty, 
cesty I. a II. triedy a nejaké základné kategórie. Taktiež sa vytvoria nejaké príspevky.

Framework ma v adresári `<root>/docker` základnú konfiguráciu pre spustenie a debug web aplikácie. Všetky potrebné služby sú v `docker-compose.yml`. Po ich spustení sa vytvorí:

- __WWW document root__ je nastavený adresár riešenia, čiže web bude dostupný na adrese [http://localhost/](http://localhost/). Server má pridaný modul pre
  ladenie móde" (`xdebug.start_with_request=yes`).
- webový server beží na __PHP 8.2__ s [__Xdebug 3__](https://xdebug.org/) nastavený na port __9003__ v "auto-štart" móde
- PHP ma doinštalované rozšírenie __PDO__
- databázový server s vytvorenou _databázou_ a tabuľkami `messages` a `users` na porte __3306__ a bude dostupný na `localhost:3306`. Prihlasovacie údaje sú:
    - MYSQL_ROOT_PASSWORD: db_user_pass
    - MYSQL_DATABASE: databaza
    - MYSQL_USER: db_user
    - MYSQL_PASSWORD: db_user_pass
- phpmyadmin server, ktorý sa automatický nastavený na databázový server na porte __8080__ a bude dostupný na
  adrese [http://localhost:8080/](http://localhost:8080/)

