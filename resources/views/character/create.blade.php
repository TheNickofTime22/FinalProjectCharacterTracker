<x-layout>
    <x-slot:title>
        Create character

    </x-slot:title>



<x-characterform action="{{ route('character.store')}}" method="POST" buttonTitle="Create"/>

</x-layout>
