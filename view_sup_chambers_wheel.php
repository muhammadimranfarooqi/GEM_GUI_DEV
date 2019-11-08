<?php 
include "head.php";


?>
<?php include "head_panel.php"; ?>
<<style>
<!--
input[type=checkbox]{
margin-bottom:10px;
margin-right: 10px;
margin-left: 10px;
}
-->
</style>
 

<?php $drifts=  get_list_part_ID($SUPER_CHAMBER_KIND_OF_PART_ID); ?>     
<script src="https://code.highcharts.com/6.0.0/highcharts.js"></script>
<script src="https://code.highcharts.com/6.0.0/modules/sunburst.js"></script>
 <div class="container-fluid" align="justify">
	<div class="row">
<?php  include "side.php"; ?>  
	
	 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	  <h2 class="sub-header"> <img src="images/sc2.png" width="4%"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Super Chamber Location  </h2>
</div>   

<div class="row" align="center">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">

                <div class="panel-heading">View Super Chambers Location</div>
 
                <div class="panel-body">
 
			
				<div class="form-group">
				<div class="row-fluid">
				
		                    <div  class="col-xs-6 col-md-6" id="wheel1"></div>
		                    <div  class="col-xs-6 col-md-6" id="wheel2"></div>
		                </div>
		              
		            </div>
		           
                <div class="row">
                 <div class="form-group">   
                    <input type="hidden" name="tb2" id ="tb2" />
                
				
				</div>
				</div>
				
          

        </div>

    </div>


<div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Selected Super Chamber Location:  <span id="span" class="d-block p-2 bg-dark text-white"></span></h3>
                </div>
                <div class="panel-body">
               <table class="table table-hover">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
    </table>
    		 </div>
</div>



</div>
</div>

</div>
</div>


 <?php 
include "foot.php";

?>

 
<script>
var data = [{
    id: '0.0',//GE1M01 - GE1M36
    parent: '',
    name: '+1'
},
{
    id: 'GE1P09',
    parent: '0.0',
   // name: 'Asia',
    value: 1
}, {
    id: 'GE1P08',
    parent: '0.0',
//name: 'Africa',
    value: 1
}, {
    id: 'GE1P07',
    parent: '0.0',
   // name: 'America',
    value: 1
}, {
    id: 'GE1P06',
    parent: '0.0',
 //   name: 'Europe',
    value: 1
}, {
    id: 'GE1P05',
    parent: '0.0',
 //   name: 'Oceanic',
    value: 1
}, {
    id: 'GE1P04',
    parent: '0.0',
   // name: 'Asia',
    value: 1
}, {
    id: 'GE1P03',
    parent: '0.0',
 //   name: 'Africa',
    value: 1
}, {
    id: 'GE1P02',
    parent: '0.0',
 //   name: 'America',
    value: 1
}, {
    id: 'GE1P01',
    parent: '0.0',
 //   name: 'Europe',
    value: 1
}, {
    id: 'GE1P36',
    parent: '0.0',
 //   name: 'Oceanic',
    value: 1
}
, {
    id: 'GE1P35',
    parent: '0.0',
 //   name: 'Asia',
    value: 1
}, {
    id: 'GE1P34',
    parent: '0.0',
 //   name: 'Africa',
    value: 1
}, {
    id: 'GE1P33',
    parent: '0.0',
 //   name: 'America',
    value: 1
}, {
    id: 'GE1P32',
    parent: '0.0',
 //   name: 'Europe',
    value: 1
}, {
    id: 'GE1P31',
    parent: '0.0',
 //   name: 'Oceanic',
    value: 1
}
, {
    id: 'GE1P30',
    parent: '0.0',
 //   name: 'Asia',
    value: 1
}, {
    id: 'GE1P29',
    parent: '0.0',
 //   name: 'Africa',
    value: 1
}, {
    id: 'GE1P28',
    parent: '0.0',
  //  name: 'America',
    value: 1
}, {
    id: 'GE1P27',
    parent: '0.0',
 //   name: 'Europe',
    value: 1
}, {
    id: 'GE1P26',
    parent: '0.0',
 //   name: 'Oceanic',
    value: 1
}
, {
    id: 'GE1P25',
    parent: '0.0',
 //   name: 'Asia',
    value: 1
}, {
    id: 'GE1P24',
    parent: '0.0',
 //   name: 'Africa',
    value: 1
}, {
    id: 'GE1P23',
    parent: '0.0',
 //   name: 'America',
    value: 1
}, {
    id: 'GE1P22',
    parent: '0.0',
 //   name: 'Europe',
    value: 1
}, {
    id: 'GE1P21',
    parent: '0.0',
  //  name: 'Oceanic',
    value: 1
}
, {
    id: 'GE1P20',
    parent: '0.0',
 //   name: 'Asia',
    value: 1
}, {
    id: 'GE1P19',
    parent: '0.0',
 //   name: 'Africa',
    value: 1
}, {
    id: 'GE1P18',
    parent: '0.0',
 //   name: 'America',
    value: 1
}, {
    id: 'GE1P17',
    parent: '0.0',
 //   name: 'Europe',
    value: 1
}, {
    id: 'GE1P16',
    parent: '0.0',
//    name: 'Oceanic',
    value: 1
}
, {
    id: 'GE1P15',
    parent: '0.0',
//    name: 'Asia',
    value: 1
}, {
    id: 'GE1P14',
    parent: '0.0',
//    name: 'Africa',
    value: 1
}, {
    id: 'GE1P13',
    parent: '0.0',
 //   name: 'America',
    value: 1
}, {
    id: 'GE1P12',
    parent: '0.0',
//    name: 'Europe',
    value: 1
}, {
    id: 'GE1P11',
    parent: '0.0',
//    name: 'Oceanic',
    value: 1
}
, {
    id: 'GE1P10',
    parent: '0.0',
//    name: 'Asia',
    value: 1
}
];
var data1 = [{
    id: '0.0',//GE1M01 - GE1M36
    parent: '',
    name: '-1'
},
{
    id: 'GE1M09',
    parent: '0.0',
   // name: 'Asia',
    value: 1
}, {
    id: 'GE1M08',
    parent: '0.0',
//name: 'Africa',
    value: 1
}, {
    id: 'GE1M07',
    parent: '0.0',
   // name: 'America',
    value: 1
}, {
    id: 'GE1M06',
    parent: '0.0',
 //   name: 'Europe',
    value: 1
}, {
    id: 'GE1M05',
    parent: '0.0',
 //   name: 'Oceanic',
    value: 1
}, {
    id: 'GE1M04',
    parent: '0.0',
   // name: 'Asia',
    value: 1
}, {
    id: 'GE1M03',
    parent: '0.0',
 //   name: 'Africa',
    value: 1
}, {
    id: 'GE1M02',
    parent: '0.0',
 //   name: 'America',
    value: 1
}, {
    id: 'GE1M01',
    parent: '0.0',
 //   name: 'Europe',
    value: 1
}, {
    id: 'GE1M36',
    parent: '0.0',
 //   name: 'Oceanic',
    value: 1
}
, {
    id: 'GE1M35',
    parent: '0.0',
 //   name: 'Asia',
    value: 1
}, {
    id: 'GE1M34',
    parent: '0.0',
 //   name: 'Africa',
    value: 1
}, {
    id: 'GE1M33',
    parent: '0.0',
 //   name: 'America',
    value: 1
}, {
    id: 'GE1M32',
    parent: '0.0',
 //   name: 'Europe',
    value: 1
}, {
    id: 'GE1M31',
    parent: '0.0',
 //   name: 'Oceanic',
    value: 1
}
, {
    id: 'GE1M30',
    parent: '0.0',
 //   name: 'Asia',
    value: 1
}, {
    id: 'GE1M29',
    parent: '0.0',
 //   name: 'Africa',
    value: 1
}, {
    id: 'GE1M28',
    parent: '0.0',
  //  name: 'America',
    value: 1
}, {
    id: 'GE1M27',
    parent: '0.0',
 //   name: 'Europe',
    value: 1
}, {
    id: 'GE1M26',
    parent: '0.0',
 //   name: 'Oceanic',
    value: 1
}
, {
    id: 'GE1M25',
    parent: '0.0',
 //   name: 'Asia',
    value: 1
}, {
    id: 'GE1M24',
    parent: '0.0',
 //   name: 'Africa',
    value: 1
}, {
    id: 'GE1M23',
    parent: '0.0',
 //   name: 'America',
    value: 1
}, {
    id: 'GE1M22',
    parent: '0.0',
 //   name: 'Europe',
    value: 1
}, {
    id: 'GE1M21',
    parent: '0.0',
  //  name: 'Oceanic',
    value: 1
}
, {
    id: 'GE1M20',
    parent: '0.0',
 //   name: 'Asia',
    value: 1
}, {
    id: 'GE1M19',
    parent: '0.0',
 //   name: 'Africa',
    value: 1
}, {
    id: 'GE1M18',
    parent: '0.0',
 //   name: 'America',
    value: 1
}, {
    id: 'GE1M17',
    parent: '0.0',
 //   name: 'Europe',
    value: 1
}, {
    id: 'GE1M16',
    parent: '0.0',
//    name: 'Oceanic',
    value: 1
}
, {
    id: 'GE1M15',
    parent: '0.0',
//    name: 'Asia',
    value: 1
}, {
    id: 'GE1M14',
    parent: '0.0',
//    name: 'Africa',
    value: 1
}, {
    id: 'GE1M13',
    parent: '0.0',
 //   name: 'America',
    value: 1
}, {
    id: 'GE1M12',
    parent: '0.0',
//    name: 'Europe',
    value: 1
}, {
    id: 'GE1M11',
    parent: '0.0',
//    name: 'Oceanic',
    value: 1
}
, {
    id: 'GE1M10',
    parent: '0.0',
//    name: 'Asia',
    value: 1
}

/*for (i = 1; i <= 36; i++) {
	 document.write (",<br>{"+"id:"+i+ ",");
	 document.write	( "<br>parent:'0.0' ,");
	 document.write	 ("<br>value:1"+"<br>");
	 if(i==36){
		 document.write	 ("<br>}");
		 }
	  else{
	 document.write	 ("<br>},");}	 
}*/

//GE1M01 - GE1M36
//GE1P01- GE1P36
];
// Splice in transparent for the center circle
Highcharts.getOptions().colors.splice(0, 0, 'transparent');


Highcharts.chart('wheel1', {

    chart: {
        height: '60%'
    },

    title: {
        text: 'GE1P01- GE1P36'
    },
    subtitle: {
        text: 'CMS - GEM'
    },
    series: [{
        type: "sunburst",
        data: data,
        allowDrillToNode: true,
        cursor: 'pointer',
        point: {
            events: {
                click: function () {
                   // alert("alert"+this.id);
                    document.getElementById("tb2").value = this.id;
                    document.getElementById("span").textContent  = this.id;
                    
                    
                }
            }
           },
        dataLabels: {
            format: '{}',
           /* filter: {
                property: 'innerArcLength',
                operator: '>',
                value: 16
            }*/
        },
        levels: [{
            level: 1,
            levelIsConstant: false,
            dataLabels: {
               
            }
        }, {
            level: 2,
            colorByPoint: true,
           // colorIndex: 1,
            color:'#2f7ed8'
            	 
        },
        {
            level: 3,
            colorVariation: {
               // key: 'brightness',
               // to: -0.5
            }
        }, {
            level: 4,
            colorVariation: {
               // key: 'brightness',
               // to: 0.5
            }
        }]

    }],
    tooltip: {
        headerFormat: "",
        pointFormat: '{point.id}'
    }
});
Highcharts.chart('wheel2', {

    chart: {
        height: '60%'
    },
  
    title: {
        text: 'GE1M01 - GE1M36'
    },
    subtitle: {
        text: 'CMS - GEM'
    },
    series: [{
        type: "sunburst",
        data: data1,
        allowDrillToNode: true,
        cursor: 'pointer',
        point: {
            events: {
                click: function () {
                   // alert("alert"+this.id);
                    document.getElementById("tb2").value = this.id;
                    document.getElementById("span").textContent  = this.id;
                    
                    
                }
            }
           },
        dataLabels: {
            format: '{}',
           /* filter: {
                property: 'innerArcLength',
                operator: '>',
                value: 16
            }*/
        },
        levels: [{
            level: 1,
            levelIsConstant: false,
            dataLabels: {
               
            }
        }, {
            level: 2,
            colorByPoint: true,
           // colorIndex: 1,
            color:'#2f7ed8'
            	 
        },
        {
            level: 3,
            colorVariation: {
               // key: 'brightness',
               // to: -0.5
            }
        }, {
            level: 4,
            colorVariation: {
               // key: 'brightness',
               // to: 0.5
            }
        }]

    }],
    tooltip: {
        headerFormat: "{point.value}",
        pointFormat: '{point.id}'
    }
});</script>

