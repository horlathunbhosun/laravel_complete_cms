<div class="myaccount-content">
    <h5>Payment History</h5>
    <div class="myaccount-table table-responsive text-center">
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>S/N</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Status</th>
{{--                <th>purpose</th>--}}
            </tr>
            </thead>
            <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$payment->payment_date}}</td>
                    <td>${{$payment->amount}}</td>
                    <td>{{strtoupper($payment->payment_status)}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
