
<!DOCTYPE html>
<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.bundle.min.js" type="text/javascript"></script>
	<style type="text/css">
		@font-face{
			font-family: Cicle;
			src: url(fonts/Cicle_Fina.ttf);
		}

		@font-face{
			font-family: Gidole;
			src: url(fonts/Gidole-Regular.otf);
		}


		@font-face{
			font-family: Colaborate;
			src: url(fonts/ColabReg.otf);
		}

		@font-face{
			font-family: Hero;
			src: url(fonts/Hero.otf);
		}

		@font-face{
			font-family: Unisans;
			src: url(fonts/UniSansHeavy.otf);
		}

		@font-face{
			font-family: Cantarell;
			src: url(fonts/Cantarell-Regular.ttf);
		}

		@font-face{
			font-family: Panton;
			src: url(fonts/Panton-LightCaps.otf);
		}

		@keyframes fadeIn{
			0%{
				opacity: 0;
			}
			100%{
				opacity: 1;
			}
		}

		@keyframes noAnimation{

		}

		p{
			text-indent: 100px;
			color: #555555;
			font-family: Colaborate;
			font-size: 17px;
			padding: 0px 180px 50px 180px;
			margin-top: 0px;
			text-align: justify;
    		text-justify: inter-word;
    		line-height: 23px;
		}

		body{
			margin: 0px;
			padding: 0px;
			background: url(bg5.png) no-repeat center center fixed;
			background-size: cover;
			animation-name: fadeIn;
			animation-duration: 3s;
		}


		#titleHeader{
			font-size: 45px;
			padding: 70px 200px 30px 470px;
			font-family: Unisans;
			color: #111111;
			margin-bottom: 0px;
			word-spacing: 10px;
			transition-timing-function: initial;
			transition-duration: 1s;
		}

		td.subheader{
			font-size: 26px;
			font-family: Panton;
			font-weight: bolder;
			color: #111111;
			margin-bottom: 0px;
			word-spacing: 10px;
		}

		td.balloons{
			padding: 50px 25px 50px 25px;
			font-size: 15px;
			font-family: Colaborate;
			color: #626262;
			border: 2px solid #3f6e34;
			text-indent: 50px;
			background-color: #000000;
			opacity: .5;
			text-justify: inter-word;
			text-align: justify;
			line-height: 25px;
			transition-timing-function: initial;
			transition-duration: 1s;
			border-radius: 5px;
		}

		td.balloons:hover{
			opacity: 1;
			color: #bbbbbb;
		}

		#titleHeader:hover{
			color: #279e65;
		}

		p:hover{
			color: #279e65;
		}

		table, th, td {
     		font-family: Gidole;
     		font-size: 22px;
		}

		td{
			padding: 10px 20px 10px 20px;
		}
	</style>
	<title>Greenhouse Gases</title>
</head>
<body> 
	<header>
		<div id = "titleHeader">Greenhouse Gases</div>
		<p style="transition-timing-function: initial; transition-duration: 1s;">The greenhouse effect is a natural process that warms the Earth’s surface. When the Sun’s energy reaches the Earth’s atmosphere, some of it is reflected back to space and the rest is absorbed and re-radiated by greenhouse gases. Greenhouse gases include water vapour, carbon dioxide, methane, nitrous oxide, ozone and some artificial chemicals such as chlorofluorocarbons (CFCs). The absorbed energy warms the atmosphere and the surface of the Earth. This process maintains the Earth’s temperature at around 33 degrees Celsius warmer than it would otherwise be, allowing life on Earth to exist.</p>
	</header>

	<div style="background-color: #555555; width:76.5%; height:3px; margin: -50px 180px 60px 180px;"></div>
	<table style="width:76.5%; height:auto; margin:-30px 180px 0px 180px; text-align: center; vertical-align: center;">
		<tr>
			<td>ID</td>
			<td>Humidity</td>
			<td>Water Vapor</td>
			<td>Methane</td>
			<td>Carbon</td>
			<td>Temperature</td>
			<td>Nitrous Oxide</td>
		</tr>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "ghgvr";

			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
			     die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT id, humi_vapor_sen, methane_sen, carbon_sen, temp_sen, oxide_sen FROM data_table";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()) { 
	        	echo "<tr><td>" . $row["id"]. "</td><td>" .
	   				  $row["humi_vapor_sen"]. "</td><td>" . $row["humi_vapor_sen"]. "</td><td>" .
	   				  $row["methane_sen"]. "</td><td>" . $row["carbon_sen"]. "</td><td>" . 
	   				  $row["temp_sen"]. "</td><td>" . $row["oxide_sen"]. "</td></tr>";
	       	}$conn->close();
		?> 
	</table>
	<table style="width:76.5%; height:auto; margin:50px 180px 50px 180px; text-align: center; vertical-align: center;">
		<tr>
			<td class="subheader">Global Winds</td>
			<td class="subheader">Statistics</td>
		</tr>
		<tr>
			<td><iframe src="https://embed.windyty.com/?12.662,122.256,9,message,ip,metric.wind.mph" width="500" height="500" frameborder="0" style="animation-name:noAnimation; animation-duration:3s;"></iframe></td>
			<td><div style="width:500px; height:500px;"><canvas id="myChart"></canvas></div></td>
		</tr>
	</table>
	<script>
		var ctx = document.getElementById("myChart").getContext("2d");
		ctx.canvas.width = 300;
		ctx.canvas.height = 300;
		var myChart = new Chart(ctx, {
		    type: 'line',
		    data: {
		        labels: ["0.0", "0.45", "0.23", "0.89", "1.20", "1.69", "1.90"],
    			datasets: [
			        {
			            label: "Humidity",
			            fill: true,
			            lineTension: 0.3,
			            backgroundColor: "rgba(75,192,192,0.4)",
			            borderColor: "#00d21e",
			            borderCapStyle: 'butt',
			            borderDash: [],
			            borderDashOffset: 0.0,
			            borderJoinStyle: 'miter',
			            pointBorderColor: "#ffffff",
			            pointBackgroundColor: "#fff",
			            pointBorderWidth: 1,
			            pointHoverRadius: 5,
			            pointHoverBackgroundColor: "rgba(75,192,192,1)",
			            pointHoverBorderColor: "rgba(220,220,220,1)",
			            pointHoverBorderWidth: 2,
			            pointRadius: 1,
			            pointHitRadius: 10,
			            data: [65, 59, 80, 81, 56, 55, 40],
			            spanGaps: false,
			        },{
			            label: "Methane",
			            fill: true,
			            lineTension: 0.3,
			            backgroundColor: "rgba(75,192,192,0.4)",
			            borderColor: "#e30000",
			            borderCapStyle: 'butt',
			            borderDash: [],
			            borderDashOffset: 0.0,
			            borderJoinStyle: 'miter',
			            pointBorderColor: "rgba(75,192,192,1)",
			            pointBackgroundColor: "#fff",
			            pointBorderWidth: 1,
			            pointHoverRadius: 5,
			            pointHoverBackgroundColor: "rgba(75,192,192,1)",
			            pointHoverBorderColor: "rgba(220,220,220,1)",
			            pointHoverBorderWidth: 2,
			            pointRadius: 1,
			            pointHitRadius: 10,
			            data: [36,50,82,36,20,10,94],
			            spanGaps: false,
			        },{
			            label: "Carbon",
			            fill: true,
			            lineTension: 0.3,
			            backgroundColor: "rgba(75,192,192,0.4)",
			            borderColor: "#ff7800",
			            borderCapStyle: 'butt',
			            borderDash: [],
			            borderDashOffset: 0.0,
			            borderJoinStyle: 'miter',
			            pointBorderColor: "rgba(75,192,192,1)",
			            pointBackgroundColor: "#fff",
			            pointBorderWidth: 1,
			            pointHoverRadius: 5,
			            pointHoverBackgroundColor: "rgba(75,192,192,1)",
			            pointHoverBorderColor: "rgba(220,220,220,1)",
			            pointHoverBorderWidth: 2,
			            pointRadius: 1,
			            pointHitRadius: 10,
			            data: [75,63,86,56,95,46,42],
			            spanGaps: false,
			        },{
			            label: "Temperature",
			            fill: true,
			            lineTension: 0.3,
			            backgroundColor: "rgba(75,192,192,0.4)",
			            borderColor: "#4f00d2",
			            borderCapStyle: 'butt',
			            borderDash: [],
			            borderDashOffset: 0.0,
			            borderJoinStyle: 'miter',
			            pointBorderColor: "rgba(75,192,192,1)",
			            pointBackgroundColor: "#fff",
			            pointBorderWidth: 1,
			            pointHoverRadius: 5,
			            pointHoverBackgroundColor: "rgba(75,192,192,1)",
			            pointHoverBorderColor: "rgba(220,220,220,1)",
			            pointHoverBorderWidth: 2,
			            pointRadius: 1,
			            pointHitRadius: 10,
			            data: [42,36,85,96,25,65,45],
			            spanGaps: false,
			        },{
			            label: "Nitrous Oxide",
			            fill: true,
			            lineTension: 0.3,
			            backgroundColor: "rgba(75,192,192,0.4)",
			            borderColor: "#dfe200",
			            borderCapStyle: 'butt',
			            borderDash: [],
			            borderDashOffset: 0.0,
			            borderJoinStyle: 'miter',
			            pointBorderColor: "rgba(75,192,192,1)",
			            pointBackgroundColor: "#fff",
			            pointBorderWidth: 1,
			            pointHoverRadius: 5,
			            pointHoverBackgroundColor: "rgba(75,192,192,1)",
			            pointHoverBorderColor: "rgba(220,220,220,1)",
			            pointHoverBorderWidth: 2,
			            pointRadius: 1,
			            pointHitRadius: 10,
			            data: [32,46,96,52,27,46,96],
			            spanGaps: false,
			        }

			    ]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});
	</script>
	<table style="width:76.5%; height:auto; margin:-50px 180px 50px 180px; text-align: center; vertical-align: center;">
		<tr>
			<td class="balloons" style="width:60%;">
				The Philippines, home to almost 90 million people, is one of the most vulnerable countries to climate change. One devastating effect: increase in the number of tropical cyclones and storms.  “Weather patterns could become unpredictable, as would extreme weather events, hurricanes could become much stronger and more frequent,” wrote Lulu Bucay in a brochure produced by the Department of Environment and Natural Resources.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Weather specialist Edna Juanillo said the country normally experiences tropical cyclones up to 20 a year. But in recent years, stronger typhoons have become more frequent and devastating. In early 2007, three typhoons hit the country, with an unusual one in February triggering a landslide that killed 250 people in Southern Leyte province.
				Dr. Rodel D. Lasco, a member of the IPCC, is very much aware of the devastation that climate change will likely bring among Filipinos. For one, the country “has a long coastline where millions of people live including in urban centers such as Metro Manila, Cebu, and Davao.”

				</td>
			<td rowspan="2" class="balloons" style="width:40%;">
				With 43 percent of the population living on less than two dollars a day and with only one doctor for every 1,700 people, the impact of major disasters on the Philippines will become more devastating, according to the World Vision International. As the world atmosphere warms under a greenhouse effect, scientists predict, the seas will rise – threatening to change the contours of coastlines. Fifteen of the 16 regions of the Philippines are vulnerable to sea level rise. <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				A study conducted by the Philippine Country Study to Address Climate Change found that the Manila Bay is already subjected to several hazards, including flooding and storms. “Shoreline changes due to reclamation for housing, ports, coastal roads, buildings and other urbanized development are high, adding to an increased threat of inundation,” the study said. Sulu is the province with the highest land area that is highly vulnerable to the sea-level rise. In this southern Philippines province, 90 percent of the land area of Pata municipality, and 34 percent of the land area of Marunggas municipality are vulnerable to the rise, according to Greenpeace, an international environment watch group.

			</td>
			
		</tr>
		<tr>
			<td class="balloons">
			Sulu is the province with the highest land area that is highly vulnerable to the sea-level rise. In this southern Philippines province, 90 percent of the land area of Pata municipality, and 34 percent of the land area of Marunggas municipality are vulnerable to the rise, according to Greenpeace, an international environment watch group. Aside from Sulu, the other provinces vulnerable to sea level rise are Palawan, Zamboanga del Sur, Northern Samar, Zamboanga Sibugay, Basilan, Cebu, Davao del Norte, Bohol, Camarines Sur, Quezon, Tawi-Tawi, Masbate, Negros Occidental, Camarines Norte, Capiz, Catanduanes, Samar, Zamboanga del Norte, and Maguindanao.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Sea level rise would also endanger the drinking water quality and agricultural productivity, according to the Philippine Atmospheric, Geophysical and Astronomical Services Administration.  This is due to possible salt intrusion in coastal soils and fresh water aquifers. Already, one of every five residents quaffs water from dubious sources in 24 provinces, the Philippine Human Development Report points out. People are not the only that will likely be most affected. “Important ecosystems such as mangrove forests could also be lost,” warned Dr. Lasco, who is the country’s coordinator for the World Agroforestry Center. 
</td>

		</tr>
	</table>
	<footer style="width:100%; height:20px; position:fixed; bottom:0px; padding:5px 180px 5px 180px; font-family: Hero; font-size:12px; color:#cccccc; background-color: #222222;">
		Copyright &copy; 2016 TechnoDucks 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a>Terms of Services</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a>About</a>
	</footer>

</body>
</html>