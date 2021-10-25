<x-home-master>

@section('content')

<!-- Title -->
<h1 class="mt-4">{{ $post->title }}</h1>

<!-- Author -->
<p class="lead">
  by
  <a href="#">{{ $post->user->name }}</a>
</p>

<hr>

<!-- Date/Time -->
<p>Posted {{ $post->created_at->diffForHumans() }}</p>

<hr>

<!-- Preview Image -->
<img class="img-fluid rounded" src="{{ $post->post_image }}" alt="">

<hr>

<!-- Post Content -->
<p class="lead">{{ $post->body }}</p>

<hr>

@if(session('comment'))
  <div class="alert alert-success">
    {{ session('comment') }}
  </div>
@endif

{{-- @if(Auth::check()) --}}

{{-- <!-- Comments Form -->
<div class="card my-4">
  <h5 class="card-header">Leave a Comment:</h5>
  <div class="card-body">
    <form action="{{ route('comments.store') }}" method="POST">
      @csrf
      <input type="hidden" name="post_id" value="{{ $post->id }}">

      <div class="form-group">
        <textarea class="form-control" name="body" id="body" rows="3"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

@endif



@if(count($comments) > 0)
  @foreach($comments as $comment)

<!-- Single Comment -->
<div class="media mb-4">
  <img height="100px" width="100px" class="d-flex mr-3 rounded-circle" src="{{ $comment->avatar }}" alt="">
      <div class="media-body">
                <h5 class="mt-0">{{ $comment->author }}
                  <small>{{ $comment->created_at->diffForHumans() }}</small>     
                </h5>
              {{ $comment->body }}

              
              @if(count($comment->replies) > 0)
              @foreach($comment->replies as $reply)

              @if($reply->is_active == 1)

             <!-- nested comment -->
            <div class="media mt-4">
                <img height="50px" width="50px" class="d-flex mr-3 rounded-circle" src="{{ $reply->avatar }}" alt="">
              <div class="media-body">
                <h5 class="mt-0">{{ $reply->author }}
                  <small>{{ $reply->created_at->diffForHumans() }}</small>  
                </h5>
                    {{ $reply->body }} 
              </div>
            </div> 

            

        <div class="comment-reply-container">
          <button class="toggle-reply btn btn-info float-right">Reply</button>

            <div class="comment-reply">

            <div class="form-group">
            <form action="{{ route('replies.store') }}" method="post">
              @csrf

              <input type="hidden" name="comment_id" value="{{ $comment->id }}">

              <div class="form-group">
                <textarea class="form-control" name="body" id="body" rows="1"></textarea>
              </div>

              <button type="submit" class="btn btn-success">Submit</button>
            </form>

            </div>
          </div>
        </div>

        @else
        <h1 class="text-center">No Replies</h1>

        @endif

        @endforeach
            {{-- @else
            <h5 class="mt-0">No Replies</h5> --}}
        {{-- @endif  

    </div>

    </div>

@endforeach

@else
<h5 class="text-center">No Comments</h5>
@endif --}}


<div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://codehacking-kibssjnu1v.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

<script id="dsq-count-scr" src="//codehacking-kibssjnu1v.disqus.com/count.js" async></script>


{{-- <!-- Comment with nested comments -->
<div class="media mb-4">
  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
  <div class="media-body">
    <h5 class="mt-0">Commenter Name</h5>
    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

    <div class="media mt-4">
      <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
      <div class="media-body">
        <h5 class="mt-0">Commenter Name</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
      </div>
    </div>

    <div class="media mt-4">
      <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
      <div class="media-body">
        <h5 class="mt-0">Commenter Name</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
      </div>
    </div>

  </div>
</div> --}}

@endsection
{{-- 
@section('script')

  <script>
    $(".comment-reply-container.toggle-reply").click(function(){
      $(this).next().slideToggle("slow");
    });
  </script>

@endsection --}}

</x-home-master>