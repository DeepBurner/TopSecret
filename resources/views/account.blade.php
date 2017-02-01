@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')
    <script type="text/javascript" src="{{URL::asset('js/message.js') }}"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="page-header">
                    <h1>{{ $user->username }}</h1>
                    <h6>{{ $user->name }}, {{ $user->location }}</h6>
                    <p><b>Email:</b> {{ $user->email }}</p>
                    <p><b>Bio: </b> {{ $user->bio }}</p>
                    @if(Auth::user() == $user)
                        <p><a href="{{ route('account') }}">Change account settings</a></p>
                    @else
                        <a href="#" class="message">Send Message</a>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                @if (Storage::disk('local')->has($user->username . '-' . $user->id . '.jpg'))
                    <section class="row new-post">
                        <div class="col-md-6 col-md-offset-3">
                            <img src="{{ route('account.image', ['filename' => $user->username . '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive">
                        </div>
                    </section>
                @endif
            </div>
        </div>
    </div>


    <!-- modal for send message screen  -->
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">Edit the Post</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- variables for js -->
    <script>
        var token = '{{ Session::token() }}';
        var urlEdit = '{{ route('messages.send') }}';
        var recid = '{{ $user->id }}'
    </script>
@endsection