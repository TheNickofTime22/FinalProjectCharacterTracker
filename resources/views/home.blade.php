<x-layout>



<x-slot:title>
    home page
</x-slot:title>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="col-8">
                                <h2>{{ __('Dashboard') }}</h2>
                            </div>
                            <div class="col-2"><button class="btn btn-warning" value="New" height="5px" width="10px"
                                    style="width:100%" data-bs-toggle="modal" data-bs-backdrop="false"
                                    data-bs-target=#createCharacter>+</button></div> {{-- Create Button! --}}
                        </div>

                    </div>



                    <div class="modal fade" id="createCharacter" tabindex="-1" data-bs-backdrop="false"
                        aria-labelledby="createCharacter" aria-hidden="true" style="position:relative;">
                        <div class="modal-dialog modal-xl p-4 m-4">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createCharacter">Create Character</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row m-4">
                                            <form action="{{ route('character.store') }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input name="player_name" type="hidden" class="form-control"
                                                                id="player_name" value="current_user">

                                                            <label for="char_name" style="margin-left:20px;">Name</label>
                                                            <input type="text" class="form-control" id="char_name"
                                                                name="char_name" placeholder="Character Name">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="char_class" style="margin-left:20px;">Class</label>
                                                            <input type="text" class="form-control" id="char_class"
                                                                name="char_class" placeholder="Character Class">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="char_species"
                                                                style="margin-left:20px;">Species</label>
                                                            <input type="text" class="form-control" id="char_species"
                                                                name="char_species" placeholder="Character Species">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="char_background"
                                                                style="margin-left:20px;">Background</label>
                                                            <input type="text" class="form-control" id="char_background"
                                                                name="char_background" placeholder="Character Background">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="char_level" style="margin-left:20px;">Level</label>
                                                            <input type="number" class="form-control" id="char_level"
                                                                name="char_level" placeholder="Character Level">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="char_experience"
                                                                style="margin-left:20px;">Experience</label>
                                                            <input type="number" class="form-control" id="char_experience"
                                                                name="char_experience" placeholder="Character Xp">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="char_stats">Stats</label>
                                                            <input type="text" class="form-control" id="char_stats"
                                                                name="char_stats" placeholder="Character Stats">
                                                            <input name="char_nextLevel" type="hidden"
                                                                class="form-control" id="char_nextLevel" value="300">

                                                        </div>
                                                    </div>
                                                </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Create character</button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        @foreach ($characters as $character)
                            <a data-bs-toggle="modal" data-bs-backdrop="false"
                                data-bs-target={{ '#view_Char_' . $character->id }}>


                                <div class="card my-2 character-card" style="z-index: 1">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <h4 class="card-title">{{ $character->char_name }} the
                                                    {{ $character->char_background }}</h4>
                                                <h4 class="card-text"> Level - {{ $character->char_level }}
                                                </h4>
                                                <h4 class="card-text">{{ $character->char_species }}</h4>
                                            </div>
                                            <div class="col-6">
                                                <h2 class="card-title text-center mr-2"><strong>
                                                        {{ $character->char_class }}</strong></h2>
                                                <p class="card-text"><em>Experience:
                                                    </em>{{ $character->char_experience }}/{{ $character->char_nextLevel }}
                                                    to Lvl {{ $character->char_level + 1 }}</p>
                                            </div>

                                        </div>

                                    </div>
                                    <img src=" {{ asset('img/' . $character->char_class . '.png') }}" width="25%"
                                        height="100%"
                                        style="z-index:-1; position:absolute; opacity:0.5; margin-left:75%;">
                                </div>

                            </a>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        @foreach ($characters as $character)
            <div class="modal fade" id={{ 'view_Char_' . $character->id }} tabindex="-1" data-bs-backdrop="false"
                aria-labelledby={{ 'view_Char_Label_' . $character->id }} aria-hidden="true">
                <div class="modal-dialog modal-xl p-4 m-4">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id={{ 'view_Char_Label_' . $character->id }}>View Character</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="card my-2 character-card" style="z-index: 1">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <h4 class="card-title">{{ $character->char_name }} the
                                                        {{ $character->char_background }}</h4>
                                                    <h4 class="card-text"> Level - {{ $character->char_level }}
                                                    </h4>
                                                    <h4 class="card-text">{{ $character->char_species }}</h4>
                                                </div>
                                                <div class="col-6">
                                                    <h2 class="card-title text-center mr-2"><strong>
                                                            {{ $character->char_class }}</strong></h2>
                                                    <p class="card-text"><em>Experience:
                                                        </em>{{ $character->char_experience }}/{{ $character->char_nextLevel }}
                                                        to Lvl {{ $character->char_level + 1 }}</p>
                                                </div>

                                            </div>

                                        </div>
                                        <img src=" {{ asset('img/' . $character->char_class . '.png') }}" width="25%"
                                            height="100%"
                                            style="z-index:-1; position:absolute; opacity:0.5; margin-left:75%;">
                                    </div>
                                </div>
                                <div class="row m-4">
                                    <form action="{{ route('character.update', $character) }}" method="PUT">

                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="char_name" style="margin-left:20px;">Name</label>
                                                    <input type="text" class="form-control" id="char_name"
                                                        name="char_name" value="{{ $character->char_name }}">
                                                </div>
                                                <div class="col-6">
                                                    <label for="char_class" style="margin-left:20px;">Class</label>
                                                    <input type="text" class="form-control" id="char_class"
                                                        name="char_class" value="{{ $character->char_class }}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="char_species" style="margin-left:20px;">Species</label>
                                                    <input type="text" class="form-control" id="char_species"
                                                        name="char_species" value="{{ $character->char_species }}">
                                                </div>
                                                <div class="col-6">
                                                    <label for="char_background"
                                                        style="margin-left:20px;">Background</label>
                                                    <input type="text" class="form-control" id="char_background"
                                                        name="char_background" value="{{ $character->char_background }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="char_level" style="margin-left:20px;">Level</label>
                                                    <input type="number" class="form-control" id="char_level"
                                                        name="char_level " value="{{ $character->char_level }}">
                                                </div>
                                                <div class="col-6">
                                                    <label for="char_experience"
                                                        style="margin-left:20px;">Experience</label>
                                                    <input type="number" class="form-control" id="char_experience"
                                                        name="char_experience" value="{{ $character->char_experience }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="char_stats">Stats</label>
                                                    <input type="text" class="form-control" id="char_stats"
                                                        name="char_stats" value="{{ $character->char_stats }}">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Exit</button>



                            <form action="{{ route('character.destroy', $character->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you wish to delete this character?')">Delete
                                    Character</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</x-layout>
