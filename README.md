# Curso platzi introduccion basic

Creacion proyecto 
```shell
composer create-project --prefer-dist laravel/laravel basic-new "6.*" 
```

Vinculacion autenticacion 

Bajar el paquete

```shell
composer require laravel/ui "1.x" 
```

```shell
php artisan ui bootstrap --auth
```

Creacion Model, Factory y controlador

```shell
php artisan m:model Post -mf
```

Complementos para slughable

```shell
composer require cviebrock/eloquent-sluggable "^6.0"
```

Ejecutar migraciones
```shell
php artisan migrate
```

Ejecutar seeder
```shell
php artisan db:seed
```


Backend para post 

```shell
php artisan m:cont Backend/PostController -r --model=Post
```


Validacion del post de la creacion 

```shell
php artisan make:request PostRequest
```


Creando un enlace simbolico desde storage a public

```shell
 php artisan storage:link
```


## Resultado del blog
!(Final)[./public/img/MsccK1oexE.gif]