//colot thief
//var $image = $("#foto");
//var $caja = $("#caja");
//
//var colorThief = new ColorThief();
//var colorDominante = colorThief.getColor($image[0]);
//
//var red = colorDominante[0];
//var green = colorDominante[1];
//var blue = colorDominante[2];

//console.log(colorDominante);

//$caja.css('background-color', 'rgb(' + red + ',' + green + ',' + blue + ')');
//
//var colorThief = new ColorThief();
//var colores = colorThief.getPalette($image[0], 8);

//console.log(colores);


//tippy js /////////////////////
tippy('.tippy');


//morisjs ////////////////////////
var morris1 = new Morris.Line({
    // ID of the element in which to draw the chart.
    element: 'myfirstchart',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [
        {year: '2008', value: 20, value2: 25},
        {year: '2009', value: 10, value2: 20},
        {year: '2010', value: 5, value2: 20},
        {year: '2011', value: 5, value2: 10},
        {year: '2012', value: 20, value2: 30}
    ],
    // The name of the data record attribute that contains x-values.
    xkey: 'year',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['value', 'value2'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Value', 'Increment'],
    resize: true,
    lineColors: ['#c14d9f', '#2cb4ac'],
    lineWidth: [2, 0.5]
});

new Morris.Area({
    // ID of the element in which to draw the chart.
    element: 'mysecondchart',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [
        {x: '2008 Q1', y: 20, z: 25},
        {x: '2009 Q2', y: 10, z: 20},
        {x: '2010 Q3', y: null, z: 20},
        {x: '2011 Q4', y: 5, z: 10},
        {x: '2012 Q1', y: 20, z: 30}
    ],
    // The name of the data record attribute that contains x-values.
    xkey: 'x',
    ykeys: ['y', 'z'],
    labels: ['Y', 'Z']
}).on('click', function (i, now) {
    console.log(i, row);
});

//cargar datas
$("#botData").on("click", function () {
    console.log(morris1);

    var nuevaData = [
        {year: '2008', value: 5, value2: 25},
        {year: '2009', value: 10, value2: 20},
        {year: '2010', value: 15, value2: 20},
        {year: '2011', value: 25, value2: 10},
        {year: '2012', value: 20, value2: 30},
        {year: '2013', value: 20, value2: 25},
        {year: '2014', value: 10, value2: 20},
        {year: '2015', value: 5, value2: 20},
        {year: '2016', value: 5, value2: 10},
        {year: '2017', value: 20, value2: 30}
    ]
    
    morris1.setData(nuevaData);
});