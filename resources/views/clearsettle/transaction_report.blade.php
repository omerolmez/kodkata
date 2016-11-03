@extends('layouts.main')

@section('title', 'Transaction Report Screen')

@section('content')


<div class="col-lg-12">
    @include('elements.form_errors')
    
    <div class="panel panel-primary">
        <div class="panel-heading">
            Transaction Report 
        </div>
        <div class="panel-body">
            <div class="row">
                
                <form role="form" method="post">
                    {{ csrf_field() }}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>From Date</label>
                                
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="input-sm form-control" name="fromDate" />
                                <span class="input-group-addon">to</span>
                                <input type="text" class="input-sm form-control" name="toDate" />
                            </div>
                                
                                
                        </div>

                        <div class="form-group">
                            <label>Merchant</label>
                            <select name="merchant" class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Acquirer</label>
                            <input name="acquirer" class="form-control" placeholder="Acquirer" value="2">
                        </div>
                        
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="submit" class="form-control btn btn-primary">Search</button>
                        </div>
                    </div> 


                </form>
            </div>
        </div>
    </div>
    
    @if (isset($transactionReport))
    <div class="panel panel-default">
    <div class="panel-heading">Transaction Reports</div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Count</th>
                    <th>Total</th>
                    <th>Currency</th>
                </tr>
                @foreach ($transactionReport as $item)
                    
                @endforeach
            </table>
        </div>
    </div>
    @endif
        
</div>
    

@endsection

@section('extra_assets')

<link rel=stylesheet type=text/css href="/assets/css/bootstrap-datepicker3.min.css">
<script src="/assets/js/bootstrap-datepicker.min.js"></script>

@endsection