<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About This Project

This project is a Laravel-based application for creating short urls

## Installation

### In your server's environment:

### Step 1: Clone the Repository

```sh
git clone https://github.com/ktsouvalis/shortnest.git
cd shortnest
```

### Step 2: Install Dependencies

```sh
composer install --no-dev
```

### Step 3: Set Up Environment Variables

Copy the example environment file and set up your environment variables:

```sh
copy .env.example .env
php artisan key:generate
```

Inside the `.env` file, set your database connection details for your running MySQL Server,  your application's desired name,  your application's url.

### Step 4: Run Migrations

Run the database migrations to set up the necessary tables:

```sh
php artisan migrate
```

## Documentation
### 1. The user must be registered
```bash
curl -X POST 'http://your-domain.com/api/register' \
     -H "Content-Type: application/json" \
     -d '{"email": "newuser@example.com"}'
```
### 2. After registering, user must verify their email clicking on the link sent to the registered email.

### 3. Endpoints
#### 1. Shorten a url
```bash
curl -X POST 'http://your-domain.com/api/shorten' \
     -H "Authorization: Bearer YOUR_ACCESS_TOKEN" \
     -H "Content-Type: application/json" \
     -d '{"original_url": "https://example.com"}'
```

#### 2. Show the details of all user's urls
```bash
curl -X GET 'http://localhost:8000/api/urls' \
     -H "Authorization: Bearer YOUR_ACCESS_TOKEN"
```
```bash
curl -X GET 'http://localhost:8000/api/urls?api-token=YOUR_ACCESS_TOKEN'
```
You can also use your browser to see the details of all your URLs by visiting:
```
http://localhost:8000/api/urls?api-token=YOUR_ACCESS_TOKEN
```

#### 3. Show the details of a shortened url
```bash
curl -X GET 'http://localhost:8000/api/urls/your-url-id' \
     -H "Authorization: Bearer YOUR_ACCESS_TOKEN"
```
```bash
curl -X GET 'http://localhost:8000/api/urls/your-url-id?api-token=YOUR_ACCESS_TOKEN'
```
You can also use your browser to see the details of a shortened URL by visiting:
```
http://localhost:8000/api/urls/your-url-id?api-token=YOUR_ACCESS_TOKEN
```

#### 4. Delete a shortened url
```bash
curl -X DELETE 'http://your-domain.com/api/shorten' \
     -H "Authorization: Bearer YOUR_ACCESS_TOKEN" \
     -H "Content-Type: application/json" \
```

<p><i><small>All routes are protected to interact only with the token authenticated user's Urls</small></i></p>

## License

The project is licensed under the [MIT license](https://opensource.org/licenses/MIT).