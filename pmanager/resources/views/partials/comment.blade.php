 
 <ul class="list-group">
      	@foreach($project->comments as $comment)
        <div class="col-lg-4">
          <li class="media">
          <h4 class="media-heading">{{$comment->user->name}}
            <br>
          <small>{{$comment->user->email}}</small>
          </h4>
          <h2>{{ $comment->comment_body}}</h2>
   
          <p>{{$comment->url}}</p>
          <small>{{$comment->created_at}}</small>
          <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View Project &raquo;</a></p>
        </li>
        </div>
        @endforeach
</ul>