# LineBreak

Knihovna pro vkládání nedělitelných mezer do českých souvětí.

[![Build Status](https://travis-ci.org/bicepsdigital/linebreak.svg?branch=master)](https://travis-ci.org/bicepsdigital/linebreak)
[![Coverage Status](https://coveralls.io/repos/github/bicepsdigital/linebreak/badge.svg?branch=master)](https://coveralls.io/github/bicepsdigital/linebreak?branch=master)
[![CodeCov](https://codecov.io/gh/bicepsdigital/linebreak/branch/master/graph/badge.svg)](https://codecov.io/gh/bicepsdigital/linebreak)
[![Packagist](https://img.shields.io/packagist/v/bicepsdigital/linebreak.svg)](https://packagist.org/packages/bicepsdigital/linebreak)

Použití:

```php
LineBreak::parse("Proti švédským hokejistům bude chytat v sobotu Furch");
```

Vrátí: ```"Proti švédským hokejistům bude chytat v&nbsp;sobotu Furch"```

Snaha o implementování  funkcionality z [1].

## Implementovaná funkcionalita [1]
+ ve spojení neslabičných předložek k, s, v, z s následujícím slovem, např. k mostu, s bratrem, v Plzni, z nádraží,
+ ve spojení slabičných předložek o, u a spojek a, i s výrazem, který po nich následuje, např. u babičky, o páté,
+ pro členění čísel, např. 2 500, 1 000 000, 25,325 23,
+ mezi číslem a značkou, např. 50 %, § 23, # 26,  † 2000 **nefunguje * 1921**
+ mezi číslem a zkratkou počítaného předmětu nebo písmennou značkou jednotek a měn, např. 5 str., 8 hod., s. 53, č. 9, obr. 1, tab. 3, 100 m², 10 kg, 16 h, 19 °C, 1 000 000 Kč, 250 €,
+ mezi číslem a názvem počítaného jevu, např. 500 lidí, 365 dní, 10 kilogramů, 5. pluk, 8. kapitola **Nefunguje strana 2, tabulka 3, Karel IV., , II. patro.**
+ v kalendářních datech mezi dnem a měsícem, rok však **nelze** oddělit, např. 21. 6. 2013, 16. ledna 1972,
+ v měřítkách map, plánů a výkresů, v poměrech nebo při naznačení dělení, např. mapa v měřítku 1 : 50 000, poměr hlasů 5 : 3, 10 : 2 = 5,
+ v telefonních, faxových a jiných zvláštních číslech členěných mezerou, např. +420 800 123 987, 723 456 789, 800 11 22 33,
+ ve složených zkratkách, v ustálených spojeních a v různých kódech, např. a. s., s. r. o., mn. č., př. n. l.,


## Přidání zkratek
Není možné získat seznam všech zkratek použivaných v českém jazyce (některé jsou specifické pro uričtou doménu), proto je přidána funkce ``` Abbreviations::addAbbreviation ```, kde v parametru se předá pole, kde klíč je nahrazovaná zkratka a hodnota nahrazená zkratka, např::
```php

Abbreviations::addAbbreviation(array(
    'b. f. l.' => 'b.&nbsp;f.&nbsp;l.'
));

```

Hodnota nahrazeného slova je zde pro větší uchopitelnost, např. zkratka, která se uprostřed může zlomit atd.

## TODO
+ dodělat klasifikací římských číslic
+ předělat factory, aby brala kontext např: Jozef * 1991 vs 5 * 5

## Instalace pomocí composeru

```
composer require bicepsdigital/linebreak
```

## Zdroje
+ [1] [Zalomení řádků a nevhodné výrazy na jejich konci](http://prirucka.ujc.cas.cz/?id=880)