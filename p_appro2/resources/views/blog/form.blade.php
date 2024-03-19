<form action="" method="post">
    @csrf
    <div>
      <label for="title">Titre</label>
      <input type="text" name="title" value="{{old('title', $post->title)}}">
      @error('title')
         {{$message}}
      @enderror
    </div>
    <div>
        <label for="slug">Slug</label>
        <input type="text" id="slug" name="slug" value="{{old('slug', $post->slug)}}">
        @error('slug')
        {{$message}}
        @enderror
    </div>
    <div>
      <label for="content">Contenu</label>
      <textarea name="content">{{old('content', $post->content)}}</textarea>
      @error('content')
      {{$message}}
    @enderror
    </div>
    <button>
        @if ($post->id)
            Modifier
        @else
            Créer
        @endif
    </button>
 </form>