<?php

namespace Tests\Feature\app\Http\Livewire;

use App\Http\Livewire\PostComponent;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PostComponentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_store()
    {
        $post=Post::factory()->make();
        Livewire::test(PostComponent::class)
        ->set(['title'=>$post->title,'body'=>$post->body])
        ->call('store')
        ->assertSee('Editar Post');
        
        $this->assertDatabaseHas('posts',['title'=>$post->title]);
        
    }
    public function test_edit()
    {
        $post=Post::factory()->create();
        Livewire::test(PostComponent::class)
        ->call("edit",$post->id)
        ->assertSet('title',$post->title);
        
    }
}
