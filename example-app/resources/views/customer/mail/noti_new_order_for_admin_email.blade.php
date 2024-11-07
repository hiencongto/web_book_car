<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from themes.pixelstrap.com/voxo/email-template/welcome.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jul 2022 10:01:39 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{asset('voxo_front/images/favicon.png')}}" type="image/x-icon">

    <title>Voxo </title>

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

        .mb-3 {
            margin-bottom: 30px;
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

        h5 {
            margin: 10px;
            color: #777;
        }

        .text-center {
            text-align: center
        }

        .welcome-name h5 {
            font-weight: normal;
            margin: 10px 0 0;
            color: #232323;
            text-align: justify;
            line-height: 1.6;
            letter-spacing: 0.05em;
        }

        .welcome-details p span {
            color: #e22454;
            font-weight: 700;
            margin: 0 2px;
            text-decoration: underline;
        }

        .welcome-details p {
            font-weight: normal;
            font-size: 14px;
            color: #232323;
            line-height: 1.6;
            letter-spacing: 0.05em;
            margin: 0;
            text-align: justify;
        }

        .verify-button button {
            padding: 12px 30px;
            border: none;
            background-color: #e22454;
            color: #fff;
            font-weight: 500;
            font-size: 15px;
            letter-spacing: 1.3px;
            border-radius: 5px;
        }

        .how-work li {
            margin: 0 20px;
            color: #232323;
            position: relative;
        }

        .how-work li:after {
            content: '';
            position: absolute;
            top: 50%;
            left: -21px;
            width: 2px;
            height: 70%;
            background-color: #7e7e7e;
            transform: translateY(-50%);
        }

        .how-work li:first-child::after {
            content: none;
        }

        .main-bg-light {
            background-color: #fafafa;
        }
    </style>
</head>

<body style="margin: 20px auto;">
<table align="center" border="0" cellpadding="0" cellspacing="0"
       style="background-color: white; width: 100%; box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);-webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);">
    <tbody>
    <tr>
        <td style="padding: 25px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                <tr class="header">
                    <td align="left" valign="top">
                        <a href="index.html">
                        </a>
                    </td>
                    <td class="menu" align="right">
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>

<table align="center" border="0" cellpadding="0" cellspacing="0"
       style="background-color: white; width: 100%; padding: 0 30px; box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);">
    <tbody>
    <tr>
        <td class="welcome-image mb-3" style="display: block;">
            {{--                    <img src="https://drive.google.com/file/d/183AvuEdosB8un-M-EYzSAuRjdudw5PBn/view?usp=sharing" style="width: 100%; margin-top: 20px;" alt="">--}}
{{--            <img src="https://drive.google.com/uc?export=view&id=183AvuEdosB8un-M-EYzSAuRjdudw5PBn" style="width: 100%; margin-top: 20px;" alt="">--}}

        </td>

        <td class="welcome-name mb-3" style="text-align: left; display: block;">
            <h3 style="text-transform: capitalize; margin: 0; font-weight: 700; color: #232323">Hi!</h3>
            <h4>We have new order from {{$details->customer->name}}</h4>
            <h4>Trip: {{$details->trip->source->name}} - {{$details->trip->destination->name}}</h4>
            <h4>Time start: {{date('Y-m-d H:i', (int) $details->trip->time_start)}}</h4>
{{--            <h4>Before we get started, we'll need to verify your email.</h4>--}}
        </td>

        <td class="verify-button mb-3" style="display: block;">
            <button><a href="{{route('show_trip_detail_admin', ['id' => $details->trip_id])}}" style="color: white">Check trip detail.</a></button>
        </td>

{{--        <td class="welcome-details mb-3" style="display: block;">--}}
{{--            <p>If you have any question, please email us at <span>voxo@example.com</span> or vixit our--}}
{{--                <span>FAQs.</span> You can also chat with a real live human during our operating hours. They can--}}
{{--                answer questions about your account or help you with your meditation practice.</p>--}}
{{--        </td>--}}
    </tr>
    </tbody>
</table>

<table class="text-center" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
       style="background-color: #eff2f7; color: #232323; padding: 40px 30px;">
    <tr>
        <td>
            <table border="0" cellpadding="0" cellspacing="0" class="footer-social-icon text-center" align="center"
                   style="margin: 8px auto 20px;">
                <tr>
                    <td>
                        <a href="javascript:void(0)">
                            <img src="{{asset('voxo_front/images/fb.png')}}" alt=""
                                 style="font-size: 25px; margin: 0 18px 0 0;width: 22px;">
                        </a>
                    </td>
                    <td>
                        <a href="javascript:void(0)">
                            <img src="{{asset('voxo_front/images/twitter.png')}}" alt=""
                                 style="font-size: 25px; margin: 0 18px 0 0;width: 22px;">
                        </a>
                    </td>
                    <td>
                        <a href="javascript:void(0)">
                            <img src="{{asset('voxo_front/images/insta.png')}}" alt=""
                                 style="font-size: 25px; margin: 0 18px 0 0;width: 22px;">
                        </a>
                    </td>
                    <td>
                        <a href="javascript:void(0)">
                            <img src="{{asset('voxo_front/images/google-plus.png')}}" alt="" style="font-size: 25px; width: 22px;">
                        </a>
                    </td>
                </tr>
            </table>
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <ul class="how-work">
                        <li style="margin-left: 0;">Contact us</li>
                        <li>How it works</li>
                        <li>FAQs</li>
                        <li style="margin-right: 0;">T&Cs</li>
                    </ul>
                </tr>

                <tr class="footer-details">
                    <p style="margin: 10px auto 0; font-size: 14px; width: 80%; color: #7e7e7e;">Yor Have received
                        this email as a registered user of <a
                            style="color: #e22454; text-decoration: underline; font-weight: 700;" href="https://themes.pixelstrap.com/voxo/front-end/html/index.html">Voxo.com</a> You can <a
                            style="color: #e22454; text-decoration: underline; font-weight: 700;"
                            href="javascript:void(0)">Unsubscribe</a> from these emails here(Don't worry. take it
                        personally).</p>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>


<!-- Mirrored from themes.pixelstrap.com/voxo/email-template/welcome.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jul 2022 10:01:41 GMT -->
</html>
