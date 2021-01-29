<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostComponent extends Component
{
    public $title, $body;
    public $view = 'create';

    use WithPagination; //Eso evita el error mencionado en table.blade

    protected $paginationTheme = 'bootstrap'; //Esto es unicamente en el caso que que  se quierea usar bootstrap

    public function render()
    {
        return view('livewire.post-component', [
            'posts' => Post::orderBy('id', 'desc')->paginate(8)
        ]);
    }
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::create([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        $this->edit($post->id);
    }
    public function edit($id)
    {
        $post = Post::find($id);

        $this->title = $post->title;
        $this->body = $post->body;

        $this->view = 'edit';
    }
    public function destroy($id)
    {
        Post::destroy($id);
    }
    public function default()
    {
        $this->title = '';
        $this->body = '';
        $this->view = 'create';
    }
}
