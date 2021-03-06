<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\PHPTutorial\WWW\boke\Public/../application/admin\view\echart\graph.html";i:1525434609;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<div id="content" style="width:600px;height:600px;">

</div>
<!-- 百度echarts 网址：http://echarts.baidu.com/examples/#chart-type-pie-->
<!--国外的Highcharts 网址：https://www.hcharts.cn/demo/highcharts-->
<script type="text/javascript" src="/static/admin/js/jquery.js"></script>
<script type="text/javascript" src="/static/admin/js/echarts.js"></script>
<script type="text/javascript">
    $(function () {
       $.ajax({
           url:"<?php echo url('Index/makeGraph'); ?>",
           type:"post",
           success:function (res) {
               if(res.status==2000){
                   // 基于准备好的dom，初始化echarts实例
                   var myChart = echarts.init(document.getElementById('content'));
                   // 指定图表的配置项和数据
                   var option = {
                       title: {
                           text: '本周各分类文章点击量'
                       },
                       tooltip: {},
                       legend: {
                           data:['点击量']
                       },
                       xAxis: {
                           data: res.column    //索引数组
                       },
                       yAxis: {},
                       series: [{
                           name: '点击量',
                           type: 'bar',
                           data: res.click
                       }]
                   };
                   // 使用刚指定的配置项和数据显示图表。
                   myChart.setOption(option);
               }else{

               }
           }
       })
    });
</script>
</body>
</html>