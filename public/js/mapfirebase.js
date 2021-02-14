

  //  web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyD9tW1o-EWbdiplp4Zz8JM5zihHG6obJlY",
    authDomain: "task-7ad84.firebaseapp.com",
    databaseURL: "https://task-7ad84-default-rtdb.firebaseio.com",
    projectId: "task-7ad84",
    storageBucket: "task-7ad84.appspot.com",
    messagingSenderId: "800166165876",
    appId: "1:800166165876:web:fdc8b80b77a99123280021",
    measurementId: "G-XTEHEEKNNK"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
  var database = firebase.database();

  //retrieve form fields 

function get_form_values(id)
{
    return document.getElementById(id);
 
}

/****** map global variables */

var mapp;
var pathCoordinates = Array();


//genrate random lat & long  and send to map


document.getElementById("move").addEventListener("click", function(){
  var min_lat = 31.01111111120000,
  max_lat = 32.01111111129999;
  latitude = Math.random() * (max_lat - min_lat) + min_lat;
  var min_long=25.01111111120000,
  max_long = 26.01111111129999;
  longitude = Math.random() * (max_long - min_long)+ min_long;

var u_id=get_form_values('u_id');
var g="hdhddh";

var l=[];
l.push(latitude,longitude);
database.ref('users/'+u_id.value).set({l,g});

});


/************ read changed lat and long from firebase db */


database.ref('users/1/l').on('value', function(snapshot){
  var loc=snapshot.val();
 
  document.getElementById('latitude').value=loc[0];
  document.getElementById('longitude').value=loc[1];

  /******* initialize map variables   */
  pathCoordinates.push({lat:loc[0],lng:loc[1]});

  var myLatlng = new google.maps.LatLng(loc[0], loc[1]);
  
  var mapOptions = {
    zoom: 7,
    center: myLatlng,
    mapTypeId: 'roadmap'
  };
  mapp = new google.maps.Map(document.getElementById('map'), 
   mapOptions);
   new google.maps.Marker({
    position : new google.maps.LatLng(loc[0], loc[1]),
    map : mapp,
    title : '<?php echo $countryResult[$k]["country"]; ?>'
  });

   drawPath();
});
//Map draw path

function drawPath() {
  new google.maps.Polyline({
    path : pathCoordinates,
    geodesic : true,
    strokeColor : '#FF0000',
    strokeOpacity : 1,
    strokeWeight : 3,
    map : mapp
  });
}





  //**************Add location to firebase user child ******************************* */
function writeUserData(event) {
    
    event.preventDefault();
    var u_id=get_form_values('u_id');
    var longitude=get_form_values("longitude");
    var latitude=get_form_values("latitude");
    var l=[]
    l.push(
         latitude.value,
         longitude.value
       
    );

    var g="hdhddh";
      database.ref('users/'+u_id.value).set({
        l,
        g,
      }).then(()=>{window.alert("User created successfully")});

      database.ref('users/'+u_id.value+'/l').on('value', function(snapshot){
       
   
        $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: "firebase/c",
              type: "GET",
              
              data: {xy:snapshot.val()},
              success: function(loc) {
                  console.log("success"+loc);
                window.location.assign('firebase/map');
        
              }

          });
        });
}



/******************** Update user id location value *********** */
function updateUserData(event) {
    
    event.preventDefault();
    var userid=document.getElementById("userid");
    var fname=document.getElementById("first_name");
    var lname=document.getElementById("last_name");
 var database = firebase.database();
 
  firebase.database().ref('users/'+userid.value).child('l').update({
    firstName: fname.value,
    lastName: lname.value,
  }).then(()=>{window.alert("Location Updated successfully")});

  database.ref('users/'+userid.value).child('l').on('child_changed', function(snapshot){
       
        console.log(snapshot.val());
       $.ajax({
             headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             url: "firebase/c",
             type: "GET",
             
             data: {xy:snapshot.val()},
             success: function(loc) {
               window.location.assign('firebase/map');
             

              

             }

         });
       });

}

/*********************** Delete id from userss ****************** */


function deleteUserData(event) {
    
    event.preventDefault();
    var userid=document.getElementById("u_id");

    var database = firebase.database();

  database.ref('users/'+u_id.value).remove()
  .then(()=>{window.alert('User removed successfully')})
  .catch(error => {console.error(error)});
  

}

