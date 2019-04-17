<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 17/04/2019
 * Time: 3:37 PM
 */
?>

    <table class="table">
        <thead>
            <tr>
                <th>reporting_region</th>
                <th>start_date</th>
                <th>end_date</th>
                <th>upc</th>
                <th>grid</th>
                <th>isrc</th>
                <th>Custom Id</th>
                <th>Custom Id</th>
                <th>Custom Id</th>
                <th>Custom Id</th>
                <th>Google ID</th>
                <th>Artist</th>
                <th>Product Title</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($query as $v)
                    <td>{{ $v->reporting_region }}</td>
                    <td>{{ $v->start_date }}</td>
                    <td>{{ $v->end_date }}</td>
                    <td>{{ $v->upc }}</td>
                    <td>{{ $v->grid }}</td>
                    <td>{{ $v->isrc }}</td>
                    <td>{{ $v->custom_id_1 }}</td>
                    <td>{{ $v->custom_id_2 }}</td>
                    <td>{{ $v->custom_id_3 }}</td>
                    <td>{{ $v->custom_id_4 }}</td>
                    <td>{{ $v->google_id }}</td>
                    <td>{{ $v->artist }}</td>
                    <td>{{ $v->product_title }}</td>
                @endforeach

                {{--'product_title' => 'product_title',--}}
                {{--'container_title' => 'container_title',--}}
                {{--'content_provider' => 'content_provider',--}}
                {{--'label' => 'label',--}}
                {{--'consumer_country' => 'consumer_country',--}}
                {{--'device_type' => 'device_type',--}}
                {{--'product_type' => 'product_type',--}}
                {{--'interaction_type' => 'interaction_type',--}}
                {{--'Total Play' => 'total_play',--}}
                {{--'Partner Revenue Paid' => 'partner_revenue_paid',--}}
                {{--'Partner Revenue Currency' => 'partner_revenue_currency',--}}
                {{--'Amount' => 'eur_amount'--}}
                {{----}}
            </tr>
        </tbody>
    </table>
