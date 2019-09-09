var ld = {
    x: [],
    y: [],
    xaxis: 'x1',
    yaxis: 'y1',
    type: 'scatter',
    name:"ld",
};

var lma = {
    x: [],
    y: [],
    xaxis: 'x1',
    yaxis: 'y2',
    type: 'scatter',
    name:"lma",
};

var config = {
    locale: 'fr',
    scrollZoom: true,
    displayModeBar: true,
    responsive: true,
};

var data = [ld, lma];

var layout = {
    autosize: true,
    height: 600,
    margin: {
        l: 50,
        r: 0,
        b: 50,
        t: 50,
        pad: 0
    },

    grid: {
        rows: 2,
        columns: 1,
        subplots:['xy','x2y'],
        // roworder:'bottom to top'
    }
};

function loadData(evt) {
    //Retrieve the first (and only!) File from the FileList object
    var f = evt.target.files[0];
    $('#fileName').html(f.name);
    // console.log(f);

    if (f) {
        var r = new FileReader();
        r.onloadend = function(e) {
            var contents = e.target.result;
            $lines = contents.split("\n");

            $float = $("#float").val();
            $calibration = parseFloat($("#calibration").val());
            // $limit = $("#transit").prop("checked")?$lines.length:Math.round($lines.length/2);
            // $start = $("#transit").prop("checked")?Math.round($lines.length/2):0;

            $limit = $lines.length;
            $start = 0;
            var x;

            // console.log($a);
            for (i=$start; i<$limit; i++){
                // console.log(data);
                $row = $lines[i].split($("#delimiter").val());
                if ($row[1] !== undefined){
                    x = parseFloat($row[1].replace($float, '.'));
                    ld.x.push(x);
                    ld.y.push(parseFloat($row[2].replace($float, '.')));
                    lma.x.push(x);
                    lma.y.push(parseFloat($row[3].replace($float, '.')));
                }
            }
            lmaMin = min(lma.y);
            for (i=0; i<lma.y.length; i++){
                lma.y[i] = (lma.y[i]-lmaMin)*$calibration;
            }
            // console.log(lma.x);
            // console.log(lma.y);
            Plotly.newPlot('graphBase', data, layout, config);
            // fileloaded = true;
        };

        r.readAsText(f);

    } else {
        alert("Failed to load file");
    }
}

function min($tab){
    min = $tab[0];
    $.each($tab, function(index, value){
        min<value?null:min=value;
    });
    return min;
}

$('#apply-ld-v-value').click(function () {
    var update = {
        'yaxis.range':[parseFloat($('#ld-v-value').val())*-1.0, parseFloat($('#ld-v-value').val())],
    };

    // console.log(update);
    Plotly.relayout('graphBase', update);
});
$('#apply-ld-h-value').click(function () {
    var update = {
        'xaxis.range':[0, parseFloat($('#ld-h-value').val())],
    };

    // console.log(update);
    Plotly.relayout('graphBase', update);
});
$('#apply-lma-v-value').click(function () {
    var update = {
        'yaxis2.range':[parseFloat($('#lma-v-value').val())*-1.0,0],
    };

    // console.log(update);
    Plotly.relayout('graphBase', update);
});
$('#apply-lma-h-value').click(function () {
    var update = {
        'xaxis.range':[0, parseFloat($('#lma-h-value').val())],
    };

    // console.log(update);
    Plotly.relayout('graphBase', update);
});

$('.btn-ld-h-value').click(function () {
    var update = {
        'xaxis.range':[0, parseFloat($(this).val())],
    };

    // console.log(update);
    Plotly.relayout('graphBase', update);
});
$('.btn-ld-v-value').click(function () {
    console.log();
    var update = {
        'yaxis.range':[parseFloat($(this).val())*-1.0, parseFloat($(this).val())],
    };

    // console.log(update);
    Plotly.relayout('graphBase', update);
});

$('.btn-lma-h-value').click(function () {
    var update = {
        'xaxis.range':[0, parseFloat($(this).val())],
    };

    // console.log(update);
    Plotly.relayout('graphBase', update);
});
$('.btn-lma-v-value').click(function () {
    var update = {
        'yaxis2.range':[parseFloat($(this).val())*-1.0,0],
    };

    // // console.log(update);
    Plotly.relayout('graphBase', update);
});

$('#ld-export').click(function () {
    Plotly.downloadImage("graphBase", {format: 'png', width: 1200, height: 600, filename: 'DataReader - '+$('#fileName').html()});
});
$('#lma-export').click(function () {
    Plotly.downloadImage("graphBase", {format: 'png', width: 1200, height: 600, filename: 'DataReader - '+$('#fileName').html()});
});

$(document).ready(function(){
    document.getElementById('fileinput').addEventListener('change', loadData, false);
});
