<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themes.pixelstrap.com/voxo/email-template/order-success-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 09:44:42 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="images/favicon.png" type="image/x-icon">

    <title>Voxo | Email template </title>

    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">



    <style type="text/css">
        body {
            text-align: center;
            margin: 0 auto;
            width: 650px;
            font-family: 'Rubik', sans-serif;
            background-color: #e2e2e2;
            display: block;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            display: inline-block;
            text-decoration: unset;
        }

        a {
            text-decoration: none;
        }

        p {
            margin: 8px 0;
        }

        h5 {
            color: #777777;
            text-align: left;
            font-weight: 400;
        }

        .text-center {
            text-align: center
        }

        .main-bg-light {
            background-color: #3d3d3d;
            color: #fff;
        }

        .title {
            color: #222222;
            font-size: 22px;
            font-weight: bold;
            margin: 10px 0;
            padding-bottom: 0;
            text-transform: uppercase;
            display: inline-block;
            line-height: 1;
        }

        table {
            margin-top: 30px
        }

        table.top-0 {
            margin-top: 0;
        }

        table.order-detail,
        .order-detail th,
        .order-detail td {
            border: 1px solid #ddd;
            border-collapse: collapse;
        }

        .order-detail th {
            font-size: 16px;
            padding: 15px;
            text-align: center;
        }

        .footer-social-icon tr td {
            width: 30px;
            height: 30px;
            background: transparent;
            margin: 0 30px;
            border-radius: 50%;
            text-align: center;
        }

        .footer-social-icon tr td a {
            width: 100%;
            align-items: center;
            display: flex;
            justify-content: center;
            color: #fff;
        }

        .footer-social-icon tr td a i {
            width: 50%;
            margin: 0;
        }

        .footer-subscript p {
            margin: 0;
            letter-spacing: 1.1px;
            line-height: 1.6;
            font-size: 14px;
            color: #c5c5c5;
        }

        .footer-subscript p a {
            color: #fff;
            text-decoration: underline;
        }
        body {
            font-family: Arial, sans-serif;
            color: #333333;
            line-height: 1.5;
        }
        .content {
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body style="margin: 20px auto;" data-new-gr-c-s-check-loaded="14.1031.0" data-gr-ext-installed="">
<table align="center" border="0" cellpadding="0" cellspacing="0"
       style="padding: 0 30px;background-color: #fff; box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);">
    <tbody>
    <tr>
        <div class="content">
            <p>Dear {{ $details->customer->name }},</p>

            <p>We regret to inform you that your upcoming trip has been canceled.</p>

            <p><strong>Details of the Canceled Trip:</strong></p>
            <ul>
                <li><strong>Trip ID:</strong> {{ $details->id }}</li>
                <li><strong>Departure Location:</strong> {{ $details->trip->source->name }}</li>
                <li><strong>Destination:</strong> {{ $details->trip->destination->name }}</li>
                <li><strong>Scheduled Departure Time:</strong> {{ date('Y-m-d H:i', (int) $details->trip->time_start) }}</li>
            </ul>

            <p><strong>Refunds:</strong> We will process your refund within 7-11 business days. The refund will be issued to the account or card used for payment.</p>

            <p><strong>Contact for Assistance:</strong> Should you have any questions, please feel free to reach us at our hotline 0964283688.</p>

            <p>We apologize for the inconvenience this may cause and thank you for your understanding. We look forward to serving you on future trips.</p>

            <p>Sincerely,<br>
                The VOXO Team</p>
        </div>

    </tr>
    </tbody>
</table>

<table class="main-bg-light text-center" style="margin-top: 0;" align="center" border="0" cellpadding="0"
       cellspacing="0" width="100%">
    <tr>
        <td style="padding: 30px;">
            <div>
                <h4 class="title" style="margin:0;text-align: center; color: whitesmoke;">Follow us
                </h4>
            </div>
            <table border="0" cellpadding="0" cellspacing="0" class="footer-social-icon text-center" align="center"
                   style="margin-top:12px;">
                <tr>
                    <td>
                        <a href="javascript:void(0)">
                            <img src="images/fb.png" alt=""
                                 style="font-size: 25px; margin: 0 18px 0 0;width: 22px;filter: invert(1);">
                        </a>
                    </td>
                    <td>
                        <a href="javascript:void(0)">
                            <img src="images/twitter.png" alt=""
                                 style="font-size: 25px; margin: 0 18px 0 0;width: 22px;filter: invert(1);">
                        </a>
                    </td>
                    <td>
                        <a href="javascript:void(0)">
                            <img src="images/insta.png" alt=""
                                 style="font-size: 25px; margin: 0 18px 0 0;width: 22px;filter: invert(1);">
                        </a>
                    </td>
                    <td>
                        <a href="javascript:void(0)">
                            <img src="images/google-plus.png" alt=""
                                 style="font-size: 25px; width: 22px;filter: invert(1);">
                        </a>
                    </td>
                </tr>
            </table>
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 20px auto 0;"
                   class="footer-subscript">
                <tr>
                    <td>
                        <p>Ths email template was sent to you
                            becouse we want to make the world a better place. you could change your
                            <a href="#">subscription settings</a> anytime.
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>


<!-- Mirrored from themes.pixelstrap.com/voxo/email-template/order-success-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 09:44:44 GMT -->
</html>
