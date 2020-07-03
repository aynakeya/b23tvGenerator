<?php
if($_GET['jurl']){
	header("Location:".rawurldecode($_GET['jurl']), true, 302);
	exit;
}
?>
<html><head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
  
  <body>
    <h1>就是跳转页，若没跳转，说明参数不对，加个jurl=</h1>
    <div>
      <input type="text" id="ur1">
      <button onclick="encode1()">转换为跳转链接</button>
      <br>
      <input type="text" id="ur2" readonly="true">
      <button onclick="encode2()">转换为b23.tv</button>
      <br>
      <input type="text" id="ur3" readonly="true">
      <script type="application/javascript">
        function getb23(d){
            var murl = "/b23api.php?"+"url="+d;
            var ajax = new XMLHttpRequest();
            var burl = ""
            ajax.open('get',murl,false);
            ajax.send();
            return JSON.parse(ajax.responseText).data.content;
        }

        function encode1(){
          if (document.querySelector('#ur1').value === ""){
            return
          }
          document.querySelector('#ur2').value = location.protocol+"//"+ location.hostname+location.pathname+ "?jurl=" + document.querySelector('#ur1').value;
        }

        function encode2(){
          if (document.querySelector('#ur2').value === ""){
            return
          }
           document.querySelector('#ur3').value = getb23(document.querySelector('#ur2').value);
        }

      </script>
    </div>
    <!-- <script type="application/javascript">function getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
          var pair = vars[i].split("=");
          if (pair[0] == variable) {
            return pair[1];
          }
        }
        return (false);
      }
      var jurl = getQueryVariable("jurl");
      if (jurl) {
        window.location.href = decodeURIComponent(jurl);
      } else {
        window.location.href="https://www.bilibili.com";
      }
    </script> -->
  </body></html>