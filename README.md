# php-proto-api
Super simple PHP restful API for quick prototyping

## Inspiration
So often I have an idea for an app or other system and need a simple CRUD API backend to test out the idea. I found I was playing with the Mongo or MySQL and the API more than I was playing with the idea. My goal was to write a really  simple API in simple PHP for prototyping, so I could get on with the playing with the idea rather than the technology around the idea.

The second idea is the whole API should be one file. I also needed the .htaccess, and a datafile (json) to hold the data.

The third idea is the system should be flexible and simple to hack. The code that makes up the API is as simple as I could make it. There are also the minimal amount of error and XSS checking in place.

## Disclaimer
This is not intended for production use. This is for fast prototyping and proof of concept work. If you need something for production, look into  http://www.slimframework.com or http://laravel.com/

## Config
The config is as simple as I could make it. The config() function contains the list of data files and a simple schema description. 

## Much More could be done
Yes, much more could be done, but that is up to you and your project needs. I plan to make updates / bug fixes to this, but only when the changes support the goal of making a quick / better prototyping system. i.e. This will never be a production ready API.


| Method | URL           | Action                                                          |
|--------|---------------|-----------------------------------------------------------------|
| GET    | /api/kitten   | Retrieves all kittens                                           |
| GET    | /api/kitten/2 | Retrieves kittens based on primary key                          |
| POST   | /api/kitten   | Adds a new kitten                                               |
| PUT    | /api/kitten/2 | Updates kitten based on primary key                             |
| DELETE | /api/kitten/2 | Deletes kitten based on primary key (who would want to do that) |
| GET    | /api          | List all endpoints                                              |
