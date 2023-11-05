@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="cardOpacity">
                    <div class="card-header">{{ __('PRESTAMOS') }}</div>
                    <iframe src="{{ route('showPrestamos') }}" title="PRESTAMOS" hidden=true> </iframe>
                    <div class="card-body">
                        @if (session('status'))
                            <?php
                            if (auth()->user()->id != -1) {
                                header('login');
                            } else {
                                header('login');
                            }
                            ?>
                            <div class="alert alert-success" role="alert">
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


</body>

</html>
