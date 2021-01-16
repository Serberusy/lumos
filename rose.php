<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,height=device-height">
    <title>the trend of the top3 keywords</title>
    <style>::-webkit-scrollbar{display:none;}html,body{overflow:hidden;height:100%;margin:0;}</style>
    <style type="text/css">
  body {
    text-align: center;
    background-color: #f5fffa;
  }
</style>
</head>
<body>


<h1><center>Rose graph showing the trend</center> </h1>
  <div id="mountNode"></div>
<script>/*Fixing iframe window.innerHeight 0 issue in Safari*/document.body.clientHeight;</script>
<script src="https://gw.alipayobjects.com/os/antv/pkg/_antv.g2-3.5.1/dist/g2.min.js"></script>
<script src="https://gw.alipayobjects.com/os/antv/pkg/_antv.data-set-0.10.1/dist/data-set.min.js"></script>
<script src="https://gw.alipayobjects.com/os/antv/assets/lib/jquery-3.2.1.min.js"></script>
<script>
  var data = [{
    year: '2000',
    'learning': 216,
    'data': 159,
    'model': 225,
    'image': 159
  }, {
    year: '2001',
    'learning': 185,
    'data': 144,
    'model': 279,
    'image': 163
  }, {
    year: '2002',
    'learning': 171,
    'data':134,
    'model': 197,
    'image': 111
  }, {
    year: '2003',
    'learning': 253,
    'data':216,
    'model': 333,
    'image': 167
  }, {
    year: '2004',
    'learning': 253,
    'data':185,
    'model': 320,
    'image': 190
  }, {
    year: '2005',
    'learning': 366,
    'data':182,
    'model': 403,
    'image': 220
  }, {
    year: '2006',
    'learning': 290,
    'data':169,
    'model': 381,
    'image': 198
  }, {
    year: '2007',
    'learning': 470,
    'data':247,
    'model': 497,
    'image': 272
  }, {
    year: '2008',
    'learning': 417,
    'data':219,
    'model': 472,
    'image': 285
  }, {
    year: '2009',
    'learning': 504,
    'data':289,
    'model': 558,
    'image': 344
  }, {
    year: '2010',
    'learning': 537,
    'data':321,
    'model': 511,
    'image': 297
  }, {
    year: '2011',
    'learning': 559,
    'data':299,
    'model': 571,
    'image': 338
  }, {
    year: '2012',
    'learning': 548,
    'data':266,
    'model': 575,
    'image': 333
  }, {
    year: '2013',
    'learning': 658,
    'data':358,
    'model': 649,
    'image': 351
  }, {
    year: '2014',
    'learning': 622,
    'data':310,
    'model': 562,
    'image': 289
  },{
    year: '2015',
    'learning': 818,
    'data':412,
    'model': 755,
    'image': 417
  },{
    year: '2016',
    'learning': 613,
    'data':260,
    'model': 467,
    'image': 137
  }];
  var _DataSet = DataSet,
    DataView = _DataSet.DataView;

  var dv = new DataView();
  dv.source(data).transform({
    type: 'fold',
    fields: ['learning', 'data','model', 'image'],
    key: '难民类型',
    value: 'count',
    remains: 'year'
  });

  var chart = new G2.Chart({
    container: 'mountNode',
    forceFit: true,
    height: window.innerHeight,
    padding: [20, 80, 100]
  });
  chart.source(dv);
  chart.coord('polar', {
    inner: 0.1
  });
  chart.legend('难民类型', {
    position: 'bottom'
  });
  chart.intervalStack().position('year*count').color('难民类型').style({
    lineWidth: 1,
    stroke: '#fff'
  });
  chart.render();
</script>
</body>
</html>
