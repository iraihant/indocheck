import Swal from 'sweetalert2';
// window.Swal = Swal; 

var ajaxCall;

Array.prototype.remove = function(value){
    var index = this.indexOf(value);
    if(index != -1){
        this.splice(index, 1);
    }
    return this;
};

function enableTextArea(bool){
    $('#card-input').attr('disabled', bool);
}
function count_liveUp(){
    var count = parseInt($('liveres').html());
    count = count+1;
    $('liveres').html(count+'');
}
function count_dieUp(){
    var count = parseInt($('deadres').html());
    count = count+1;
    $('deadres').html(count+'');
}
function count_unkUp(){
    var count = parseInt($('unknownres').html());
    count = count+1;
    $('unknownres').html(count+'');
}
function updateTitle(str){
    document.title = str;
}

function filterMP(mp, delim){
    var mps = mp.split("\n");
    var lstMP = new Array();
    for(var i=0;i<mps.length;i++){
            var infoMP = mps[i].split(delim);
            for(var k=0;k<infoMP.length;k++){
                var ccnum = $.trim(infoMP[k]);
                var ccmon = $.trim(infoMP[k+1]);
                var ccyear = $.trim(infoMP[k+2]);
                var ccvv = $.trim(infoMP[k+3]);
                lstMP.push(ccnum+'|'+ccmon+'|'+ccyear+'|'+ccvv);
                break;
            }
    }
    return lstMP;
}

function updateTextBox(cc){
    var card = $('#card-input').val().split("\n");
    card.remove(cc);
    $('#card-input').val(card.join("\n"));
}
function resetResult() {
    $('#res_die,#res_unkw').html('');
    $('deadres,unknownres').text(0);
}
function stopLoading(bool, bool2, msg){
    // $('#loading').attr('src', '');
    var str = $('#checkStatus').html();
    $('#checkStatus').html(str.replace('Checking','Stopped')).removeClass('bg-success').addClass('bg-danger');
    enableTextArea(false);
    $('#start').attr('disabled', false);
    $('#stop').attr('disabled', true);
    if(bool && !bool2){
        Swal.fire({
            title: "Checking Complete",
            timer: 4000,
            icon: "success",
            allowEscapeKey: true,
            allowOutsideClick: true,
            text: "Thanks",
            // html: true,
            confirmButtonText: "Continue"
        });
    } else if (!bool && bool2){
        Swal.fire({
            title: "Can't Check",
            timer: 4000,
            allowEscapeKey: true,
            allowOutsideClick: true,
            icon: "error",
            text: msg,
            confirmButtonText: "Continue"
        });
    }else{
        ajaxCall.abort();
    }
        updateTitle('Stopped');
}

function ExecuteNya(card, curMP, delim, no){
    if(card.length<1 || curMP>=card.length){
        stopLoading(true, false);
        return false;
    }
    updateTextBox(card[curMP]);
    ajaxCall = $.ajax({
        url: 'http://127.0.0.1:8000/card-check/gate-1/check',
        dataType: 'json',
        cors: true ,
        cache: false,
        type: 'POST',
        headers: {
            'Access-Control-Allow-Origin': '*',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function (e) {
            updateTitle('['+no+'/'+card.length+']  Checking - 16Digits');
            var str = $('#checkStatus').html();
            $('#checkStatus').html(str.replace('Stopped','Checking')).removeClass('bg-danger').addClass('bg-success');
            // $('#loading').attr('src', 'https://cdn.pixabay.com/animation/2023/03/20/02/45/02-45-27-186_512.gif');
        },
        data: 'ajax=1&do=check&data='+encodeURIComponent(card[curMP])
                +'&delim='+encodeURIComponent(delim),
        success: function(data) {
            switch(data.error){
                case -2:
                    break;
                case -1:
                    curMP++;
                    no++;
                    $('#res_unkw').append(data.msg+'<br />');
                    count_unkUp();
                    break;
                case 2:
                    curMP++;
                    no++;
                    $('#res_die').append(data.msg+'<br />');
                    $('#your_credits').text(data.bal);
                    count_dieUp();
                    break;
                case 5:
                    stopLoading(false, true, data.msg);
                    return false;
                case 0:
                    curMP++;
                    no++;
                    $('#res_live').append(data.msg+'<br />');
                    $('#your_credits').text(data.bal);
                    count_liveUp();
                    break;
            }
           
            ExecuteNya(card, curMP, delim, no);
        }
    });
    return true;
}



document.addEventListener('livewire:navigated', async () => {
    $(document).ready(function(){
        $('#stop').attr('disabled', true).click(function(){
            stopLoading(false, false);
        });
        $('#start').click(function(){
            var no = 1;
            var delim = $('#delim').val().trim();
            var regex = /\d{1,16}\|\d{1,2}\|\d{1,4}\|\d{1,4}/g;
            var ccall = $('#card-input').val().match(regex);
            if(ccall != null){
                var card = filterMP($('#card-input').val(), delim);
                if($('#card-input').val().trim()==''){
                    Swal.fire({
                        title: "Can't Check",
                        timer: 4000,
                        allowEscapeKey: true,
                        allowOutsideClick: true,
                        icon: "error",
                        text: "Please drop an email and password in the fields!",
                        confirmButtonText: "Continue"
                    });
                    return false;
                }
                $('#card-input').val(card.join("\n")).attr('disabled', true);
                $('#result').fadeIn(1000);
                resetResult();
                $('#start').attr('disabled', true);
                $('#stop').attr('disabled', false);
                ExecuteNya(card, 0, delim, no);
                return false;
            }else{
                Swal.fire({
                    title: "Can't Check",
                    timer: 4000,
                    allowEscapeKey: true,
                    allowOutsideClick: true,
                    icon: "error",
                    text: "Please drop an Credit Card in the fields!",
                    confirmButtonText: "Continue"
                });
                return false;
            }
        });
    });
    
});