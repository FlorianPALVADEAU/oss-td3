# Get Cities Data 🔥

This library is made to retrieve data from the "annuaire des mairies"'s website of the Yvelines.' 

## Installation

```bash
    composer install
```

```bash
    php vendor/bin/phpstan analyze src --level=max
```

```bash
    php vendor/bin/phpunit tests
```
## How to retrieve all the cities name and population ?


```bash
    php build/index.php
```
## How to retrieve the city with the highest population ?

go in the build/index.php file, then replace the `$scrapping->getCitiesAndPopulation()` by `$scrapping->getMaxPopulation()`.

Then

```bash
    php build/index.php
```
