<x-layout>
    <x-slot:title>
        WelcomePage
    </x-slot:title>
    <div>
        @if (Route::has('login'))
            <div class="container mt-5">
                @auth
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h1 class="display1">Welcome, You're logged in!</h1>
                                </div>

                                <div class="card-text">

                                </div>
                                <div class="row" style="align-content: right;">
                                    <a type="button" class="btn btn-info" href="/home" class="btn btn-primary"> View Your Characters </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h1 class="display1">Welcome!, Register Now!</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
        @endif
    </div>
</x-layout>
