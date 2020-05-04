<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User 1</title>

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <style>
        #video-container {
            position: relative;
            margin: auto;
            width: 100%;
        }

        video {
            background: #dee;
        }

        #callButton{
            width: 60px;
            height: 60px;
            text-align: center;
            padding: 5px;
            color: #fff;
            -moz-border-radius: 100px;
            -webkit-border-radius: 100px;
            border-radius: 100px;
        }

        #endCallButton{
            width: 60px;
            height: 60px;
            text-align: center;
            padding: 5px;
            color: #fff;
            -moz-border-radius: 100px;
            -webkit-border-radius: 100px;
            border-radius: 100px;
        }

        #answerCallButton{
            font-weight: bold;
            width: 60px;
            height: 60px;
            text-align: center;
            padding: 5px;
            color: #fff;
            -moz-border-radius: 100px;
            -webkit-border-radius: 100px;
            border-radius: 100px;
        }

        #rejectCallButton{
            margin-left: 20px;
            width: 60px;
            height: 60px;
            text-align: center;
            padding: 5px;
            color: #fff;
            -moz-border-radius: 100px;
            -webkit-border-radius: 100px;
            border-radius: 100px;
        }

        #localVideo {
            border-radius: 10px;
            border: 1px solid #cc0000;
            padding: 1px;
            position: absolute;
            z-index: 10;
            background: #333;
            width: 100%;
            height: 500px;
            background-color: #000000;;

        }
        #remoteVideo {
            border-radius: 10px;
            border: 1px solid #cc0000;
            width: 100%;
            height: 500px;
            padding: 1px;
            position: absolute;
            z-index: 10;
            background-color: #000000;;
        }

        #action-buttons {
            margin: 0px auto;
            text-align:left;
            margin-top: 520px;
            text-align: center;
            -moz-border-radius: 100px;
            -webkit-border-radius: 100px;
            border-radius: 100px;
        }

        .hidden-first {
            display: none;
        }

        #message{
            margin-top: 250px;
        }
        #Ignore{
            display: inline-block;
        }
        #but{
            margin-top: 50px;
            display: inline-block;
        }
    </style>
</head>
<body style="background-color: #000000;">

<div class="container" style="width: 100%; height: 100%">
    <div class="row">
        <div class="col-12">
            <font font-family: sans serif size="3" style="color: #FFFFFF">Time: 00:05 </font><br />
        </div>
        <div class="col-6">
            <font font-family: sans serif size="5" style="color: #FFFFFF">Name: TuanNT</font><br />
            <div id="video-container">
                <video id="remoteVideo" autoplay></video>
            </div>
        </div>
        <div class="col-6">
            <font font-family: sans serif size="5" style="color: #FFFFFF">Name: HaiNH</font><br />
            <div id="video-container">
                <video id="localVideo" autoplay muted></video>
            </div>
        </div>
        <div class="col-12">

            <div class="col" id="action-buttons">
                <button id="callButton" class="btn btn-success"><img src="https://nguyenhung.net/wp-content/uploads/2019/05/icon-call-nh.png" alt="Meeting now" width="30" ></button>

                <button id="answerCallButton" class="btn btn-info hidden-first">Join</button>
                <button id="rejectCallButton" class="btn btn-warning hidden-first"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                                        width="30" height="30"
                                                                                        viewBox="0 0 172 172"
                                                                                        style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M121.83333,25.585l28.41583,28.41583l-28.41583,28.41583z" fill="#ffffff"></path><path d="M86,46.58333h43v14.33333h-43z" fill="#ffffff"></path><path d="M25.06542,31.72325l0.13617,13.416c0.48375,47.257 61.09225,101.22558 101.64125,101.64125l13.41958,0.13617c3.70517,0.03583 6.67575,-2.93475 6.63992,-6.63992l-0.27592,-26.832c-0.03942,-3.70517 -3.07092,-6.73667 -6.77608,-6.77608l-29.22925,-0.602l-14.36917,16.86317c-9.46717,-0.09675 -47.10292,-37.73608 -47.19967,-47.19967l16.86317,-15.351l-0.602,-28.24383c-0.03942,-3.70517 -3.07092,-6.73667 -6.77608,-6.77608l-26.832,-0.27592c-3.70517,-0.03583 -6.67575,2.93475 -6.63992,6.63992z" fill="#2ecc71"></path></g></g></svg></button>

                <button id="endCallButton" class="btn btn-danger hidden-first" ><img src="https://img.icons8.com/office/30/000000/end-call.png" width="30"></button>
            </div>
        </div>

    </div>
</div>


<script src="js/lib/jquery.js"></script>
<script src="js/lib/socket.io-2.2.0.js"></script>
<script src="js/StringeeSDK-1.5.10.js"></script>

<!-- button -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>




<script>
    var token = 'eyJjdHkiOiJzdHJpbmdlZS1hcGk7dj0xIiwidHlwIjoiSldUIiwiYWxnIjoiSFMyNTYifQ.eyJqdGkiOiJTS1JyemhYdWhSNjVWRWo0d0tqWEkwZ1lYa1RrdXdsUjBrLTE1ODg2MDQ4ODQiLCJpc3MiOiJTS1JyemhYdWhSNjVWRWo0d0tqWEkwZ1lYa1RrdXdsUjBrIiwiZXhwIjoxNTkxMTk2ODg0LCJ1c2VySWQiOiJUMTAwMDEifQ.5vwRvN6UJnoJHJYA6jKUqUGvsPZKa4wUVwEuhzoDOEE';
    var callerId = 'T10001';
    var calleeId = 'GCH10001';
</script>


<script src="js/code.js"></script>
</body>
</html>
