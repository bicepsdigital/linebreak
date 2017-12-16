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

Snaha o implementování  funkcionality z [Zalomení řádků a nevhodné výrazy na jejich konci](http://prirucka.ujc.cas.cz/?id=880)

## Implementovaná funkcionalita
+ Nedělitelné mezery se vkládají za předložky: k, s, z, v, o, u, a, i
+ Za číslem se vždy vkládá nedělitelná mezera



## Instalace pomocí composeru

```
composer require bicepsdigital/linebreak
```

(pokud nechcete použít composer, stačí stáhnout repozitář a na všechny soubory v složce src udělat include)