<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostComponent extends Component
{
    public $post_id, $title, $body; // no escribimos id ua qe es un atributo reservado del objeto
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

        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->body = $post->body;

        $this->view = 'edit';
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $post = Post::find($this->post_id);
        $post->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);
        $this->default();
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
