{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Add Balance To Account
                    {{-- <div class="text-muted pt-2 font-size-sm">Datatable initialized from HTML table</div> --}}
                </h3>
            </div>
            <div class="container p-5">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4">
                        <form method="POST" action="/pay">
                            @csrf
                            
                            <div class="form-group">
                                <label for="amount">Add Amount in cents</label>
                                <input class="form-control"  type="number" max="1000" min="50" placeholder="Amount in cents" name="amount" id="amount">
                            </div>
                            <span class="form-text text-muted">Current Card Being Used that is saved</span>

                            
                            <div class="text-center mt-2">
                                <input type="submit" id="submit"  value="Add" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
    
   

@endsection
