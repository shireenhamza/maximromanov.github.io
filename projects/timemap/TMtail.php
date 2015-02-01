    <link href="styles.css" type="text/css" rel="stylesheet"/>
    <style>
    #timemap {
    height: 590px;
    }

    div#timelinecontainer{
    width: 100%;
    height: 100%;
    }

    div#heading{
    width: 100%;
    height: 100%;
    font-size: 14px;
    font-family: "Consolas", "Verdana", lucida;
    font-style: normal;
    font-weight: bold;
    align: center
    }
    
    div#menu{
    width: 100%;
    height: 100%;
    font-size: 12px;
    font-family: "Consolas", "Verdana", lucida;
    font-style: normal;
    align: center
    }

    div#timeline {
    width: 100%;
    height: 100%;
    font-size: 12px;
    font-family: "Consolas", "Verdana", lucida;
    font-style: normal;
    }
    
    div#mapcontainer {
    width: 100%;
    height: 100%;
    }

    div#map {
    width: 100%;
    height: 100%;
    background: #FFE6E6;
    }

    </style>
</head>
  
<body>
<div id="heading" align="center">
<?php echo $varTemp[0] . "\n"; ?>
</div>			
<div id="timemap">
<table border="0" width="100%" style="background-color:FFFFCC" width="400" cellpadding="0" cellspacing="0">
	<tr>
		<td width="60%" height="580">
			<div id="mapcontainer">
				<div id="map"></div>
			</div>			
		</td>
		<td width="40%" height="580">
			<div id="timelinecontainer">
				<div id="timeline"></div>
			</div>	
		</td>
	</tr>
</table>
</div>  

<div id="menu" align="center">
<?php include 'aaptis461_2012f_menu.php'; ?><br>
<b>----- U of Michigan # AAPTIS 461/History 442 Fall 2012 # Professor Michael Bonner # TA Maxim Romanov -----</b><br>
<a href="http://www.alraqmiyyat.org/">http://www.alraqmiyyat.org</a>
</div>

</body>
</html>