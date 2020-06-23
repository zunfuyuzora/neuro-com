<div id="commentary">
    <div class="container">
        <h6 class="font-weight-bold">Comment</h6>
    </div>

    <div id="commentary-container" class="p-4 mb-3 rounded shadow-sm bg-white">
        @if (count($comments) > 0)
            
        @foreach ($comments as $c)
            
        <div class="row comment my-4">
            <div class="col">
                <div class="pic-avatar">
                    <img src="{{asset($c->member->user->avatar)}}" alt=" [Avatar]" >
                </div>
            </div>
            <div class="col-9">
                <p class="h6 font-weight-bold" style="color:gray">{{$c->member->user->first_name}}</p>
                <p>{{$c->text}}</p>
            </div>
        </div>
        @endforeach
        @else
        <div class="text-center">No Comment yet</div>
        @endif
    </div>

    <div id="addComment" class="p-4 mb-3 rounded shadow-sm bg-white">
        <div class="row">

            <div class="col">
                    <div class="pic-avatar">
                        <img src="{{asset(Auth::user()->avatar)}}" alt="[avatar]">
                    </div>
            </div>
            <div class="col-9">
                <form action="{{route('comment.store')}}" class="form-group" method="POST">
                    @csrf
                    <input type="hidden" name="content" value="{{$content->id}}">
                    <input type="hidden" name="group_id" value="{{$content->group_id}}">
                    <textarea name="comment" class="form-control mb-2" id="commentcontainer" cols="30" rows="5" placeholder="Type your comment here"></textarea>
                    <div class="form-group row">
                        <div class="col-12 text-right">
                        <button type="submit" class="btn btn-primary "><i class="fa fa-paper-plane"></i> Send</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
