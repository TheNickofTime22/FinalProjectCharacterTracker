

@props([
    "character" => null,
    "buttonTitle",
    "action",
    "method",


])

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
        <div class="card-header">
            {{ $buttonTitle ?? "View"}} character
        </div>

        <div class="card-body">
            <form action="{{ $action }}" method="POST">
                @csrf
                @if ($method == 'PUT')
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-sm-12 col-lg-6 form-group p-4">
                        <label for="char_name">Name</label>
                        <input name="char_name" type="text" class="form-control @error('char_name') is-invalid @enderror" id="char_name" value="{{ old('char_name') ?? $character->char_name ?? ""}} ">

                    </div>
                    <div class="col-sm-12 col-lg-6 form-group p-4">
                        <label for="char_class">Class</label>
                        <input name="char_class" type="text" class="form-control @error('char_class') is-invalid @enderror" id="char_class" value="{{old('char_class') ?? $character->char_class ?? ""}}">

                    </div>


                <div class="col-sm-12 col-lg-6 form-group p-4">
                    <label for="char_level">Level</label>
                    <input name="char_level" type="number" class="form-control @error('char_level') is-invalid @enderror" id="char_level"value="{{old('char_level') ?? $character->char_level ?? ""}}">
                </div>
                <div class="col-sm-12 col-lg-6 form-group p-4">
                    <label for="char_species">Species</label>
                    <input name="char_species" type="tel" class="form-control @error('char_species') is-invalid @enderror" id="char_species" value="{{old('char_species') ?? $character->char_species ?? ""}}">
                </div>

                    <div class="col-sm-12 col-lg-6 form-group p-4">
                        <label for="char_background">Background</label>
                        <input name="char_background" type="text" class="form-control @error('char_background') is-invalid @enderror" id="char_background" value="{{ old('char_background') ?? $character->char_background ?? ""}} ">

                    </div>
                    <div class="col-sm-12 col-lg-6 form-group p-4">
                        <label for="char_experience">Experience</label>
                        <input name="char_experience" type="number" class="form-control @error('char_experience') is-invalid @enderror" id="char_experience" value="{{old('char_experience') ?? $character->char_experience ?? ""}}">

                    </div>
                </div>

            </div>
                <button type="submit" value="" class="btn btn-primary mt-4 offset-11">{{ $buttonTitle ?? "Back"}}</button>
            </form>

        </div>
    </div>
