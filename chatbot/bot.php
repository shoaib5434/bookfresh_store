<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Chatbot in PHP | CampCodes</title>
    <style type="text/css">
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
      *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          font-family: 'Poppins', sans-serif;
      }
      ::selection{
          color: #fff;
          background:green;
      }

      ::-webkit-scrollbar{
          width: 3px;
          border-radius: 25px;
      }
      ::-webkit-scrollbar-track{
          background: #f1f1f1;
      }
      ::-webkit-scrollbar-thumb{
          background: #ddd;
      }
      ::-webkit-scrollbar-thumb:hover{
          background: #ccc;
      }

      .wrapper{
          z-index: 99999;
          width:300px;
          background: #fff;
          border-radius: 5px;
          border: 1px solid lightgrey;
          border-top: 0px;
          position: fixed;
          display: none;
          right: 10%;
          bottom: 13%;
      }
      .wrapper .title{
          background: green;
          color: #fff;
          font-size: 20px;
          font-weight: 500;
          line-height: 50px;
          text-align: center;
          border-bottom: 1px solid green;
          border-radius: 5px 5px 0 0;
      }
      .wrapper .form{
          padding: 20px 15px;
          min-height: 400px;
          max-height: 400px;
          overflow-y: auto;
      }
      .wrapper .form .inbox{
          width: 100%;
          display: flex;
          align-items: baseline;
      }
      .wrapper .form .user-inbox{
          justify-content: flex-end;
          margin: 13px 0;
      }
      .wrapper .form .inbox .icon{
          height: 40px;
          width: 40px;
          color: #fff;
          text-align: center;
          line-height: 40px;
          border-radius: 50%;
          font-size: 18px;
          background:green;
      }
      .wrapper .form .inbox .msg-header{
          max-width: 53%;
          margin-left: 10px;
      }
      .form .inbox .msg-header p{
          color: #fff;
          background: green;
          border-radius: 10px;
          padding: 8px 10px;
          font-size: 14px;
          word-break: break-all;
      }
      .form .user-inbox .msg-header p{
          color: #333;
          background: #efefef;
      }
      .wrapper .typing-field{
          display: flex;
          height: 60px;
          width: 100%;
          align-items: center;
          justify-content: space-evenly;
          background: #efefef;
          border-top: 1px solid #d9d9d9;
          border-radius: 0 0 5px 5px;
      }
      .wrapper .typing-field .input-data{
          height: 40px;
          width: 335px;
          position: relative;
      }
      .wrapper .typing-field .input-data input{
          height: 100%;
          width: 100%;
          outline: none;
          border: 1px solid transparent;
          padding: 0 80px 0 15px;
          border-radius: 3px;
          font-size: 15px;
          background: #fff;
          transition: all 0.3s ease;
      }
      .typing-field .input-data input:focus{
          border-color: green;
      }
      .input-data input::placeholder{
          color: #999999;
          transition: all 0.3s ease;
      }
      .input-data input:focus::placeholder{
          color: #bfbfbf;
      }
      .wrapper .typing-field .input-data button{
          position: absolute;
          right: 5px;
          top: 50%;
          height: 30px;
          width: 65px;
          color: #fff;
          font-size: 16px;
          cursor: pointer;
          outline: none;
          opacity: 0;
          pointer-events: none;
          border-radius: 3px;
          background: green;
          border: 1px solid green;
          transform: translateY(-50%);
          transition: all 0.3s ease;
      }
      .wrapper .typing-field .input-data input:valid ~ button{
          opacity: 1;
          pointer-events: auto;
      }
      .typing-field .input-data button:hover{
          background: green;
      }
      p.fas {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        position: fixed;
        right: 5%;
        bottom: 5%;
        background: green;
        cursor: pointer;
        text-align: center;
        line-height: 60px;
        z-index: 99999;
        color: white;
        font-size: 40px;
      }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="wrapper">
   
        <div class="title">Chatbot</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Hello there, how can I help you?</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="input" type="text" placeholder="Type something here.." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>
    <p id="open-bot" class="fas fa-comment"></p>

    <script>
       $(document).ready(function(){
     $('#send-btn').on('click',function(event){
        event.preventDefault();
        let userMessage = $('#input').val();
        $('#input').val('');

         $('.form').append(`
             <div class="user-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>`+userMessage+`</p>
                </div>
            </div>
          `);


        $.ajax({
          url : '../chatbot/chat_bot_reply.php',
          method : 'post',
          data : {userMessage : userMessage},
          success : function(data) {
            $('.form').append(`
              <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>`+data+`</p>
                </div>
            </div>
          `);
          }
        })
      })
     let isBotOpen = false;
     $('#open-bot').on('click',function(){
      if (!isBotOpen) {
        $('.wrapper').show(100);
        $(".bgBlur").show(100);
        $('#open-bot').removeClass('fa-comment');
        $('#open-bot').addClass('fa-times');
        isBotOpen = true;
      }
      else {
        $('.wrapper').hide(100);
        $(".bgBlur").hide(100);
        $('#open-bot').removeClass('fa-times');
        $('#open-bot').addClass('fa-comment');
        isBotOpen = false;
      }
     })
   })
    </script>
    
</body>
</html>