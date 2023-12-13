<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>chat app - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            background-color: #f4f7f6;
            margin-top: 20px;
        }

        .chat-history {
            /* height: 800px; */
            /* Set a fixed height for the chat history */
            overflow-y: auto;
        }


        .card {
            background: #fff;
            transition: .5s;
            border: 0;
            margin-bottom: 30px;
            border-radius: .55rem;
            position: relative;
            width: 100%;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
        }

        .chat-app .people-list {
            width: 280px;
            position: absolute;
            left: 0;
            top: 0;
            padding: 20px;
            z-index: 7
        }

        .chat-app .chat {
            margin-left: 280px;
            border-left: 1px solid #eaeaea
        }

        .people-list {
            -moz-transition: .5s;
            -o-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s
        }

        .people-list .chat-list li {
            padding: 10px 15px;
            list-style: none;
            border-radius: 3px
        }

        .people-list .chat-list li:hover {
            background: #efefef;
            cursor: pointer
        }

        .people-list .chat-list li.active {
            background: #efefef
        }

        .people-list .chat-list li .name {
            font-size: 15px
        }

        .people-list .chat-list img {
            width: 45px;
            border-radius: 50%
        }

        .people-list img {
            float: left;
            border-radius: 50%
        }

        .people-list .about {
            float: left;
            padding-left: 8px
        }

        .people-list .status {
            color: #999;
            font-size: 13px
        }

        .chat .chat-header {
            padding: 15px 20px;
            border-bottom: 2px solid #f4f7f6
        }

        .chat .chat-header img {
            float: left;
            border-radius: 40px;
            width: 40px
        }

        .chat .chat-header .chat-about {
            float: left;
            padding-left: 10px
        }

        .chat .chat-history {
            padding: 10px;
            padding-top: 0px;
            padding-bottom: 0px;
        }

        .chat .chat-history ul {
            padding: 0
        }

        .chat .chat-history ul li {
            list-style: none;
            margin-bottom: 30px
        }

        .chat .chat-history ul li:last-child {
            margin-bottom: 0px
        }

        .chat .chat-history .message-data {
            margin-bottom: 15px
        }

        .chat .chat-history .message-data img {
            border-radius: 40px;
            width: 40px
        }

        .chat .chat-history .message-data-time {
            color: #434651;
            padding-left: 6px
        }

        .chat .chat-history .message {
            color: #444;
            padding: 18px 20px;
            line-height: 26px;
            font-size: 16px;
            border-radius: 7px;
            display: inline-block;
            position: relative
        }

        .chat .chat-history .message:after {
            bottom: 100%;
            left: 7%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #fff;
            border-width: 10px;
            margin-left: -10px
        }

        .chat .chat-history .my-message {
            background: blue;
            color: white
        }

        .chat .chat-history .my-message:after {
            bottom: 100%;
            left: 30px;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #efefef;
            border-width: 10px;
            margin-left: -10px
        }

        .chat .chat-history .other-message {
            background: lightgray;
            text-align: right
        }

        .chat .chat-history .other-message:after {
            border-bottom-color: #e8f1f3;
            left: 93%
        }

        .chat .chat-message {
            padding: 20px
        }

        .online,
        .offline,
        .me {
            margin-right: 2px;
            font-size: 8px;
            vertical-align: middle
        }

        .online {
            color: #86c541
        }

        .offline {
            color: #e47297
        }

        .me {
            color: #1d8ecd
        }

        .float-right {
            float: right
        }

        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0
        }

        @media only screen and (max-width: 767px) {
            .chat-app .people-list {
                height: 465px;
                width: 100%;
                overflow-x: auto;
                background: #fff;
                left: -400px;
                display: none
            }

            .chat-app .people-list.open {
                left: 0
            }

            .chat-app .chat {
                margin: 0
            }

            .chat-app .chat .chat-header {
                border-radius: 0.55rem 0.55rem 0 0
            }

            .chat-app .chat-history {
                height: 300px;
                overflow-x: auto
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 992px) {
            .chat-app .chat-list {
                height: 650px;
                overflow-x: auto
            }

            .chat-app .chat-history {
                height: 600px;
                overflow-x: auto
            }
        }

        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
            .chat-app .chat-list {
                height: 480px;
                overflow-x: auto
            }

            .chat-app .chat-history {
                height: calc(100vh - 350px);
                overflow-x: auto
            }
        }

        .chat-message {
            padding: 20px;
            position: sticky;
            bottom: 0;
            background-color: #fff;
            /* Set a background color to differentiate from the chat history */
            z-index: 1;
        }
    </style>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <div class="container">

        <div class="row clearfix">
            <!-- People list -->
            <<div class="col-lg-3">
                <div class="card chat-app">
                    <div id="plist" class="people-list">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                        <ul class="list-unstyled chat-list mt-2 mb-0">
                            <?php foreach ($users as $user) : ?>
                                <?php if ($user['id'] !== $currentUser['id']) : ?>
                                    <a href="<?= site_url('/chats/' . $user['id']) ?>" style="text-decoration: none; color: inherit;">
                                        <li class="clearfix">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                                            <div class="about">
                                                <div class="name"><?= $user['firstName'] . ' ' . $user['lastName'] ?></div>
                                                <!-- You can add more user details here -->
                                            </div>
                                        </li>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                </div>
        </div>

        <div class="chat" style="width: 700px">
            <?php
            // Display chat header only once
            $firstChat = true;
            if (empty($chats)) : ?>
                <div class="chat-history">
                    <p>Start a conversation with <?= $chatUser['firstName'] . ' ' . $chatUser['lastName'] ?></p>
                </div>
                <?php else :
                foreach ($chats as $chat) : ?>

                    <?php
                    // Find the user with the matching ID
                    $receiverUser = array_values(array_filter($users, function ($user) use ($chatUser) {
                        return $user['id'] === $chatUser['id'];
                    }))[0];
                    ?>

                    <?php if ($firstChat) : ?>
                        <div class="chat-header clearfix">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                    </a>
                                    <div class="chat-about">
                                        <h6 class="m-b-0">
                                            <?= $receiverUser['firstName'] . ' ' . $receiverUser['lastName'] ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $firstChat = false; ?>
                    <?php endif; ?>

                    <!-- ... your existing code ... -->

                    <div class="chat-history">
                        <ul class="m-b-0">
                            <li class="clearfix">
                                <?php
                                $messageClass = ($chat['sender'] === $currentUser['id']) ? 'my-message' : 'other-message';
                                ?>
                                <div class="message <?= $messageClass ?> float-<?= ($messageClass === 'my-message') ? 'right' : 'left' ?>">
                                    <?= $chat['message'] ?>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- ... your existing code ... -->

                <?php endforeach; ?>
            <?php endif; ?>
            <div class="chat-message clearfix">
                <form action="<?= site_url('/sendmessage') ?>" method="post">
                    <input type="hidden" name="receiver" value="<?= $chatUser['id']; ?>">
                    <div class="input-group mb-0">
                        <input type="text" class="form-control" name="message" placeholder="Enter text here...">
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Function to reload the chat content
            function reloadChat() {
                // Reload the chat content here
                // You can use AJAX to fetch new messages or update the chat content

                // For demonstration purposes, let's reload the entire page
                location.reload();
            }

            // Set the interval for auto-reload (e.g., every 5 seconds)
            setInterval(reloadChat, 5000); // Adjust the interval as needed
        });
    </script>
</body>

</html>