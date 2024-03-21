<form action="" method="post" class="vstack gap-2" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="image">
        @error('image')
           {{$message}}
        @enderror
      </div>
    <div>
      <label for="title">Titre</label>
      <input type="text" class="form-control" id="title" name="title" value="{{old('title', $post->title)}}">
      @error('title')
         {{$message}}
      @enderror
    </div>
    <div>
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug', $post->slug)}}">
        @error('slug')
        {{$message}}
        @enderror
    </div>
    <div>
      <label for="content">Contenu</label>
      <textarea id="content" class="form-control" name="content">{{old('content', $post->content)}}</textarea>
      @error('content')
      {{$message}}
    @enderror
    </div>
    <div>
        <label for="category">Catégories</label>
        <select id="category" class="form-control" name="category_id">
            <option value="">Sélectionner une catégorie</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}"@selected(old('category_id', $post->category_id)== $category->id)>{{$category->name}}</option>
            @endforeach
        </select> 
        @error('category_id')
        {{$message}}
      @enderror
      </div>
      @php
       $tagsIds = $post->tags()->pluck('id');
      @endphp
      <div>
        <label for="tag">Tags</label>
        <select id="tag" class="form-control" name="tags[]" multiple>
            <option value="">Sélectionner un ou plusieurs tags</option>
            @foreach ($tags as $tag)
                <option value="{{$tag->id}}"@selected($tagsIds->contains($tag->id))>{{$tag->name}}</option>
            @endforeach
        </select> 
        @error('tags')
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