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
+ mezi číslem a značkou, např. 50 %, § 23, # 26, * 1921, † 2000,


## Instalace pomocí composeru

```
composer require bicepsdigital/linebreak
```

(pokud nechcete použít composer, stačí stáhnout repozitář a na všechny soubory v složce src udělat include)

## Zdroje
+ [1] [Zalomení řádků a nevhodné výrazy na jejich konci](http://prirucka.ujc.cas.cz/?id=880)