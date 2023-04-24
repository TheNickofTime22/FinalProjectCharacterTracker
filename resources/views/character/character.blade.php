<x-layout>
    <x-slot:title>
        character list

    </x-slot:title>


    @push('css')
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">

    @endpush

    @if (session()->get('status') != null)
        <div class="alert alert-success">{{session()->get('status')}}</div>
    @endif




            @foreach ($characters as $character)

                <div class="col-lg-6 col-md-12 col-sm-12 my-3">

                    <div class="class_card p-3" style="height:400px; width:600px;">


                        <img class="class_img" src="{{ asset('img/'. $character->char_class. '.png') }}" width="220px" height="220px" style="position:absolute; right:0px; top:0px; ">


                        <div class="class_info">
                            <h2>{{$character->char_name}} the {{$character->char_background}}</h2>

                            <div class="row">
                                <div class="col-9 mx-4">
                                    <h1>{{$character->char_species}} | {{$character->char_class}}
                                        </h1>
                                    <h3>Level {{$character->char_level}}</h3>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-9 mx-4">
                                    <p>Ability Scores: {{$character->char_stats}}</p>
                                </div>
                                <div class="col-12 mx-4">
                                    <p>{{$character->char_experience}} / {{ $character->char_nextLevel }} until level {{$character->char_level + 1}}</p>
                                </div>
                            </div>

                            <hr>
                            <div class="row text-left">
                                <div class="col-3"><form action="{{ route('character.show', ['character' => $character]) }}" method="GET">
                                    @csrf

                                    <button type="submit" class="btn btn-success" >view</button>
                                    </form>
                                </div>




                                <div class="col-3">
                                    <a type="button" class="btn btn-info" href="{{ route('character.edit', ['character' => $character]) }}" :character="$character">edit</a>
                                </div>






                                <div class="col-3 text-right">
                                    <form action="{{ route('character.destroy', $character->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning"  onclick="return confirm('Are you sure you wish to delete this character?')">delete</button>
                                        </form>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>

            @endforeach

    @push('new')
    <a href="{{ url('/character/create') }}" type="button" class="btn btn-warning">Create</a>
    @endpush

    @push('scripts')

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
        {{-- <script>
            $(document).ready(function() {
                $('#character').DataTable();
            });
        </script> --}}
    @endpush

</x-layout>

