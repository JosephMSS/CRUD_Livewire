## Instalacion de Bootstrap con NPM y Livewire
1. > Instalar las dependencias de npm con `npm install`
2. >Instalar bootstrap con ` npm install --save-dev bootstrap`
3. > Empleamos la configuracion que nos ofrace laravel pra emplear bootstrap, lo importamos en el archivo css que tenemos configurado en webpack. [app.css](CRUD-livewire\resources\css\app.css)
4. >Colocar la ruta en nuestro layout
## Creacion de componentes Livewire
1. >Con el comando:
`php artisan livewire:make PostComponent`, creamos el componente , este va a generar un controlador y una vista.
2. >La manera de implementar este componente es de la siguiente manera [ejemplo](CRUD-livewire\resources\views\posts.blade.php), este debe contener un div padre, ademas el nombre del componente lo podemos observar en la carpeta livewire.
3. > [Listado con bootstrap](https://laravel-livewire.com/docs/2.x/pagination)
4. > Implementacion de paginacion `use WithPagination;`, esto evita que alborrar un registro y pasar la paginacion ocurran errores.