<?php include_once(dirname(__FILE__) . '/../../includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style type="text/css">
        body {
            width: 650px;
            font-family: work-Sans, sans-serif;
            background-color: #fafafa;
            display: block;
        }

        a {
            text-decoration: none;
        }

        span {
            font-size: 14px;
        }

        p {
            font-size: 13px;
            line-height: 1.7;
            letter-spacing: 0.7px;
            margin-top: 0;
        }

        .text-center {
            text-align: center
        }

        h6 {
            font-size: 16px;
            margin: 0 0 18px 0;
        }
    </style>
</head>

<body style="margin: 30px auto;">
    <div style="height:100%;margin:0;padding:0;width:100%;background-color:#fafafa">
        <table style="width: 100%">
            <tbody>
                <tr>
                    <td>
                        <table style="background-color: #fafafa; width: 100%">
                            <tbody>
                                <tr>
                                    <td style="text-align: center; color:#999">
                                        <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/health-logo-design-template-413edd6c579e1c7ac61e14ffdd75eec5_screen.jpg" alt="">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="width: 650px; margin: 0 auto; background-color: #fff; border-radius: 8px">
                            <tbody>
                                <tr>
                                    <td style="padding: 30px">
                                        <h6 style="font-weight: 600">Password Reset</h6>
                                        <p>You forgot your password for <?= APP_NAME ?>. If this is true, use given reset code to reset your password.</p>
                                        <hr>
                                        <h4 style="text-align: center;">
                                            Reset Code : <span><?= $code ?></span>
                                        </h4>
                                        <hr>
                                        <p>If you have remember your password you can safely ignore this email.</p>
                                        <p>Good luck! Hope it works.</p>
                                        <p style="margin-bottom: 0">
                                            Regards,<br><?= APP_NAME ?>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="width: 650px; margin: 0 auto; margin-top: 30px; text-align: center">
                            <tbody>
                                <tr>
                                    <td>
                                        <p style="font-size:13px; margin:0;">
                                            <a href="mailto:help@hims.lk?subject=Account Security Inquiry" title="Click & send email to Ask Help" style="color:#656565;font-weight:normal;text-decoration:none" rel="noreferrer">
                                                help@hims.lk
                                            </a>
                                        </p>
                                        <p style="font-size:13px; margin:0;">
                                            <em>Copyright @<?= date('Y'); ?> <?= APP_NAME ?>. All rights reserved.</em>
                                        </p>
                                        <br>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>