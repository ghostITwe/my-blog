<a href="{{ route('admin.post.create') }}">Добавить пост</a>

@forelse($posts as $post)
    <article>
        <div>
            <span>{{ $post->author->name }}</span>
            <span>{{ $post->duration }}</span>
        </div>
        <h4>{{ $post->title }}</h4>
        <p>{{ $post->description }}</p>
    </article>
    <form action="{{ route('admin.post.delete', ['post' => $post]) }}" method="POST">
        @method('DELETE')
        @csrf
        <button>Удалить</button>
    </form>
@empty
    <p>Данных нет</p>
@endforelse