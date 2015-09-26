function ajax(name, poll_id, input, comment, block){
            $.ajax({
                url: "controller/comment.php",
                type: "POST",
                data: ({comment:comment, poll_id:poll_id}),
                dataType: "text",
                success: function(data){
                    if(data==1) {
                        $(block).append('<strong><a href="">' + name + '</a></strong>' + ': ' + comment + '<br>');
                        $(input).val('');

                    }
                }
            });
}


function popup(){
    if(document.getElementById('poll').style.display=='block'){
    document.getElementById('poll').style.display='none';
        document.getElementById('button_c').setAttribute('value', 'Задать вопрос');
    }else {
        document.getElementById('poll').style.display='block';
        document.getElementById('button_c').setAttribute('value', 'Скрыть');
    }
}


var numPolls = 10;
function loadPolls(){
    $.ajax({
        url: "controller/loadPolls.php",
        type: "POST",
        data: ({numPolls:numPolls}),
        dataType: "text",
        success: function(data){
            $("#feed_menu").append(data);
            numPolls=numPolls+11;
        }
    });
}


function loadComments(poll_id){
    $.ajax({
        url: "controller/loadComments.php",
        type: "POST",
        data: ({numComments:10, polls_id:poll_id}),
        dataType:"text",
        success: function(data){
            if(data==0){
                $("#loadComments"+poll_id).hide();
                return;
            }
            $("#block"+poll_id).append(data);
            $("#loadComments"+poll_id).hide();

        }
    })
}

function profile(){

}

function sandbox(){
    $("#feed_menu").hide();
    $("#loadPolls").hide();

    $("#sand_menu").show();
}

function ratingUp(poll_id, user_id){
    $.ajax({
        url: "controller/ratingUp.php",
        type: "POST",
        data: ({poll_idUp:poll_id,user_idUp:user_id}),
        dataType: "html",
        success: function(data){
            if(data != 33){
                $("#rate"+poll_id).text(data);
            }else if(data==33) alert('Ты это уже оценил, давай дальше!');
            else if(data==3) alert('Ошибка');

        }

    })
}

function ratingDown(poll_id, user_id){
    $.ajax({
        url: "controller/ratingDown",
        type: "POST",
        data: ({poll_idDown:poll_id, user_idDown:user_id}),
        dataType: "html",
        success: function(data){
            if(data != 33) {
                $("#rate"+poll_id).text(data);
            } else if(data==33) alert('Ты это уже оценил, давай дальше!');
            else if(data==3) alert('Ошибка');
        }
    })
}



function sendResult(poll_id, user_id){
    var opt = $("input:radio[name='answer']:checked").val();
        $.ajax({
            url: "controller/results.php",
            type: "POST",
            data: ({option:opt, poll_id:poll_id, user_id:user_id}),
            dataType: "html",
            success: function (data) {
                if(data==5){
                    alert('Человек, выбери вариант ответа.');
                }else if(data==2){alert('Ты уже голосовал');}
                else {
                    $("#answers"+poll_id).html(data);
                }
            }
        })
}


function test(){
    var txt = $("input:radio[name='answer']:checked").val();
    $.ajax({
        url: "controller/results.php",
        type:"POST",
        data:({answer:txt}),
        dataType:"html",
        success:function(data){
            alert(data);
        }
    })
}