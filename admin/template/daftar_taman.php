<?php
/**
 * Created by PhpStorm.
 * User: luthfi
 * Date: 16/02/2015
 * Time: 19:22
 */

?>
<section class="panel">
    <header class="panel-heading wht-bg">
        <h4 class="gen-case"> Daftar Taman

        </h4>
    </header>
    <div class="panel-body ">
        <div class="mail-option">
            <strong><i class="fa fa-info-circle"></i> Klik Kanan pada Peta untuk Menambah</strong>
            <div class="pull-right">
                <img src="../assets/img/pin_blue.png" alt=""/> Tersimpan
                <img src="../assets/img/pin_green.png" alt=""/> Belum Tersimpan
            </div>
        </div>
        <div id="google_map" style="width: 100%;height: 500px;"></div>
    </div>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            var mapCenter = new google.maps.LatLng(-6.8968177,107.608704); //Google map Coordinates
            var map;

            map_initialize(); // initialize google map

            //############### Google Map Initialize ##############
            function map_initialize()
            {
                var googleMapOptions =
                {
                    center: mapCenter, // map center
                    zoom: 15, //zoom level, 0 = earth view to higher value
                    maxZoom: 18,
                    minZoom: 13,
                    zoomControlOptions: {
                        style: google.maps.ZoomControlStyle.SMALL //zoom control size
                    },
                    scaleControl: true, // enable scale control
                    mapTypeId: google.maps.MapTypeId.ROADMAP // google map type
                };

                map = new google.maps.Map(document.getElementById("google_map"), googleMapOptions);

                //Load Markers from the XML File, Check (map_process.php)
                $.get("../modules/ajax/taman.php?get_list", function (data) {
                    $(data).find("marker").each(function () {
                        var name 		= $(this).attr('name');
                        var address 	= '<p>'+ $(this).attr('address') +'</p><button name="edit-marker" class="edit-marker btn btn-sm btn-primary">Edit</button>';
                        var point 	= new google.maps.LatLng(parseFloat($(this).attr('lat')),parseFloat($(this).attr('lng')));
                        create_marker(point, name, address,$(this).attr('address'), false, false, false, "../assets/img/pin_blue.png");
                    });
                });

                //Right Click to Drop a New Marker
                google.maps.event.addListener(map, 'rightclick', function(event) {
                    //Edit form to be displayed with new marker
                    var EditForm = '<p><div class="marker-edit">'+
                        '<form action="#" method="POST" name="SaveMarker" id="SaveMarker">'+
                        '<div class="form-group">'+
                        '<label for="nama-taman">Nama Taman</label>'+
                        '<input type="text" class="form-control nama-taman" placeholder="Nama Taman">'+
                        '</div>'+
                         '<div class="form-group">'+
                        '<label for="alamat-taman">Alamat</label>'+
                        '<input type="text" class="form-control alamat-taman" placeholder="Alamat">'+
                        '</div>'+
                        '</form>'+
                        '</div></p><button name="save-marker" class="save-marker btn btn-sm btn-primary">Simpan</button>';

                    //Drop a new Marker with our Edit Form
                    create_marker(event.latLng, 'Tambah Taman', EditForm,"", true, true, true, "../assets/img/pin_green.png");
                });

            }

            //############### Create Marker Function ##############
            function create_marker(MapPos, MapTitle, MapDesc,MapAddress,  InfoOpenDefault, DragAble, Removable, iconPath)
            {

                //new marker
                var marker = new google.maps.Marker({
                    position: MapPos,
                    map: map,
                    draggable:DragAble,
                    animation: google.maps.Animation.DROP,
                    title:"Hello World!",
                    icon: iconPath
                });

                //Content structure of info Window for the Markers
                var contentString = $('<div class="marker-info-win">'+
                '<div class="marker-inner-win"><span class="info-content">'+
                '<h1 class="marker-heading">'+MapTitle+'</h1>'+
                MapDesc+
                '</span> <button name="remove-marker" class="remove-marker btn btn-default btn-sm" title="Remove Marker">Hapus</button>'+
                '</div></div>');


                //Create an infoWindow
                var infowindow = new google.maps.InfoWindow();
                //set the content of infoWindow
                infowindow.setContent(contentString[0]);

                //Find remove button in infoWindow
                var removeBtn 	= contentString.find('button.remove-marker')[0];
                var saveBtn 	= contentString.find('button.save-marker')[0];
                var editBtn 	= contentString.find('button.edit-marker')[0];

                //add click listner to remove marker button
                google.maps.event.addDomListener(removeBtn, "click", function(event) {
                    remove_marker(marker);
                });

                if(typeof saveBtn !== 'undefined') //continue only when save button is present
                {
                    //add click listner to save marker button
                    google.maps.event.addDomListener(saveBtn, "click", function(event) {
                        var mReplace = contentString.find('span.info-content'); //html to be replaced after success
                        var mName = contentString.find('input.nama-taman')[0].value; //name input field value
                        var mDesc  = contentString.find('input.alamat-taman')[0].value; //description input field value

                        if(mName =='' || mDesc =='')
                        {
                            alert("Form tidak boleh kosong!");
                        }else{
                            save_marker(marker, mName, mDesc, mReplace); //call save marker function
                        }
                    });
                }

                if(typeof editBtn !== 'undefined') //continue only when save button is present
                {
                    //add click listner to save marker button
                    google.maps.event.addDomListener(editBtn, "click", function(event) {
                        var mReplace = contentString.find('span.info-content'); //html to be replaced after success
                        ShowEditForm(marker,MapTitle,MapAddress, mReplace);
                    });
                }

                //add click listner to save marker button
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map,marker); // click on marker opens info window
                });

                if(InfoOpenDefault) //whether info window should be open by default
                {
                    infowindow.open(map,marker);
                }
            }

            //############### Remove Marker Function ##############
            function remove_marker(Marker)
            {

                /* determine whether marker is draggable
                 new markers are draggable and saved markers are fixed */
                if(Marker.getDraggable())
                {
                    Marker.setMap(null); //just remove new marker
                }
                else
                {
                    //Remove saved marker from DB and map using jQuery Ajax
                    var mLatLang = Marker.getPosition().toUrlValue(); //get marker position
                    var myData = {del : 'true', latlang : mLatLang}; //post variables
                    $.ajax({
                        type: "POST",
                        url: "../modules/ajax/taman.php?hapus",
                        data: myData,
                        success:function(data){
                            Marker.setMap(null);
                            alert(data);
                        },
                        error:function (xhr, ajaxOptions, thrownError){
                            alert(thrownError); //throw any errors
                        }
                    });
                }

            }

            //############### Save Marker Function ##############
            function save_marker(Marker, mName, mAddress, replaceWin)
            {
                //Save new marker using jQuery Ajax
                var mLatLang = Marker.getPosition().toUrlValue(); //get marker position
                var myData = {name : mName, address : mAddress, latlang : mLatLang}; //post variables
                console.log(replaceWin);
                $.ajax({
                    type: "POST",
                    url: "../modules/ajax/taman.php?tambah",
                    data: myData,
                    success:function(data){
                        replaceWin.html(data); //replace info window with new html
                        Marker.setDraggable(false); //set marker to fixed
                        Marker.setIcon('../assets/img/pin_blue.png'); //replace icon
                        var editBtn 	= replaceWin.find('button.edit-marker')[0];
                        google.maps.event.addDomListener(editBtn, "click", function(event) {
                            ShowEditForm(Marker,mName,mAddress, replaceWin);
                        });
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        alert(thrownError); //throw any errors
                    }
                });
            }

            //############### Edit Marker Function ##############
            function edit_marker(Marker, mName, mAddress, replaceWin,OldLatLng)
            {
                //Save new marker using jQuery Ajax
                var mLatLang = Marker.getPosition().toUrlValue(); //get marker position
                var myData = {name : mName, address : mAddress, latlang : mLatLang, old : OldLatLng}; //post variables
                console.log(replaceWin);
                $.ajax({
                    type: "POST",
                    url: "../modules/ajax/taman.php?edit",
                    data: myData,
                    success:function(data){
                        replaceWin.html(data); //replace info window with new html
                        Marker.setDraggable(false); //set marker to fixed
                        Marker.setIcon('../assets/img/pin_blue.png'); //replace icon
                        var editBtn 	= replaceWin.find('button.edit-marker')[0];
                        google.maps.event.addDomListener(editBtn, "click", function(event) {
                            ShowEditForm(Marker,mName,mAddress, replaceWin);
                        });
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        alert(thrownError); //throw any errors
                    }
                });
            }

            function ShowEditForm(marker,MapTitle,MapAddress,replaceWin)
            {

                var EditForm = '<p><div class="marker-edit">'+
                    '<form action="#" method="POST" name="SaveMarker" id="SaveMarker">'+
                    '<div class="form-group">'+
                    '<label for="nama-taman">Nama Taman</label>'+
                    '<input type="text" class="form-control nama-taman" value="'+MapTitle+'" placeholder="Nama Taman">'+
                    '</div>'+
                    '<div class="form-group">'+
                    '<label for="alamat-taman">Alamat</label>'+
                    '<input type="text" class="form-control alamat-taman" value="'+MapAddress+'" placeholder="Alamat">'+
                    '</div>'+
                    '</form>'+
                    '</div></p><button name="save-marker" class="save-marker btn btn-sm btn-primary">Simpan</button> <button name="cancel-edit" class="cancel-edit btn btn-default btn-sm" title="Cancel Edit">Cancel</button>';

                replaceWin.html(EditForm);
                marker.setDraggable(true); //set marker to fixed
                marker.setIcon('../assets/img/pin_green.png'); //replace icon
                var OldLatLng = marker.getPosition();
                var saveEdit 	= replaceWin.find('button.save-marker')[0];
                var cancelBtn 	= replaceWin.find('button.cancel-edit')[0];
                google.maps.event.addDomListener(cancelBtn, "click", function(event) {
                    marker.setPosition(OldLatLng);
                    replaceWin.html('<h1 class="marker-heading">'+MapTitle+'</h1><p>'+MapAddress+'</p><button name="edit-marker" class="edit-marker btn btn-sm btn-primary">Edit</button>');
                    marker.setDraggable(false); //set marker to fixed
                    marker.setIcon('../assets/img/pin_blue.png'); //replace icon
                    var editBtn 	= replaceWin.find('button.edit-marker')[0];
                    google.maps.event.addDomListener(editBtn, "click", function(event) {
                        ShowEditForm(marker,MapTitle,MapAddress, replaceWin);
                    });
                });
                google.maps.event.addDomListener(saveEdit, "click", function(event) {
                    var mName = replaceWin.find('input.nama-taman')[0].value; //name input field value
                    var mDesc  = replaceWin.find('input.alamat-taman')[0].value; //description input field value
                    edit_marker(marker,mName,mDesc,replaceWin,OldLatLng.toUrlValue());
                });
            }

        });
    </script>
</section>
