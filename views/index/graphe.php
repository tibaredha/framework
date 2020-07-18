<style type="text/css">#container {width: 100%;height: 100%;}</style>
<!--<div id="container"></div>-->
<script type="text/javascript">
		Highcharts.chart('container', {

			title: {
				text: 'Electronic Death and Birth Registration System'
			},

			subtitle: {
				text: 'Source: DSP djelfa'
			},

			yAxis: {
				title: {
					text: 'Nombre de décés'
				}
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'middle'
			},

			plotOptions: {
				series: {
					label: {
						connectorAllowed: false
					},
					pointStart: 2013
				}
			},

			series: [
			{
				name: 'Wilaya:djelfa',
				data: [
				<?php $date=date("Y");$lx = Session::get("structure");?>
				<?php echo $this->clgraphe->tiba(($date-7)."-01-01",($date-7)."-12-31","".$lx);?> , 
				<?php echo $this->clgraphe->tiba(($date-6)."-01-01",($date-6)."-12-31","".$lx);?> , 
				<?php echo $this->clgraphe->tiba(($date-5)."-01-01",($date-5)."-12-31","".$lx);?> , 
				<?php echo $this->clgraphe->tiba(($date-4)."-01-01",($date-4)."-12-31","".$lx);?> , 
				<?php echo $this->clgraphe->tiba(($date-3)."-01-01",($date-3)."-12-31","".$lx);?> , 
				<?php echo $this->clgraphe->tiba(($date-2)."-01-01",($date-2)."-12-31","".$lx);?> , 
				<?php echo $this->clgraphe->tiba(($date-1)."-01-01",($date-1)."-12-31","".$lx);?> , 
				<?php echo $this->clgraphe->tiba(($date-0)."-01-01",($date-0)."-12-31","".$lx);?> 
				]
			}, 
			// {
				// name: 'EHs:djelfa',
				// data: [
				// <?php echo $this->clgraphe->tiba("2013-01-01","2013-12-31",5);?> , 
				// <?php echo $this->clgraphe->tiba("2014-01-01","2014-12-31",5);?> , 
				// <?php echo $this->clgraphe->tiba("2015-01-01","2015-12-31",5);?> , 
				// <?php echo $this->clgraphe->tiba("2016-01-01","2016-12-31",5);?> , 
				// <?php echo $this->clgraphe->tiba("2017-01-01","2017-12-31",5);?> , 
				// <?php echo $this->clgraphe->tiba("2018-01-01","2018-12-31",5);?> , 
				// <?php echo $this->clgraphe->tiba("2019-01-01","2019-12-31",5);?> , 
				// <?php echo $this->clgraphe->tiba("2020-01-01","2020-12-31",5);?> 
				// ]
			// }, 
			// {
				// name: 'Sales & Distribution',
				// data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
			// }, 
			// {
				// name: 'Project Development',
				// data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
			// }, 
			// {
				// name: 'Other',
				// data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
			// }
			],

			responsive: {
				rules: [{
					condition: {
						maxWidth: 500
					},
					chartOptions: {
						legend: {
							layout: 'horizontal',
							align: 'center',
							verticalAlign: 'bottom'
						}
					}
				}]
			}

		});
		</script>