<div class="card activity">
    <h5>Recent Sales</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->sale_date }}</td>
                    <td>Rp {{ number_format($sale->total_sales, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
