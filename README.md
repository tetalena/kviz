# kviz
semestrální práce – Kvízy

## Instalace symfony-cli (nepovinné)
Dle `https://symfony.com/download` nainstalujeme aplikaci `symfony`.

## Příprava databáze Mysql
Pro kvízy vytvořte vlastní databázi a vlastního uživatele například pomocí nástroje phpMyAdmin. Následně v kořenové složce projektu vytvořte soubor `env.local` a vhodně nahraďte hodnoty v `{}`
```dotenv
DATABASE_URL="{řadič}://{uzivatel}:{heslo}@{adresa_server}:{port_serveru}/{databaze}?serverVersion={verze}"
```
Příklad
```dotenv
DATABASE_URL="mysql://kurz:tajne_heslo@127.0.0.1:3306/kurz?serverVersion=8"
```

Následně databázi nainstalujeme/aktualizujeme tak aby odpovídala aktuálnímu stavu Kvízu. Příkaz je nutné potvrdit po varování o potencionálních změnách, které mohou vyústit ve ztrátu dat (yes).
```shell
php bin/console doctrine:migrations:migrate
```

## Spuštění stránky Kvízy (nepovinné)
V kořenovém adresáři projektu spustíme vývojový HTTP server pomocí aplikace `symfony`.
```shell
symfony serve -d
```
Adresu k přístupu ke Kvízu symfony po spuštění serveru vypíše. Typicky se bude jednat `http://127.0.0.1:8000`.HTTP server se pustí jako "démon" (na pozadí). Jeho vypnutí můžeme provést příkazem:
```shell
symfony server:stop
```

## Administrace
Aplikace obsahuje chráněnou administrátorskou část pro správu Kvízů. Otázek a Odpovědí na adrese `/admin`. Pro přístup do administrační částí je nutné vytvořit běžného uživatele (například pomocí registračního formuláře na stránce) a následně upravit danému uživateli v databázi vlastnost `roles` na `["ROLE_ADMIN"]` (například pomocí phpMyAdmin).
