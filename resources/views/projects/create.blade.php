@extends('layouts.app')


@section('content')
	<form method="POST" action="/projects/store" class="container form-group" style="padding-top:  40px;">
		@csrf
		<h1 class="heading is-1">Create a Projects</h1>
		
		<div class="field">
			<label class="label" for="title">Title</label>

			<div class="control">
				<input type="text" class="form-control" name="title" placeholder="Title">
			</div>
		</div>

		<div class="field">
			<label class="label" for="description">Description</label>

			<div class="control">
				<textarea name="description" class="form-control"></textarea>
			</div>
		</div>

		<div class="field">
			<button type="submit" class="btn btn-primary">Create Project</button>
			<a href="/projects">Cancel</a>
		</div>

	</form>

@endsection