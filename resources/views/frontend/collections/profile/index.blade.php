@extends('layouts/app')
@section('title', 'User Profile Page')
@section('content')
@include('layouts/include/admin/session')
@include('layouts.include.comman.profileimage')
                        <form action="/profile/{{auth()->id()}}" method="post">                      
@include('layouts.include.comman.profileinput')

                            <div class="d-flex">
                                <a href="/profile/{{auth()->id()}}/edit" class="btn btn-primary me-3"> Edit Your Profile </a>
                                <a href="/updatepassword/{{auth()->id()}}/edit" class="btn btn-primary"> Edit Password </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection