<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat UI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            height: 100%;
        }
        .chat-container {
            width: 100%;
            height: 100%;
            background: white;
            display: flex;
            flex-direction: column;
        }
        .chat-box {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }
        .message {
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
            max-width: 70%;
        }
        .user-message {
            align-self: flex-end;
            background-color: #007aff;
            color: white;
        }
        .received-message {
            align-self: flex-start;
            background-color: #e5e5ea;
        }
        .chat-input {
            display: flex;
            border-top: 1px solid #ccc;
            padding: 10px;
        }
        .chat-input input {
            flex: 1;
            padding: 10px;
            border: none;
            outline: none;
            font-size: 16px;
        }
        .chat-input button {
            padding: 10px 15px;
            border: none;
            background: #007aff;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-box">
            <div class="message user-message">Ratione magni nostrum velit molestias enim repudiandae est aut minus</div>
            <div class="message received-message">Velit reprehenderit eligendi do quo sit cupiditate quia nemo ea rerum aut atque est enim</div>
            <div class="message received-message">Laborum autem est sed officia molestiae</div>
            <div class="message received-message">Mollitia ut in sunt earum numquam id ullamco corporis autem officiis at alias mollit recusandae Eum deleniti unde dolores sed</div>
            <div class="message received-message">Dolorem harum impedit eos sit Nam ea omnis temporibus vel asperiores dolores non voluptatem Quis</div>
        </div>
        <div class="chat-input">
            <input type="text" placeholder="Write your message here...">
            <button>Send</button>
        </div>
    </div>
</body>
</html>
