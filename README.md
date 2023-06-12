## Description
Rest API Video Content Challenge
## Requirements

- [PHP](https://www.php.net/) V 8.2
- [Composer](https://getcomposer.org/) (Tool dependency manager for PHP)
- [Git](https://git-scm.com/) (Distributed version control system)

## INSTALLATION

Before installing, check if you already have one of the components installed by typing:
```bash
php -v
```
```bash
composer -V
```
```bash
git -v
```
In case you don't, you can use [Homebrew](https://brew.sh/) (package manager for Mac) to install all requirements.

During all the next steps you need to copy & paste the commands and run them in order in your terminal.
1. To install Homebrew:
```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```

2. To install PHP:
```bash
brew install php
```

3. To install Composer:
```bash
brew install composer
```

3. To install Git:
```bash
brew install git
```
4. Clone this repo in your preferred directory:
```bash
git clone https://github.com/JCVillegas/VideoStore.git
```

5. **cd** into the VideoStore directory and copy the contents of the env.example file, into a new .env file:
```bash
cp .env.example .env
```
6. Inside the VideoStore directory run composer:
```bash
composer install
```
7. Inside the VideoStore directory  initiate the web server:
```bash
php artisan serve
```

8. Server will be running on: http://127.0.0.1:8000  

## INSTRUCTIONS

### FRONT END
You can use the frontend to navigate the web page:
- Home page: http://127.0.0.1:8000  
- View movie cards and add a Like: http://localhost:8000/movieCards 
- Add a movie: http://localhost:8000/addMovie


### API ENDPOINTS
You can use the api to perform certain actions:

- Add a movie:
```bash
curl --location 'http://localhost:8000/api/movie' \
--header 'Content-Type: application/json' \
--data '{"title": "This is the best movie name."}'
```
- Get all movies:
```bash
curl --location 'http://localhost:8000/api/movies'
```

### BONUS ENDPOINTS
- Add movie like:
```bash
curl --location --request POST 'http://localhost:8000/api/movie/likes?movieId=123456'
```
- Delete all movies:
```bash
curl --location --request DELETE 'http://localhost:8000/api/movies'
```

