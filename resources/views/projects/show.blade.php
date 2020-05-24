@extends('layouts.app')

@section('content')
		<header class="flex items-center mb-3 pb-4">
	        <div class="flex justify-between items-end w-full">
	            <p class="text-grey text-sm font-normal">
	                <a href="/projects" class="text-grey text-sm font-normal no-underline hover:underline">My Projects</a>
	                / {{ $project->title }}
	            </p>
	        </div>
	    </header>
	    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-6">
                <div class="mb-8">
                    <h2 class="text-lg text-grey font-normal mb-3">Tasks</h2>


                    	<!-- task -->
                    	@foreach($project->tasks as $task)
                     		<div class="card mb-3">{{$task->body}}</div>                   		
                     	@endforeach

                     	<div class="card mb-3">
                     		<form action="{{ $project->path() . '/tasks' }}" method="POST" >
                     			@csrf
                      			<input type="text" class="w-full" name="body" placeholder="Add a new task..." >
							</form>
                     	</div>
                </div>
                <div>
                    <h2 class="text-lg text-grey font-normal mb-3">General Notes</h2>

                    	<!-- general note -->
                   
                    <div class="card">Lorem Ipsum</div>
                </div>
            </div>

            <div class="lg:w-1/4 px-3 lg:py-8">
				 <div class="card" style="height: 200px">
				    <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue-light pl-4">
				        <a href="{{ $project->path() }}" class="text-black no-underline">{{ $project->title }}</a>
				    </h3>

				    <div class="text-grey mb-4">{{ Illuminate\Support\Str::limit($project->description) }}</div>

				    <footer>
				        <form method="POST" action="{{ $project->path() }}" class="text-right">
				            @method('DELETE')
				            @csrf
				            <button type="submit" class="text-xs">Delete</button>
				        </form>
				    </footer>
				</div>
            </div>

        </div>
    </main>
@endsection



