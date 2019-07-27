



## Setup (laravel 5.8)

1.  Firstly, setup wamp, lamp or xampp to your machine and run it
2.  create database `xfilms-test` to localhost
3.  Download [composer](https://getcomposer.org/download/) if they are not already on your machine.
4.  Rename `.env.example` file to .env inside your-project-root/xfilms-test and fill the database information (windows wont let you do it, so you have to open `.env.example` into editor and save as `.env` in same directory ).
4.  Open the console and `cd server-path/your-download-project/xfilms-test` directory ex `C:\xampp\htdocs\xfilms-test`
5.  Run `composer install`
6.  Run `php artisan key:generate` 
7.  Run `php artisan config:clear`
8.  Run `php artisan config:cache`
9.  Run `php artisan migrate`
10. Run `php artisan db:seed` (to run seeders)
11. Run `php artisan passport:install` ( for more help: https://laravel.com/docs/5.8/passport#installation)

## It is mixture of Laravel Forms for Web and APIs

## User Register API:  
`API_URL: http://localhost/xfilms-test/api/v1/register
METHOD: POST
REQUEST_TYPE: JSON
PARAMS: 
{
"name":"test",
"password":"123456",
"email":"test@test.com"
}

SAMPLE_RESPONSE_DATA: 
{
    "data": {
        "token_type": "Bearer",
        "expires_in": 31622398,
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImM1YzdkZWI3ZDdiYTZmOWRhMjk1ZTczNjk1YzI2OWU2YzdmYTJlMTJlOGJhY2I3ZTFjY2Y0ZTVjZjZiZTk2MjEyMDUwNTNjMzdlOTA1YjdjIn0.eyJhdWQiOiIyIiwianRpIjoiYzVjN2RlYjdkN2JhNmY5ZGEyOTVlNzM2OTVjMjY5ZTZjN2ZhMmUxMmU4YmFjYjdlMWNjZjRlNWNmNmJlOTYyMTIwNTA1M2MzN2U5MDViN2MiLCJpYXQiOjE1NjQwMzI1NzYsIm5iZiI6MTU2NDAzMjU3NiwiZXhwIjoxNTk1NjU0OTc1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.ZtxZzeRHRgOPyyPRpsbGvxWe928ZHKQXWDMymvBafqVBJ1jU_y58wcaGN1P2GbylsnVEPIS2GEJJw-ReeqLTIW2z6cFlAT8exz8N8CwbeOXDJpnuLw0RSoX3cWS1MgReshFqHAED0vXcmdxUy4bcYEmCMvZlwFsPES-E93ecTSokHrKNPct1hKpeJ1lS6LZMEh3kwiKOj3ayl_1xXnNhTv7uEtdRJbuQvTTsO6pa1ofyaJFg5PqzfSeXHh2aIeo0uQydhEcIk0Ti-o0w74HhA81VE5CU-YEQaQmnMe-yn913ngzjlp7_kWpF3FheMhnPjLEtiILAovI9h6dm_RcEvNO2h25PZE6OFxJkkRG7cmP6cgnoUnClqFV_l-hBaoyfbrizHLRG_kr_ZezNdZMvrvfqQasjjutldKZM5yVYQBVO1x3NNrF41O6gFOffquwoNuiV_rka5mo8mt6DKhft2UWuobxqfz9swy7YSe8NLG9JekNzxyK_3mNx5abA9dBZcObbTrBPVYf5ThbrX6cS-2x_S4CePjX4rxMaV9dInpojq0EXOVytay1CVh78cqKAMnOvr5CJdcDQo3cN4CKUQ_cLtIgSJh9gUOHs-eyaHs8zllaRPBqqqkA9QuEKhF0Y3GcZBf7DhQ_CG9BVLapgZjoY6zFjirdZlRkb4ML17vU",
        "refresh_token": "def502006e9c702314ae547c189efa5f886bbab98334169b320aec7575996e36b5f15f06bf508b0cbf928312029fd798390d01fc72b895e490f7e8a8c9dd7ee6b68d755571afead73a4b8a91cdfda45c97f3ba3ce101f2476081c4acf42820959280de9fb279d01c30433c9b45bffabe08d45b23055a727fb2864de398681c95345ec8fcebd1a42f8f7074f6f8ebc78cb1b7352cb7ab0afe2988f770f579accd75662a9114baa8f76765eb77a7d41bceec7d633f4dcb03294ff95e132091cce2af78d3bf7eef8d95a6b134c3f6b44b3e908aeeda3d98b053f6573030f02161868b70f679883960c0ffb77cca84bb85c43dafddef7269dedb536cb4d79272939ea1b01a9eca9c04662d4adb0642b8787aa7e212b495662d24348d56544524d77170d083581d5361a9113ca3f928091d6b3832e3ed80e1a9c17336ba604ab7d591e88c6a90800d26c6cb0f8c6641735abb69573e1c8c0cffc4798e78f4e0762089ba",
        "user": {
            "user_id": 1,
            "name": "test",
            "email": "test@test.com"
        }
    },
    "status": 200
}
`

## User Login API:  
`API_URL: http://localhost/xfilms-test/api/v1/login
METHOD: POST
REQUEST_TYPE: JSON
PARAMS: 
{ 
"password":"123456",
"email":"test@test.com"
}

SAMPLE_RESPONSE_DATA: 
{
    "data": {
        "token_type": "Bearer",
        "expires_in": 31622398,
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImM1YzdkZWI3ZDdiYTZmOWRhMjk1ZTczNjk1YzI2OWU2YzdmYTJlMTJlOGJhY2I3ZTFjY2Y0ZTVjZjZiZTk2MjEyMDUwNTNjMzdlOTA1YjdjIn0.eyJhdWQiOiIyIiwianRpIjoiYzVjN2RlYjdkN2JhNmY5ZGEyOTVlNzM2OTVjMjY5ZTZjN2ZhMmUxMmU4YmFjYjdlMWNjZjRlNWNmNmJlOTYyMTIwNTA1M2MzN2U5MDViN2MiLCJpYXQiOjE1NjQwMzI1NzYsIm5iZiI6MTU2NDAzMjU3NiwiZXhwIjoxNTk1NjU0OTc1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.ZtxZzeRHRgOPyyPRpsbGvxWe928ZHKQXWDMymvBafqVBJ1jU_y58wcaGN1P2GbylsnVEPIS2GEJJw-ReeqLTIW2z6cFlAT8exz8N8CwbeOXDJpnuLw0RSoX3cWS1MgReshFqHAED0vXcmdxUy4bcYEmCMvZlwFsPES-E93ecTSokHrKNPct1hKpeJ1lS6LZMEh3kwiKOj3ayl_1xXnNhTv7uEtdRJbuQvTTsO6pa1ofyaJFg5PqzfSeXHh2aIeo0uQydhEcIk0Ti-o0w74HhA81VE5CU-YEQaQmnMe-yn913ngzjlp7_kWpF3FheMhnPjLEtiILAovI9h6dm_RcEvNO2h25PZE6OFxJkkRG7cmP6cgnoUnClqFV_l-hBaoyfbrizHLRG_kr_ZezNdZMvrvfqQasjjutldKZM5yVYQBVO1x3NNrF41O6gFOffquwoNuiV_rka5mo8mt6DKhft2UWuobxqfz9swy7YSe8NLG9JekNzxyK_3mNx5abA9dBZcObbTrBPVYf5ThbrX6cS-2x_S4CePjX4rxMaV9dInpojq0EXOVytay1CVh78cqKAMnOvr5CJdcDQo3cN4CKUQ_cLtIgSJh9gUOHs-eyaHs8zllaRPBqqqkA9QuEKhF0Y3GcZBf7DhQ_CG9BVLapgZjoY6zFjirdZlRkb4ML17vU",
        "refresh_token": "def502006e9c702314ae547c189efa5f886bbab98334169b320aec7575996e36b5f15f06bf508b0cbf928312029fd798390d01fc72b895e490f7e8a8c9dd7ee6b68d755571afead73a4b8a91cdfda45c97f3ba3ce101f2476081c4acf42820959280de9fb279d01c30433c9b45bffabe08d45b23055a727fb2864de398681c95345ec8fcebd1a42f8f7074f6f8ebc78cb1b7352cb7ab0afe2988f770f579accd75662a9114baa8f76765eb77a7d41bceec7d633f4dcb03294ff95e132091cce2af78d3bf7eef8d95a6b134c3f6b44b3e908aeeda3d98b053f6573030f02161868b70f679883960c0ffb77cca84bb85c43dafddef7269dedb536cb4d79272939ea1b01a9eca9c04662d4adb0642b8787aa7e212b495662d24348d56544524d77170d083581d5361a9113ca3f928091d6b3832e3ed80e1a9c17336ba604ab7d591e88c6a90800d26c6cb0f8c6641735abb69573e1c8c0cffc4798e78f4e0762089ba",
        "user": {
            "user_id": 1,
            "name": "test",
            "email": "test@test.com"
        }
    },
    "status": 200
}
 `
## Films API

 `API_URL:  http://localhost/xfilms-test/api/v1/films
METHOD: GET
REQUEST_TYPE: JSON
SAMPLE_RESPONSE_DATA: 

{
    "data": {
        "films": {
            "current_page": 1,
            "data": {
                "0": {
                    "id": 1,
                    "slug": "frozen-land",
                    "name": "Frozen Land to animated movie",
                    "description": "Frozen Land",
                    "release_date": "2005-01-14",
                    "rating": 4,
                    "ticket_price": "$9",
                    "country": "USA",
                    "photo_url": "/xfilms-test/public/img/maxresdefault.jpg",
                    "created_at": null,
                    "updated_at": null,
                    "genres": [
                        {
                            "id": 7,
                            "name": "animation",
                            "created_at": null,
                            "updated_at": null,
                            "pivot": {
                                "film_id": 1,
                                "genre_id": 7
                            }
                        }
                    ]
                },
                "genres": "animation"
            },
            "first_page_url": "http://localhost/xfilms-test/api/v1/films?page=1",
            "from": 1,
            "last_page": 4,
            "last_page_url": "http://localhost/xfilms-test/api/v1/films?page=4",
            "next_page_url": "http://localhost/xfilms-test/api/v1/films?page=2",
            "path": "http://localhost/xfilms-test/api/v1/films",
            "per_page": 1,
            "prev_page_url": null,
            "to": 2,
            "total": 4
        }
    },
    "status": 200
}
`




<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>
 
<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1400 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
