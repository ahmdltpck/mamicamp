			@csrf
			
			<div class="field">
				<label class="label" for="title">Title</label>

				<div class="control">
					<input
					type="text" 
		            class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full" 
		            name="title" 
		            placeholder="My next awesome project"
		            required 
		            value="{{$project->title}}" >
				</div>
			</div>

			<div class="field">
				<label class="label" for="description">Description</label>

				<div class="control">
					<textarea name="description" 
		            rows="10" 
		            class="textarea bg-transparent border border-grey-light rounded p-2 text-xs w-full"
		            placeholder="I should start learning piano."
		            required>{{$project->description}}</textarea>
				</div>
			</div>

			<div class="field">
				<button type="submit" type="submit" class="button is-link mr-2">{{$buttonText}}</button>
				<a href="{{ $project->path() }}">cancel</a>
			</div>
			@if ($errors->any())
						<div class="field mt-6 ">
								@foreach ($errors->all() as $error)
									<li class="text-sm text-red">{{$error}}</li>
								@endforeach
						</div>
					@endif		