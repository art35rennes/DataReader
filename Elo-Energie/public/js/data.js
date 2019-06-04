//-------------------------------
//         Declaration
//-------------------------------

function getGraphStat(element) {

    $.get("/data/graphStats/"+$('#id').val()+"/"+element, function($data){       //$.get(URL,callback);
        $data = JSON.parse($data);
        $('#'+element+"_min").html(($data[0].min).toFixed(2));
        $('#'+element+"_max").html(($data[0].max).toFixed(2));
        $('#'+element+"_avg_abs").html(($data[0].avg_abs).toFixed(2));
    });
}

function time() {
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date+' '+time;

    return dateTime;
}

function makeplot() {
    // console.log('Start: '+time());
    Plotly.d3.csv("/data/csv/"+$('#id').val(), function(data){ processData(data) } );
}

function processData(allRows) {

    // console.log('Process: '+time());
    // console.log(allRows);
    var x = [], ld = [], lma = [];

    var l = allRows.length/2;
    for (var i=0; i<l; i++) {
        row = allRows[i];
        // x.push( i<l?row['x']:-row['x'] );
        x.push( -row['x'] );
        ld.push( row['ld'] );
        lma.push( row['lma'] );
    }

    // console.log( 'X',x, 'Y',y, 'SD',standard_deviation );
    // console.log('LD: '+time());
    makePlotly( x, ld, 'ldGraph' );
    // console.log('LMA: '+time());
    makePlotly( x, lma, 'lmaGraph' );
}

function makePlotly( x, y, graph ){
    var data = [{
        x: x,
        y: y,
        width:1,
    }];
    var config = {
        locale: 'fr',
        scrollZoom: true,
        displayModeBar: false,
        responsive: true,
    };
    var layout = {
        margin: {
            l: 50,
            r: 0,
            b: 50,
            t: 0,
            pad: 0
        },
    };
    Plotly.newPlot(graph, data, layout, config);
    $('#'+graph).prev().hide();
    getGraphStat(graph);
    // console.log(graph+': '+time());
}

function xTranslation($input) {
    var xS = document.getElementById($input.parent().attr('id')+'Graph').layout.xaxis.range[0];
    var xE = document.getElementById($input.parent().attr('id')+'Graph').layout.xaxis.range[1];
    // console.log(
    //     "v: ", (Math.abs((xE)-(xS))/50+$input.val()),
    //     "\nV: ", 0.01*$input.val()
    // );
    var update = {
        'xaxis.range':[
            xS+0.01*$input.val(),
            xE+0.01*$input.val()
        ]
    };
    Plotly.relayout($input.parent().attr('id')+'Graph', update);
}

function yTranslation($input) {
    var yS = document.getElementById($input.parent().attr('id')+'Graph').layout.yaxis.range[0];
    var yE = document.getElementById($input.parent().attr('id')+'Graph').layout.yaxis.range[1];
    // console.log($input.val());
    var update = {
        'yaxis.range':[yS+0.01*$input.val(), yE+0.01*$input.val()],
    };
    Plotly.relayout($input.parent().attr('id')+'Graph', update);
}

function yZoom($input) {
    var yS = document.getElementById($input.parent().attr('id')+'Graph').layout.yaxis.range[0];
    var yE = document.getElementById($input.parent().attr('id')+'Graph').layout.yaxis.range[1];
    // console.log($input.val());
    var update = {
        'yaxis.range':[yS-0.01*$input.val(), yE+0.01*$input.val()],
    };
    Plotly.relayout($input.parent().attr('id')+'Graph', update);
}

//-------------------------------
//       Initialisation
//-------------------------------

$('.container-fluid').removeClass('w-75');
$('.container-fluid').addClass('row');

var mousedownID = -1;  //Global ID of mouse down interval

makeplot();

// console.log('Fin: '+time());

//-------------------------------
//            Event
//-------------------------------

$('#ldGraph, #lmaGraph').on('plotly_relayout', function(eventdata){
    var xS =eventdata.target.layout.xaxis.range[0], xE =eventdata.target.layout.xaxis.range[1], yS =eventdata.target.layout.yaxis.range[0], yE =eventdata.target.layout.yaxis.range[1];
        if($(this).attr('id')==='ldGraph'){
            var update = {
                'xaxis.range':[xS, xE],
            };
            Plotly.relayout('lmaGraph', update);
        }
    });


$('input[type=range]').mousedown(function () {
    if(mousedownID==-1){
        if($(this).hasClass('X')){
            mousedownID = setInterval(xTranslation, 20,$(this));
        }
        else{
            if($(this).hasClass('Y')){
                mousedownID = setInterval(yTranslation, 20,$(this));
            }
            else {
                if($(this).hasClass('zY')){
                    mousedownID = setInterval(yZoom, 20,$(this));
                }
            }
        }


    }  //Prevent multimple loops!
});

$('input[type=range]').mouseup(function(){
    if(mousedownID!=-1) {  //Only stop if exists
        console.log('stop');
        $(this).val(0);
        clearInterval(mousedownID);
        mousedownID=-1;
    }
});

$('.y-axis').click(function () {

    $avg = parseInt($(this).parent().find('#'+$(this).parent().attr('id')+'Graph_avg_abs').text());
    console.log($avg, $(this).val(), $(this).val()+$avg);
    var update = {
        'yaxis.range':[-parseInt($(this).val())+$avg, parseInt($(this).val())+$avg],
    };
    Plotly.relayout($(this).parent().attr('id')+'Graph', update);
});

$('.exportGraph').click(function () {
    $graph = $(this).parent().attr('id')+'Graph';

    Plotly.downloadImage($graph,{format:'png',height:400,width:1200, filename: $graph});
});


