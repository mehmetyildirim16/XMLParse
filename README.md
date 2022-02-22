

## The XML Parser Application

To start the application, run the following command:

- First clone the repository:
- Run "composer install"
- Run "php artisan serve"
- Open http://localhost:8000/ to see the application

To  test the application:
- Run "php artisan test"

To see the application in action:
- Fire a post request to http://localhost:8000/api/ with the following parameters:
    - "url" = "the url of the feed you want to parse",
    - "node" = "the repetitive node name you want to parse",

## The Duplicate City Clearing
- For this task I created a json file with corruted data
- In the solution, I read the corrupted data, clear out the sounds and return correct json values
- For simplicity I used the same project and repository for both tasks
- The solution is in the root of the project. /removeduplicate.php
- To test the solution, run: php removeduplicate.php 
