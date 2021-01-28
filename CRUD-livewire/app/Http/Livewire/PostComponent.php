<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostComponent extends Component
{
    use WithPagination;//Eso evita el error mencionado en table.blade
    
    protected $paginationTheme = 'bootstrap';//Esto es unicamente en el caso que que  se quierea usar bootstrap
    
    public function render()
    {
        return view('livewire.post-component',[
            'posts'=>Post::orderBy('id','desc')->paginate(8)
        ]);
    }
     public function destroy($id )
     {
        Post::destroy($id);
     }
}
