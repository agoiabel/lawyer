<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <style>
        html, body {
            font-family: Roboto, sans-serif;
            background: #efefef;
            width: 100%; 
        }

        @font-face {
            font-family: 'Silka';
            src: local('Silka'), url('https://res.cloudinary.com/hirefreehands-tech/raw/upload/v1600696172/Fonts/Silka-Regular_kkahl7.otf') format('opentype');
        }

        .mail {
            width: 600px;
            margin: auto;
            background-color: #FFF;
        }

        .image-welcome {
            width: 600px;
            height: 402px;
        }

        .heading {
            font-family: Silka;
            font-size: 29px;
            text-align: Center;
            color: #254335;

            margin-top: -20px;
        }

        .sub-heading { 
            width: 270px;
            margin: auto;
            padding-top: 60px;

            font-style: normal;
            font-weight: 400;
            font-size: 22px;
            line-height: 114%;
            text-align: center;
            color: #4D5754;
            
        }

        .welcome-message {
            width: 350px;
            margin: auto;
            padding-top: 20px;

            font-weight: 400;
            font-size: 14px;
            line-height: 16px;
            text-align: center;
            color: #4D5754;            

        }

        .mail-body-footer {
            width: 370px;
            margin: auto;
            display: flex;
            align-items: center;
            padding: 60px 0;

        }

        .image-chat {
            width: 95px;
            height: 95px;
        }

        .footer-text {
            font-family: Roboto;
            font-size: 12px;
            line-height: 14px;
            color: #92A19A;
            
            padding-left: 20px;
        }

        .btn_icon {
            display: inline-block;
            opacity: 1;
            border: none;
            color: #FFFFFF;
            cursor: pointer;
            font-weight: 400;
            font-size: 16px;
            line-height: 36px;
            padding: 5px 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            text-decoration: none;
            background-color: #34C134;
            transition: all 0.3s ease 0s;
        }
    </style>
</head>

<body>

    <div class="mail">
        <div class="mail-header">
            <img src="https://res.cloudinary.com/hirefreehands-tech/image/upload/v1600600605/Web%20App/email-welcome_viyzz4.png" class="image-welcome">
        </div>

        <div class="mail-body">
            <div class="heading">Reset Password!, {!! $user->name !!}</div>
            <div class="sub-heading">Please use this when resetting your password,</div>
            <div class="welcome-message">
                <!-- Now you have access to our workplace platform where you can hire top talent to build your tech projects or join our talent pool to earn money online. -->
                <p>
                    To continue using the platform, confirm your email address and activate your account, please click the link below.                    
                </p>
                <p>
                    {!! $user->auth_token !!}
                </p>
            </div>

             <div class="mail-body-footer">
                <img src="https://res.cloudinary.com/hirefreehands-tech/image/upload/v1600600604/Web%20App/email-chat_amgpfb.png" class="image-chat">

                <div class="footer-text">
                    <p>Hugs/bugs? kindly let us know by replying to this e-mail.</p><br/> Regards <br/>
                    The Lawyer Team
                </div>
             </div>
        </div>

    </div>
</body>
</html>