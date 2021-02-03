<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
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

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

Comandos usados para este proyecto

composer global require laravel/installer

# "castillo" el nombre del proyecto
laravel new castillo

cd castillo
code .

# Creamos la base de datos "castillo"   el archivo .env    que son las variables de entorno
utf8 spanish

#.env configurar el nombre de la base de datos "castillo"


composer require laravel/ui  

php artisan ui vue --auth

# esos 2 son muy necesarios para el sistema de autenticacion ya hecho



#se crean las tablas que ya estan preconfiguradas para el manejo del login
*****************************   php artisan migrate:refresh --seed 
php artisan migrate




	
##  ******************
# para los	que quieren hacer esto del servidor virtual, entraran por la siguiente direccion
localhost\castillo\public	

## esta parte ya no lo haremos, esto es para quienes convinaran larabel con Vuejs

 ((( # instalar las dependencias de javascript todas las que estan en package.json   ))))
((((   npm install ))))

 ((     #SIEMPRE que trabajo uso este comando
  ((    npm run watch
((
  ((    #agrego esta linea a webpack mix siempre cuidando la sintaxis creando un proxi con una url con live reload 
   ((   .browserSync('http://login.local/');

pero al no hacer estas instalaciones toca importar personalemente lo necesario para bootstrap 

	   bootstrap   css
				jquery
				js
   
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


## c:\Windows\System32\drivers\etc\hosts


	127.0.0.1       castillo.local
	::1             castillo.local	

	127.0.0.1       localhost
	::1             localhost
 
## c:\xampp\apache\conf\extra\httpd-vhosts.conf
 
    <VirtualHost *:80>
      DocumentRoot "C:/xampp/htdocs/castillo/public/"
      ServerName castillo.local
    </VirtualHost>

<VirtualHost *:80>
	DocumentRoot "C:/xampp/htdocs/"
	ServerName localhost
</VirtualHost>
	
	
#modelo
'tipo',
#registercontroler
'tipo' => $data['tipo'],
#migracion 
 $table->string('tipo')->nullable();
 
 # aremos un seed para incluir datos por defecto
php artisan make:seeder TodosSeeder
 
$this->call(TodosSeeder::class);

use App\Models\User;
use Illuminate\Support\Facades\Hash;

$useradmin=User::create([
	'name' => 'admin paul',
	'email' => 'admin@gmail.com',
	'password' => Hash::make('admin'),
	'tipo' => '1',
	]);
            
$user1=User::create([
	'name' => 'usuario Marcos',
	'email' => 'user@gmail.com',
	'password' => Hash::make('admin'),
	'tipo' => '2',
	]);
$user1=User::create([
	'name' => 'usuario Moderador',
	'email' => 'moderador@gmail.com',
	'password' => Hash::make('admin'),
	'tipo' => '3',
	]);


# para evitarnos de problemas en ambiente de desarrollo 
# se puede limpiar y empezar todo los datos denuevo
php artisan migrate:refresh --seed 

un midleware por cada tipo de usuario


#midleware 1
*********
php artisan make:middleware SoloAdmin

use Illuminate\Support\Facades\Auth;

 public function handle(Request $request, Closure $next)
    {
        switch(auth::user()->tipo){
            case ('1'):
                return $next($request);//si es administrador continua al HOME
            break;
			case('2'):
                return redirect('users');// si es un usuario normal redirige a la ruta USER
			break;	
            case ('3'):
                return redirect('moders');//si es administrador redirige al moderador
            break;
        }
    }
#midleware 2
*********
php artisan make:middleware SoloUser	
use Illuminate\Support\Facades\Auth;

 public function handle(Request $request, Closure $next)
    {
        switch(auth::user()->tipo){
            case ('1'):
                return redirect('home');//si es administrador redirige al HOME
            break;
			case('2'):
                return $next($request);// si es un usuario continua ruta USER
			break;	
            case ('3'):
                return redirect('moders');//si es administrador redirige al moderador
            break;
        }
    }
	
#midleware 3
*********
php artisan make:middleware SoloModerador	
use Illuminate\Support\Facades\Auth;

 public function handle(Request $request, Closure $next)
    {
        switch(auth::user()->tipo){
            case ('1'):
                return redirect('home');//si es administrador redirige al HOME
            break;
			case('2'):
                return redirect('users');/// si es un usuario normal redirige a la ruta USER
			break;	
            case ('3'):
                return $next($request);//si es moderador continua a su ruta moderador
            break;
        }
    }

#####   registrar en el kernel
	'soloadmin' => \App\Http\Middleware\SoloAdmin::class,
	'solouser' => \App\Http\Middleware\SoloUser::class,
	'solomoder' => \App\Http\Middleware\SoloModerador::class,

# controllers
php artisan make:controller UserController --resource
php artisan make:controller ModeradorController --resource

///home controller  para expulsar a los usuarios a su ruta solo pasan admins
$this->middleware('soloadmin',['only'=> ['index']]);

public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('solouser',['only'=> ['index']]);
    }

 public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('solomoder',['only'=> ['index']]);
    }

///crer una vista para el user y una vista para el moderador




#####   user controller

public function index()
    {
        return view('user');
    }
    
    return view('moder');
    
####   RUTAS
    
//esta es la manera antigua de usar rutas
///Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');

## comando para ver las rutas
php artisan route:list


##y esta la nueva 

use App\Http\Controllers\UserController;

Route::resource('/users', UserController::class);



use App\Http\Controllers\ModeradorController;

Route::resource('/moders', ModeradorController::class);




correr el comando para que se actualicen la base de datos y los usuarios
            
php artisan migrate:refresh --seed 

###   crear las vistas faltantes



##register.blade

<div class="form-group row">
	<label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo ') }}</label>

	<div class="col-md-6">
		<input id="tipo" type="text" class="form-control @error('email') is-invalid @enderror" name="tipo" value="{{ old('email') }}" required autocomplete="email">

		@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
</div>








































