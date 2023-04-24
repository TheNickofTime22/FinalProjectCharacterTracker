<x-layout>
    <x-slot:title>
        Edit Character

    </x-slot:title>

<x-characterform action="{{ route('character.update', ['character' => $character])}}" method="PUT" :character="$character" buttonTitle="Edit"/>

</x-layout>
