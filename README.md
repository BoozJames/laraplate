<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://jamesbooz.com/wp-content/uploads/2023/11/jamesbooz-logo.png.webp" width="150" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web framework known for its elegant syntax, making development enjoyable. It simplifies common web tasks, making it accessible and powerful for large projects. With extensive documentation and Laracasts' video tutorials, learning Laravel is straightforward, whether through the Laravel Bootcamp or Laracasts' comprehensive library, covering Laravel, PHP, unit testing, and JavaScript.

#### Requirements    

> Node Version: = 21.6.1   
> PHP Version: => 8.2.10    
> Postgresql => 16 (PGAdmin 4)

#### VSCode Extensions (Optional)

> Peacock (John Papa)   
> Restore Terminal (Ethan Sarif-Kattan)

## How to Setup  

1. Go to the project directory and run the following commands  

> `composer install`    
> `npm i`   

2. Generate the key and run the migrations

> `cp .env-example .env`    
> `php artisan key:generate`    
> `php artisan migrate` 

3. Fill-out the user in the `.env`, this will be your initial account

> SYS_USERNAME=   
> SYS_PASSWORD=  
> SYS_FULLNAME=  
> SYS_EMAIL=     
> SYS_ROLE=  

(Optional) You may also use the custom command. See the Console/Commands for the detailed code.

> `php artisan refresh:db`  
> `php artisan clear:cache`

## Contributing

> <strong>Master</strong> - main branch   
> <strong>Develop</strong> - always use this to check out into feature branch  
> <strong>Feature/Branch-Name</strong> - this is your working branch

## License

This project was created using the Laravel framework, it is open-sourced software licensed under the MIT license. [MIT license](https://opensource.org/licenses/MIT).