Conway's Game of Life
=====================

PHP implementation of Conway Game of Life with CLI visualization of cells changing. 
The script launch a 20x20 random matrix with 100 ticks.

# Requirements
- PHP 7.3
- Docker - [https://www.docker.com/](https://www.docker.com/) - In case of docker usage
- Composer - [https://getcomposer.org/](https://getcomposer.org/) - In case of no docker usage

# Using Docker

## Runnig the application on

- Windows (PowerShell)

`docker run --rm -v ${PWD}:/app composer start`

- Linux

`docker run --rm -v $PWD:/app composer start`

## Running the tests on

- Windows (PowerShell)

`docker run --rm -v ${PWD}:/app composer tests`

- Linux

`docker run --rm -v $PWD:/app composer tests`

# Without DOCKER

## Runinig the application with

- Windows (PowerShell)

`composer start`

- Linux

`composer start`

## Running the tests with

- Windows (PowerShell)

`composer tests`

- Linux

`composer tests`

## About the game

* ES - [https://es.wikipedia.org/wiki/Juego_de_la_vida](https://es.wikipedia.org/wiki/Juego_de_la_vida)
* EN - [https://en.wikipedia.org/wiki/Conway%27s_Game_of_Life](https://en.wikipedia.org/wiki/Conway%27s_Game_of_Life)
