<h2>Listado de Posts</h2>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Contenido</th>
            <th colspan="2">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->body }}</td>
            <td>
                <button  class="btn btn-primary">
                    Editar
                </button>
            </td>
            <td>
                <button  class="btn btn-danger">
                    eliminar
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $posts->links() }}