<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Payment-invoice</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        /*
            .invoice-box table tr.information table td {
                padding-bottom: 40px;
            } */

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }


        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }

        .last-item {
            font-weight: 700;
            text-align: right;
        }

    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                {{ config('app.name') }}
                            </td>

                            <td>
                                {{ __('Today Date :') }} {{ \Carbon\Carbon::now()->format('M d Y') }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>User Info<br></td>

                            <td>
                                {{ Auth::user()->name }}<br>
                                {{ Auth::user()->email }}<br>
                                {{ Auth::user()->phone ?? null }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Title</td>
                <td>Details</td>
            </tr>
            <tr class="item">
                <td>Request Created Date:</td>
                <td>{{ $data->created_at->format('M d Y') }}</td>
            </tr>
            <tr class="item">
                <td>Plan Name:</td>
                <td>{{ $data->plan->name ?? 'null' }}</td>
            </tr>
            <tr class="item">
                <td>Getway:</td>
                <td>{{ $data->getway->name }}</td>
            </tr>
            <tr>
                <td>Amount:</td>
                <td>{{ $data->amount }}</td>
            </tr>

            <tr>
                <td>Exp Date:</td>
                <td>{{ $data->exp_date }}</td>
            </tr>

            <tr>
                <td>Payment Id</td>
                <td><b>{{ $data->payment_id ?? 'null' }}</b></td>
            </tr>
            <tr>
                <td>Type</td>
                <td>
                    @if ($data->payment_status == 1)
                        <span>Active</span>
                    @else
                        <span>Decative</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    @if ($data->status == 1)
                        <span>Active</span>
                    @else
                        <span>Decative</span>
                    @endif
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
