<?php
include_once './public_header.php';
include_once './public/public_menubar.php';


?>


﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
     
            <title></title>
            <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
            <meta charset="UTF-8">  </meta>
    
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></link>
            <style type="text/css">
                body
                {
                    font-family: Arial;
                    font-size: 10pt;
                    width: 100%;
                    height: 100%;
                }
            </style>
    </head>
   
        <body >

           
            
            <div class="container-fluid">
                
            <table border="0" cellpadding="0" cellspacing="3">
                <tr>
                    <td colspan="2">
                        Source:
                        <input type="text" id="txtSource" class="form-control " value="" placeholder="Type your Source" style="width: 200px" />
                        &nbsp; Destination:
                        <input type="text" id="txtDestination" class="form-control " value="" placeholder="Type your Destination" style="width: 200px" />
                        <br />
                        <input type="button" class="btn" value="Get Route" onclick="GetRoute()" />
                        <br />
                        <br />
                        <br />
                        <div class="container">
                            <div class="col-md-3">
                                <input type="text" id="km1" class=" form-control"/>
                                
                                <br/>
                                Autorickshaw fare for travel is 
                                
                                <input type="text" id="km2" class=" form-control"/>
                            </div>
                        </div>
                        
                            <br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="button" value="submit" style="margin-left:10opx;" onclick="addNumbers()" class="btn"/>
                            
                            
                        
                        <br/>
                        <br/>
                        <hr />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" >
                        <div id="dvDistance">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td >
                        <div id="dvMap" style="width: 700px; height: 600px">
                        </div>
                    </td>

                    <td style="width:100%; height: 100%;">
                        <div id="dvPanel" style="height: 600px;" >
                </div>
            </td>


                </tr>
            </table>
                
            <br />

           
            </div>
        </body>
  <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHyEyA84oRlSRJKLngGik6XSn42dCQLJQ&sensor=false&libraries=places"
  type="text/javascript"></script>
            <!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>async defer-->
            <script type="text/javascript">
                var source, destination;
                var directionsDisplay;
                var directionsService = new google.maps.DirectionsService();
                google.maps.event.addDomListener(window, 'load', function () {
                    new google.maps.places.SearchBox(document.getElementById('txtSource'));
                    new google.maps.places.SearchBox(document.getElementById('txtDestination'));
                    directionsDisplay = new google.maps.DirectionsRenderer({'draggable': true});
                });

                function GetRoute() {
                    var mumbai = new google.maps.LatLng(18.9750, 72.8258);
                    var mapOptions = {
                        zoom: 7,
                        center: mumbai
                    };
                    map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
                    directionsDisplay.setMap(map);
                    directionsDisplay.setPanel(document.getElementById('dvPanel'));

                    //*********DIRECTIONS AND ROUTE**********************//
                    source = document.getElementById("txtSource").value;
                    destination = document.getElementById("txtDestination").value;

                    var request = {
                        origin: source,
                        destination: destination,
                        travelMode: google.maps.TravelMode.DRIVING
                    };
                    directionsService.route(request, function (response, status) {
                        if (status == google.maps.DirectionsStatus.OK) {
                            directionsDisplay.setDirections(response);
                        }
                    });

                    //*********DISTANCE AND DURATION**********************//
                    var service = new google.maps.DistanceMatrixService();
                    service.getDistanceMatrix({
                        origins: [source],
                        destinations: [destination],
                        travelMode: google.maps.TravelMode.DRIVING,
                        unitSystem: google.maps.UnitSystem.METRIC,
                        avoidHighways: false,
                        avoidTolls: false
                    }, function (response, status) {
                        if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                            var distance = response.rows[0].elements[0].distance.value / 1000;
                            var duration = response.rows[0].elements[0].duration.text;
                            var dvDistance = document.getElementById("dvDistance");
                            dvDistance.innerHTML = "";
                            dvDistance.innerHTML += "Distance: " + distance + " Km<br />";
                            dvDistance.innerHTML += "Duration:" + duration;



                            document.getElementById("km1").value = distance;

                        } else {
                            alert("Unable to find the distance via road.");
                        }
                    });

                }
            </script>
     <script language="javascript">
                function addNumbers()
                {
                        var val1 = (document.getElementById("km1").value);
                        var val2 = 20
                        var ansD = document.getElementById("km2");
                        if (val1<=1.5)
                        {
                            ansD.value = val2;
                        }
                        else
                        {
                            var bal = val1 - 1.5;
                            alert (bal);
                            var res = bal * 10;
                            ansD.value = 20 + res;
                        }
                        
                        
                }
                
        </script>
          <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</html>
