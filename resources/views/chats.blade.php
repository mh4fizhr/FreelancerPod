@extends('layouts.app')

@section('content')
<div class="container">
		<div>
            <div class="card card-default">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <ul>
                    	@foreach($users as $user)
                        <li>
                            {{ $user->name }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <br>

    <chats :user="{{ auth()->user() }}"></chats>

    

</div>
@endsection
