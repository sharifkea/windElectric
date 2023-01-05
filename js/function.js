"use strict";
$(document).ready(function(){
    repositMenus();

    // Display of secondary menus(dropDownMenu) for power transformer at substhv.php*/
    $("div#dpt1").on("mouseenter", function() {   
        repositMenus();
        $("#pt1Menu").slideDown("fast");
    }).on("mouseleave", function() {
        $("#pt1Menu").hide();
    });
    $("div#dpt2").on("mouseenter", function() {   
        repositMenus();
        $("div#pt2Menu").slideDown("fast");
    }).on("mouseleave", function() {
        $("div#pt2Menu").hide();
    });
    $("div#dpt3").on("mouseenter", function() {   
        repositMenus();
        $("div#pt3Menu").slideDown("fast");
    }).on("mouseleave", function() {
        $("div#pt3Menu").hide();
    });
    $("div.dropDownMenu").on("mouseenter", function() {
        $(this).show();
    }).on("mouseleave", function() {
        $(this).hide();
    });
});
function repositMenus() {/*position for the dropDownMenu*/
$("div#pt1Menu")
.css({
    "top": "495px",
    "left": "420px",
    "width": "160px"
});        
$("div#pt2Menu")
.css({
    "top": "495px",
    "left": "600px",
    "width": "160px"
});        
$("div#pt3Menu")
.css({
    "top": "500px",
    "left": "780px",
    "width": "160px"
});
}
function login(){ /* Belongs to login.php 'to verify user and password'*/
  let user = document.getElementById("user").value.trim();
  let pass = document.getElementById("pass").value.trim();
  console.log(user,pass);
  if(user!=""&&pass!="")
  {
    let num='Number=15&email='+user+'&password='+pass;
    $.ajax({
      url: "backend2.php?"+num,
      type: "GET",
      success: function(data) {
        console.log(data);
        let x=JSON.parse(data);
        console.log(x);
        console.log(x['0']['id']);
        if(x['0']['id']=='0')
        alert ("Invalide Email or Password.");
        else if(x['0']['id']=='in')
        alert ("You are now logged in on another device. If not contact admin.");
        else window.location.href ='index.php';
      }
    });
  }
  else{
    alert ("Invalide Email or Password.");
  }
}

function ptCall(name,comCode,code){ /* to get Tasks on modal*/
    ///console.log(name,comCode,code);
    let outData='';
    console.log(name+comCode+code);
    let num='Number=9&comCode='+comCode+'&code='+code;
      $.ajax({
      url: "backend2.php?"+num,
      type: "GET",
      success: function(data) { 
        let x=JSON.parse(data);
        console.log(x);
        outData=getTaskTable(x); 
        console.log(outData);
        $("section#searchResults").empty();
        outData.appendTo($("section#searchResults"));
        let modal = document.getElementById("myModal");
        modal.style.display = "block";
      }
    });
  }    

  function getTaskTable(data){/* it returns table of task for ptCall()*/
    let count=data.length;
    console.log(count);
    
      const table = $("<h1 class='hh'>"+data[0].name+"</h1>");
      table.append($("<p class='pp'>Number:"+data[0].component_code+data[0].code+"</p>"));
      console.log(table);
      table.append($("<table class='center' />"));
      const header = $("<thead />");
      const headerRow = $("<tr />");
      headerRow.
      append($("<th />", { "text": "No."})).
      append($("<th />", { "text": "Operation Description"})).
      append($("<th />", { "text": "Maintenance Frequency"})).
      append($("<th />", { "text": "Last"})).
      append($("<th />", { "text": "Next"})).
      append($("<th />", { "text": "Note"})).
      append($("<th />", { "text": "Task"}))
      header.append(headerRow);
      table.append(header);
      let tableBody = $("<tbody />");
      let oe=0;
      let classOE="";
      let j=0, mide=0;
      let opt='"'+2+'"';
      for(let i=0;i<count;i++){
        if(oe==0){
          classOE="odd";
          oe++;
        }else{
          classOE="even";
          oe--;
        }
          j++;
          mide=data[i].mide_id;
          const tr = `<tr class=${classOE}>
                      <td class='other'>${j}</td>
                      <td class='other'>${data[i].Operation_Description}</td>
                      <td class='other'>${data[i].Maintenance_Frequency}</td>
                      <td class='other'>${data[i].last_date}</td>
                      <td class='other'>${data[i].next_date}</td>
                      <td id='${data[i].task_mide_id}' onclick= 'getHistoryFT("${data[i].task_mide_id}",${opt})'><img class='saveimg' src='img/noteIcon.jpg'></td>
                      <td id='${data[i].id}' onclick= 'delUp("${data[i].task_mide_id}","${data[i].id}","${data[i].Maintenance_Frequency}","${data[i].component_code}","${data[i].code}")'><img class='saveimg' src='img/doneIcon.jpg'></td>
                      </tr>`
          tableBody.append(tr);
        }
      table.append(tableBody);
    return (table);
}

function getHistoryFT(mideId,opt){/* returns history */
    console.log(mideId,opt);
    let modal = document.getElementById("myModal");
    modal.style.display = "none";
    let num='Number=8&mideId='+mideId;
    $.ajax({
      url: "backend2.php?"+num,
      type: "GET",
      success: function(data) { 
        console.log(data);
        let x=JSON.parse(data);
        console.log(x);
        let outData=getHistoyrTable(x,opt);
        if(opt=='1'){
        $('#out').empty();
        $('#out').append($(outData));}
        else{
          $("section#searchResults").empty();
          outData.appendTo($("section#searchResults"));
          modal.style.display = "block";
        }
      }
    });
}
function delUp(mideId,taskId,mF,comCode,code){/* to delete task from upcoming table*/
    console.log(mideId,taskId);
    let num=getNum(mF,taskId);
    $.ajax({ //to set next task date
      url: "backend2.php?"+num,
      type: "GET",
      success: function(data) { 
        num='Number=11&taskId='+taskId;
        $.ajax({//to delete
          url: "backend2.php?"+num,
          type: "GET",
          success: function(data) {
            
              window.location.href ='index.php';
            
            }
        }); 
      }
    });
}
function getNum(mF,taskId){ /*it returns num value for delUp */ 
    let Fre=mF.trim();
    console.log(Fre);
    const lst = Fre.slice(-1);
    let inc =Fre.slice(0, -1);
    inc=(inc*1);
    const nd= new Date();
    console.log(inc);
    console.log(lst);
    console.log(nd.getFullYear()+inc);
    switch(lst) {
      case 'Y':
          nd.setFullYear(nd.getFullYear()+inc);
        break;
      case 'M':
          
          nd.setMonth(nd.getMonth()+inc);
        break;
      case 'W':
          nd.setDate(nd.getDate()+(7*inc));
          break;
      case 'D':
          nd.setDate(nd.getDate()+inc);
          break;
    }
    const last_date = new Date().toJSON().slice(0, 10);
    console.log(nd);
    const next_date = nd.toJSON().slice(0, 10);
    console.log(last_date);
    console.log(next_date);
    let num='Number=12&id='+taskId+'&last_date='+last_date+'&next_date='+next_date;
    console.log(num);
    return (num);
  }

function getHistoyrTable(data,opt){ /*returns table of history for getHistoryFT()*/
    let count=data.length;
    console.log(count);
    let ImageData='';
    
    
    let name=data[0].componentName, comCode=data[0].component_code, code=data[0].code, mide_id=data[0].mide_id;  
    const table = $("<h1 class='hh'>"+name+"</h1>");
    table.append($("<p class='pp'>Number:"+comCode+code+"</p>"));
    table.append($('<label for="fname">Write New Note:</label>'));
    table.append($("<input type='text' name='"+comCode+"' placeholder='New Note' id='nh' /><br>"));
    table.append($('<label for="fname">Select an Image File to Upload:</label>'));
    table.append($('<input id="file" type="file" name="file" accept="image/jpeg, image/png, image/jpg"></input><br>'));
    table.append($('<input name="'+code+'" type="submit" value="Add" id="addNH" onclick="addHistory('+opt+')"/> </div>'));
    console.log(table);
    if(typeof data[0].note!=='undefined')
      {table.append($("<table class='center' />"));
      const header = $("<thead />");
      const headerRow = $("<tr />");
      headerRow.
      append($("<th />", { "text": "History No."})).
      append($("<th />", { "text": "Component Name"})).
      append($("<th />", { "text": "Component Code"})).
      append($("<th />", { "text": "Component Number"})).
      append($("<th />", { "text": "Note"})).
      append($("<th />", { "text": "Image"})).
      append($("<th />", { "text": "Date & Time"})).
      append($("<th />", { "text": "User"}))
      header.append(headerRow);
      table.append(header);
      let tableBody = $("<tbody />");
      let oe=0;
      let classOE="";
      let j=0, mide=0;
      for(let i=0;i<count;i++){
        
        if(data[i].image_name)
        ImageData='<img id="'+data[i].id+'" onclick= "imgModal('+data[i].id+')" src="uploads/'+data[i].image_name+'" alt="Snow" style="width:100%;max-width:60px"></img>';
        else ImageData='Image Not Available';
        
        if(oe==0){
          classOE="odd";
          oe++;
        }else{
          classOE="even";
          oe--;
        }    
        const tr = `<tr class=${classOE}>
                    <td class='other'>${i+1}</td>
                    <td class='other'>${data[i].componentName}</td>
                    <td class='other'>${data[i].component_code}</td>
                    <td class='other'>${data[i].code}</td>
                    <td class='other'>${data[i].note}</td>
                    <td class='other'>${ImageData}</td>
                    <td class='other'>${data[i].date_time}</td>
                    <td class='other'>${data[i].user_email}</td>
                    </tr>`
        tableBody.append(tr);
      }
      table.append(tableBody);
    }
    else{table.append($("<p class='pp'>No Note found. </p>"));}
    table.append($("<input type='hidden' id='mide' value='"+mide_id+"' placeholder='New Note' id='nh' />"));
    return (table);
}
function imgModal(id){ /*to display Image in Modal*/
  console.log(id);
  //var img = document.getElementById("myImg");
  var modal = document.getElementById("imgModal");
  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementById(id);
  console.log(img.src);
  var modalImg = document.getElementById("img01");
  //var captionText = document.getElementById("caption");
  //console.log('rony');
  modal.style.display = "block";
  modalImg.src = img.src;
  //captionText.innerHTML = img.alt;
}

function addHistory(opt){/* when add botton clicked in history table, to save Note*/
  console.log(opt,typeof opt);
  let history = document.getElementById("nh").value;
  history=history.trim();
  if (history == "") {
    alert("Note must be filled out");
  }
  else{
    const file = document.getElementById("file");
    let comCode = document.getElementById("nh").name;
    let code = document.getElementById("addNH").name;
    let mide = document.getElementById("mide").value;
    console.log(userEmail);
    console.log(history,comCode,code,mide);
    console.log(file);
    let image_name = '';
    if(file.files[0]){ 
      var property = file.files[0];
      image_name= property.name;
    }
    let num='Number=2&note='+history+'&history_mide_id='+mide+'&image_name='+image_name+'&user_email='+userEmail;
    console.log(num);
    $.ajax({
      url: "backend2.php?"+num,
      type: "GET",
      success: function(data) { 
        console.log(data);
        if(data==true){
          if(image_name!=''){
            var form_data = new FormData();
            form_data.append("file",property);
            $.ajax({
              url:'upload.php',
              method:'POST',
              data:form_data,
              contentType:false,
              cache:false,
              processData:false,
              success:function(data){
                if(data==true){
                  alert("History Saved.");
                  getHistoryFT(mide,opt);
                }
                else{
                  alert("Something went wrong. History not Saved. Try (After Changing the Image Name) again.");
                } 
              }
            });
          }else {
            alert("History Saved.");
            getHistoryFT(mide,opt);
          }
        }
        else{
          alert("Something went wrong. History not Saved. Try again later");
        }
      }

    });  
  }
}
      

function pkgClk(v) { /* set display for package view*/
   
    let dt = document.getElementById("tpsnd");
    let dc = document.getElementById("cpsnd");
    let ds = document.getElementById("spsnd");
    let dh = document.getElementById("hvsnd");
    let df = document.getElementById("nb");
    let dall=document.getElementsByClassName('out')
    if(v == "1"){
        df.style.display ="none";
        dt.style.display ="block";
    }
    else if(v == "2"){
        df.style.display ="none";
        dc.style.display ="block";
    }
    else if(v == "3"){
        df.style.display ="none";
        ds.style.display ="block";
    }
    else if(v == "4"){
        df.style.display ="none";
        dh.style.display ="block";
    }
    else if(v == "5"){
        console.log(v);
        df.style.display ="block";
        dt.style.display ="none";
        dc.style.display ="none";
        dh.style.display ="none";
        ds.style.display ="none"; 
    }
}
function clickSST(img) { /* for substation to appears LV and MV*/
    var style = getComputedStyle(img,null);
    let modal = document.getElementById("stComp");
    if(modal.style.display == "block"){
        modal.style.display ="none";
        img.style.width  = 8.8+"rem"; // we need to append the "px" 
        img.style.top = 500+"px"; // we need to append the "px" 
        img.style.left = 260+"px";
        img.style.transform= "none";
    }
    else{
        modal.style.display ="block";
        img.style.transform= "scale(1.3)"; 
        img.style.top = 470+"px"; // we need to append the "px" 
        img.style.left = 260+"px";
    }
}
function clickTurbine(img) { /* for turbine.php to appear different components of turbine*/
    var style = getComputedStyle(img,null);
    let modal = document.getElementById("tbComp");
    if(modal.style.display == "block"){
        modal.style.display ="none";
        img.style.width  = 800+"px"; // we need to append the "px" 
        img.style.top = 200+"px"; // we need to append the "px" 
        img.style.left = 200+"px";
    }
    else{
        modal.style.display ="block";
        img.style.width  = 590+"px"; // we need to append the "px" 
        img.style.top = 425+"px"; // we need to append the "px" 
        img.style.left = 300+"px";
    }
}
function clickPowerS(img) { /* for powerST.php to appear different components of Power transformer*/
    var style = getComputedStyle(img,null);
    let modal = document.getElementById("psComp");
    if(modal.style.display == "block"){
        modal.style.display ="none";
        img.style.width  = 600+"px"; // we need to append the "px" 
        img.style.top = 200+"px"; // we need to append the "px" 
        img.style.left = 500+"px";
    }
    else{
        modal.style.display ="block";
        img.style.width  = 350+"px"; // we need to append the "px" 
        img.style.top = 510+"px"; // we need to append the "px" 
        img.style.left = 800+"px";
    }
  }
  
function histortPageStart() { /*gets all history also content for component selection for history.php*/ 
    let outData='';
    let num='';
    $('#out').empty();
    $('.content').empty();
    num='Number=5';
    $.ajax({
        url: "backend2.php?"+num,
        type: "GET",
        success: function(data) { 
            console.log(data);
            if(data!=false){
                let x=JSON.parse(data);
                let count=x.length;
                outData+='<div id="select">';
                outData+='<label for="comcode">Component:</label>';
                outData+='<select id="comCod" onchange="getComponentHistory(this);">';
                outData+='<option value="">--Select--</option>';
                for(let i=0;i<count;i++){
                    console.log(x[i].component_code,x[i].name);
                    outData+='<option value="'+x[i].id+'" >'+x[i].name+'</option>';
                }
                outData+='</select>';
                $('.content').append($(outData));
            }
            else alert("Something went wrong. Try again later");
        }
    });
    num='Number=1';
    $.ajax({
        url: "backend2.php?"+num,
        type: "GET",
        success: function(data) { 
            console.log(data);
            if(data!=false){
                let x=JSON.parse(data);
                outData='';
                outData=getTable('All History',x);
                $('#out').append($(outData));     
            }
            else alert("Something went wrong. Try again later");
        }
    });
}
async function getComponentHistory(sel){ /* gets option list for component number selection for history.php*/
    let name=sel.options[sel.selectedIndex].text;
    name='"'+name+'"';
    let comId = document.getElementById("comCod").value;
    $("section#searchResults").empty();  
    $("<label for='secCode'>Component Number:</label>").appendTo($("section#searchResults")); 
    let opt='"'+1+'"';                                                     
    const selCode =$("<select id='selCode' onchange='getHistoryFT(this.options[this.selectedIndex].value,"+opt+");'>");
    selCode.append($("<option value=''>--Select--</option>"));
    console.log(name);
    let num='Number=6&comId='+comId;
    $.ajax({
      url: "backend2.php?"+num,
      type: "GET",
      success: function(data) { 
        let x=JSON.parse(data);
        x.forEach(element => {
            selCode.append($("<option value='"+element.id+"'>"+element.code+"</option>"));
        }); 
        selCode.append($("</select>"));         
        selCode.appendTo($("section#searchResults"));
        let modal = document.getElementById("myModal");
        modal.style.display = "block";
      }
    }); 
}
function getTable(m,data){ /*returns all history as table for histortPageStart()*/
    let count=data.length;
    let ImageData='';
    console.log(count);
    const table = $("<h1 class='hh'>"+m+"</h1>");
    console.log(table);
    table.append($("<table class='center' />"));
    const header = $("<thead />");
    const headerRow = $("<tr />");
    headerRow.
    append($("<th />", { "text": "History No."})).
    append($("<th />", { "text": "Component Name"})).
    append($("<th />", { "text": "Component Code"})).
    append($("<th />", { "text": "Component Number"})).
    append($("<th />", { "text": "Note"})).
    append($("<th />", { "text": "Image"})).
    append($("<th />", { "text": "Date & Time"})).
    append($("<th />", { "text": "User"}))
    header.append(headerRow);
    table.append(header);
    let tableBody = $("<tbody />");
    let oe=0;
    let classOE="";
    let j=0, mide=0;
    for(let i=0;i<count;i++){
      if(data[i].image_name)
        ImageData='<img id="'+data[i].id+'" onclick= "imgModal('+data[i].id+')" src="uploads/'+data[i].image_name+'" alt="Snow" style="width:100%;max-width:60px"></img>';
        else ImageData='Image Not Available';
      if(oe==0){
        classOE="odd";
        oe++;
      }else{
        classOE="even";
        oe--;
      }
      j++;
      mide=data[i].mide_id;
      const tr = `<tr class=${classOE}>
                  <td class='other'>${j}</td>
                  <td class='other'>${data[i].componentName}</td>
                  <td class='other'>${data[i].component_code}</td>
                  <td class='other'>${data[i].code}</td>
                  <td class='other'>${data[i].note}</td>
                  <td class='other'>${ImageData}</td>
                  <td class='other'>${data[i].date_time}</td>
                  <td class='other'>${data[i].user_email}</td>
                  </tr>`
      tableBody.append(tr);
    }
    table.append(tableBody);
    return (table);
}

function orerationP() { /*startup function for opp.php*/
    //let outData=$('#out');
    let num='', outData='';
    //console.log(outData);
    //$('#out').empty();
    $('.content').empty();
    num='Number=5';
    $.ajax({
        url: "backend2.php?"+num,
        type: "GET",
        success: function(data) { 
            console.log(data);
            if(data!=false){
                let x=JSON.parse(data);
                let count=x.length;
                outData+='<div id="select">';
                outData+='<label for="comcode">Component:</label>';
                outData+='<select id="comCod" onchange="getMide(this);">';
                outData+='<option value="">--Select--</option>';
                for(let i=0;i<count;i++){
                    console.log(x[i].component_code,x[i].name);
                    outData+='<option value="'+x[i].component_code+'" >'+x[i].name+'</option>';
                }
                outData+='</select>';
                $('.content').append($(outData));
            }
            else alert("Something went wrong. Try again later");
        }
    });
    
}

function getMide(sel){/* gets option list to get mide id for opp.php*/
    let name=sel.options[sel.selectedIndex].text;
    name='"'+name+'"';
    let comCode = document.getElementById("comCod").value;
    
    let nComId='"'+comCode+'"';
    document.getElementById("comCod").value='';
    $("section#searchResults").empty();  
    $("<label for='secCode'>Component Number:</label>").appendTo($("section#searchResults"));                                                    
    const selCode =$("<select id='selCode' onchange='getOPP(this,this.options[this.selectedIndex].value,"+nComId+","+name+");'>");
    selCode.append($("<option value=''>--Select--</option>"));
    console.log(name);
    let num='Number=20&comCode='+comCode;
    $.ajax({
        url: "backend2.php?"+num,
        type: "GET",
        success: function(data) { 
        let x=JSON.parse(data);
        x.forEach(element => {
            selCode.append($("<option value='"+element.id+"'>"+element.code+"</option>"));
        }); 
        selCode.append($("</select>"));         
        selCode.appendTo($("section#searchResults"));
        let modal = document.getElementById("myModal");
        modal.style.display = "block";
        }
    });         
}

function getOPP(sel,mideId,comId,name){/* returns the form for opp.php*/
    let code=sel.options[sel.selectedIndex].text;
    console.log(mideId,name,comId,code);
    //let outData='';
    let modal = document.getElementById("myModal");
    modal.style.display = "none";
    const table = $("<h1 class='hh'>"+name+"-"+comId+"-"+code+"</h1>");
    table.append($("<table class='center' id='oppTb' />"));
    const header = $("<thead />");
    const headerRow = $("<tr />");
    headerRow.
    append($("<th />", { "text": "No."})).
    append($("<th />", { "text": "Question"})).
    append($("<th />", { "text": "Answer"}))
    header.append(headerRow);
    table.append(header);
    let tableBody = $("<tbody />");
    let sele ='<select name="YN" id="yn">';
    sele+='<option value="">Select</option>';
    sele+='<option value="1">Yes</option>';
    sele+='<option value="2">No</option>';
    sele+='<option value="3">Dont Know</option>';
    sele+='</select>';
    let inp ='<input id="one" type="number" min="1" step="1" max="10">';
    const tr = `<tr class='odd'>
                <td class='other'>1</td>
                <td class='other'>The component has had problems in the last 12 months?</td>
                <td class='other'>${sele}</td>
                </tr>
                <tr class="even">
                <td class='other'>2</td>
                <td class='other'>The component has had problems in FAT?</td>
                <td class='other'>${sele}</td>
                </tr>
                <tr class='odd'>
                <td class='other'>3</td>
                <td class='other'>The component has had problems in SAT?</td>
                <td class='other'>${sele}</td>
                </tr>
                <tr class="even">
                <td class='other'>4</td>
                <td class='other'>The component has higher than expected failures?</td>
                <td class='other'>${sele}</td>
                </tr>
                <tr class='odd'>
                <td class='other'>5</td>
                <td class='other'>MTTF; rate 1 to 10: (1 when a lot of failures- 10 when very very few failures)</td>
                <td class='other'>${inp}</td>
                </tr>
                <tr class="even">
                <td class='other'>6</td>
                <td class='other'>MTTR; rate 1 to 10: ( 1 can be fixed very quickly- 10 takes very long time to be fixed such as few months for export cable failure)</td>
                <td class='other'>${inp}</td>
                </tr>
                <tr class='odd'>
                <td class='other'>7</td>
                <td class='other'>Rate Critical to Operate index 1 for lowest criticality and 10 for highest criticality</td>
                <td class='other'>${inp}</td>
                </tr>`
    tableBody.append(tr);
    table.append(tableBody);
    $('#out').append($(table));       
}

function upcomingWStart() {/*Start up function for upcomming.php*/
    $('#out').empty();
    let num='Number=10';
    $.ajax({
        url: "backend2.php?"+num,
        type: "GET",
        success: function(data) { 
            console.log(data);
            let x=JSON.parse(data);
            let outData=getTaskTableUp(x);
            $('#out').append($(outData));
        }
            
    });
}
function upcommonthMStart(){
    $('#out').empty();
    let num='Number=17';
    $.ajax({
        url: "backend2.php?"+num,
        type: "GET",
        success: function(data) { 
            console.log(data);
            let x=JSON.parse(data);
            let outData=getTaskTableUp(x);
            $('#out').append($(outData));
        }     
    });
}

function getTaskTableUp(data){ /* returns table for upcomming.php and upcommonth.php*/
    let count=data.length;
    console.log(count);
    const table = $("<h1 class='hh'>Upcoming Operations</h1>");
    console.log(table);
    table.append($("<table class='center' />"));
    const header = $("<thead />");
    const headerRow = $("<tr />");
    headerRow.
    append($("<th />", { "text": "No."})).
    append($("<th />", { "text": "Component Name"})).
    append($("<th />", { "text": "Component Code"})).
    append($("<th />", { "text": "Operation Description"})).
    append($("<th />", { "text": "Maintenance Frequency"})).
    append($("<th />", { "text": "Last"})).
    append($("<th />", { "text": "Next"})).
    append($("<th />", { "text": "Note"})).
    append($("<th />", { "text": "Task"}))
    header.append(headerRow);
    table.append(header);
    let tableBody = $("<tbody />");
    let oe=0;
    let classOE="";
    let j=0, mide=0;
    let opt='"'+2+'"';
    for(let i=0;i<count;i++){
      if(oe==0){
        classOE="odd";
        oe++;
      }else{
        classOE="even";
        oe--;
      }
        j++;
        mide=data[i].mide_id;
        const tr = `<tr class=${classOE}>
                    <td class='other'>${j}</td>
                    <td class='other'>${data[i].name}</td>
                    <td class='other'>${data[i].component_code+data[i].code}</td>
                    <td class='other'>${data[i].Operation_Description}</td>
                    <td class='other'>${data[i].Maintenance_Frequency}</td>
                    <td class='other'>${data[i].last_date}</td>
                    <td class='other'>${data[i].next_date}</td>
                    <td id='${data[i].task_mide_id}' onclick= 'getHistoryFT("${data[i].task_mide_id}",${opt})'><img class='saveimg' src='img/noteIcon.jpg'></td>
                    <td id='${data[i].id}' onclick= 'delUp("${data[i].task_mide_id}","${data[i].id}","${data[i].Maintenance_Frequency}","${data[i].component_code}","${data[i].code}")'><img class='saveimg' src='img/doneIcon.jpg'></td>
                    </tr>`
        tableBody.append(tr);
      }
    table.append(tableBody);
    return (table);
  }

$(document).delegate("#span", "click", function(e) { /* to exit from modal*/
    let modal = document.getElementById("myModal");
    //
      modal.style.display = "none";
}); 
function closeImgModal() { /* to exit from Image modal*/
  var modal = document.getElementById("imgModal");
  modal.style.display = "none";
}
function logOut() {
  console.log(userId,inTime);
  let num='Number=25&in_time='+inTime+'&id='+userId;
    $.ajax({
        url: "backend2.php?"+num,
        type: "GET",
        success: function(data) { 
            console.log(data);
            if (data)window.location.href ='login.php';
        }     
    });

}