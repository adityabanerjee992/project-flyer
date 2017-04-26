@inject('countries', 'App\Http\Utilities\Country')

<div class="row">
	<div class="col-md-6">
		
		{{ csrf_field() }}

		<div class="form-group {{ $errors->has('street') ? 'has-error' : '' }}">
			<label for="street">Street:</label>
			<input type="text" class="form-control" name="street" id="street" value="{{ old('street') }}">
			{!! $errors->first('street', '<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
			<label for="city">City:</label>
			<input type="text" class="form-control" name="city" id="city" value="{{ old('city') }}">
			{!! $errors->first('city', '<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('zip') ? 'has-error' : '' }}">
			<label for="zip">Zip/Postal:</label>
			<input type="text" class="form-control" name="zip" id="zip" value="{{ old('zip') }}">
			{!! $errors->first('zip', '<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
			<label for="country">Country:</label>
			<select id="country" name="country" class="form-control">
				<option selected="disabled">Pick your country....</option>
				@foreach($countries::all() as $country => $code)
					<option value="{{ $code }}">{{ $country }}</option>
				@endforeach
			</select>
			{!! $errors->first('country', '<span class="help-block">:message</span>') !!}
		</div>


		<div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
			<label for="state">State:</label>
			<input type="text" class="form-control" name="state" id="state" value="{{ old('state') }}">
			{!! $errors->first('state', '<span class="help-block">:message</span>') !!}
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
			<label for="price">Sale Price:</label>
			<input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}">
			{!! $errors->first('price', '<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
			<label for="description">Home Description:</label>
			<textarea type="text" name="description" id="description" class="form-control" rows="10">
				{{ old('description') }}
			</textarea>
			{!! $errors->first('description', '<span class="help-block">:message</span>') !!}
		</div>

	</div>
	
	<div class="col-md-12">
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Create Flyer</button>
		</div> 
	</div>
</div>