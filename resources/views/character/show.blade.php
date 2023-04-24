<x-layout>
    <x-slot:title>
        View character

    </x-slot:title>


    @push('css')
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
        <link rel="stylesheet" href="resources/css/app.css">
    @endpush



    <div class="card">
        <div class="card-header">
            {{ $buttonTitle ?? 'View' }} character
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-lg-6 form-group p-4">
                    <label for="first_name">Character name</label>
                    <input name="first_name" type="text" class="form-control" id="first_name"
                        value="{{ $character->char_name }} " readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-6 form-group p-4">
                    <label for="last_name">Class</label>
                    <input name="last_name" type="text" class="form-control" id="last_name"
                        value="{{ $character->char_class }}" readonly>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-6 form-group p-4">
                    <label for="email">Species</label>
                    <input name="email" type="email" class="form-control"
                        id="email"value="{{ $character->char_species }}" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-lg-6 form-group p-4">
                    <label for="phone">Background</label>
                    <input name="phone" type="tel" class="form-control" id="phone"
                        value="{{ $character->char_background }}" readonly>
                </div>


            </div>

            <div class="row">
                <div class="col-sm-12 col-lg-6 form-group p-4">
                    <label for="phone">Level</label>
                    <input name="phone" type="tel" class="form-control" id="phone"
                        value="{{ $character->char_level }}" readonly>
                </div>


            </div>

            <div class="row">
                <div class="col-sm-12 col-lg-6 form-group p-4">
                    <label for="phone">Ability Scores</label>
                    <input name="phone" type="tel" class="form-control" id="phone"
                        value="{{ $character->char_stats}}" readonly>
                </div>


            </div>

            <div class="row">
                <div class="col-2">
                    <a type="button" class="btn btn-warning mt-4"
                        href="{{ route('character.edit', ['character' => $character]) }}">Edit character</a>
                </div>


                <div class="col-2">
                    <form action="{{ route('character.destroy', $character->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button class="btn btn-danger mt-4"
                        type="submit"onclick=" return confirm('Are you sure you wish to delete?') ">Delete
                        character</button>
                    </form>
                </div>

                <div class="col-2">
                    <a type="button" class="btn btn-primary mt-4" value=""
                        href="{{ route('character.index') }}">Back</a>
                </div>
            </div>


        </div>
    </div>


</x-layout>
