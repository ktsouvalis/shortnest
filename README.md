<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Endpoint call to register a user
```bash
curl -X POST 'http://your-domain.com/api/register' \
     -H "Content-Type: application/json" \
     -d '{"email": "newuser@example.com"}'
```

## Endpoint call to shorten a url
```bash
curl -X POST 'http://your-domain.com/api/shorten' \
     -H "Authorization: Bearer YOUR_ACCESS_TOKEN" \
     -H "Content-Type: application/json" \
     -d '{"original_url": "https://example.com"}'
```

## Endpoint call to see the details of all your urls
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

## Endpoint call to see the details of a shortened url
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

## Endpoint call to delete a shortened url
```bash
curl -X DELETE 'http://your-domain.com/api/shorten' \
     -H "Authorization: Bearer YOUR_ACCESS_TOKEN" \
     -H "Content-Type: application/json" \
```