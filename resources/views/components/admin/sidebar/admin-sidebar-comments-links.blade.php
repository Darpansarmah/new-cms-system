<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComments" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Comments an Replies</span>
    </a>
    <div id="collapseComments" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Comments an Replies:</h6>
        {{-- <a class="collapse-item" href="{{ route('posts.create') }}">Create a Post</a> --}}
        <a class="collapse-item" href="{{ route('comments.index') }}">View All Comments</a>
        <a class="collapse-item" href="{{ route('replies.index') }}">View All Replies</a>
      </div>
    </div>
  </li>