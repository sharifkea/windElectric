"use strict";
var opData={};
opData['sN1']='The component has had problems in the last 12 months?';
opData['sN2']='The component has had problems in FAT?';
opData['sN3']='The component has had problems in SAT?';
opData['sN4']='The component has higher than expected failures?';
opData['mf']='MTTF: rate 0 to 10: (0 when a lot of failures- 10 when very very few failures)';
opData['mr']='MTTR: rate 0 to 10: ( 0 taks Minimum - 10 takes Maximum time to be fixed)';
var inp ='<input id="one" type="number" min="1" step="1" max="10">';
var opOut={}, opHt1='',opHt2='',opSMF={};
$(window).bind('unload', function(){
  $.ajax({
    url: "backend2.php?"+num,
    type: "GET",
    success: function(data) { 
                    
    }     
  });
});
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
        const th = $("<h1 class='hh'>"+name+"</h1>");
        th.append($("<p class='pp'>Number:"+comCode+code+"</p>"));
            if(x[0]['id']!=undefined){
              let count=x.length;

              for(let i=0;i<count;i++){
                x[i]['Operation Description']= x[i]['Operation Description'].trim();
                x[i]['Maintenance Frequency']= x[i]['Maintenance Frequency'].trim();
                name ="'"+name+"'";
                let od="'"+x[i]['Operation Description']+"'";
                let mf="'"+x[i]['Maintenance Frequency']+"'";
                let cc="'"+comCode+"'",cd="'"+code+"'", opt="'"+2+"'";
                x[i]['Note']='<img id="'+x[i]['mide_id']+'" onclick= "getHistoryFT('+x[i]['mide_id']+','+opt+')" class="saveimg" src="img/noteIcon.jpg" ></img>';
                x[i]['Task']= '<img id="'+x[i]['id']+'" onclick= "taskDone('+x[i]['id']+','+name+','+od+','+mf+','+cc+','+cd+')" class="saveimg" src="img/doneIcon.jpg"></img>';
                delete(x[i]['mide_id']);
                delete(x[i]['id']);
              }
          var outData=logTable(x); 
        }
        else{
         var outData=($("<p>No Upcoming Operations found.</p>"));
        } 
        console.log(outData);
        $("section#searchResults").empty();
        th.appendTo($("section#searchResults"));
        outData.appendTo($("section#searchResults"));
        let modal = document.getElementById("myModal");
        modal.style.display = "block";
      }
    });
  }    

 /* function getTaskTable(data){// it returns table of task for ptCall()
    let count=data.length;
    console.log(count);
    
      const th = $("<h1 class='hh'>"+data[0].name+"</h1>");
      th.append($("<p class='pp'>Number:"+data[0].component_code+data[0].code+"</p>"));
      const table=($("<table />", { "class":  "center"}));
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
                      <td id='${data[i].id}' onclick= 'taskDone("${data[i].id}","${data[i].name}","${data[i].Operation_Description}","${data[i].Maintenance_Frequency}","${data[i].component_code}","${data[i].code}")'><img class='saveimg' src='img/doneIcon.jpg'></td>
                      </tr>`
          tableBody.append(tr);
        }
      table.append(tableBody);
      th.append(table);
    return (th);
}*/

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
function taskDone(taskId,name,operation,mF,comCode,code){/* when a task done button clicked*/
  mF="'"+mF+"'";
  const header = $("<h1 class='hh'>"+name+"</h1>");
  header.append($("<p class='pp'>Number:"+comCode+code+"</p>"));

  const pg=($('<p class="pp">Operation Description:'+operation+'</p>'));
  pg.append($('<br><label for="fname">Write Report:</label>'));
  pg.append($("<input type='text' name='"+comCode+"' placeholder='New Note' id='tR' /><br>"));
  pg.append($('<label for="fname">Select an Image File to Upload:</label>'));
  pg.append($('<input id="file" type="file" name="file" accept="image/jpeg, image/png, image/jpg"></input><br>'));
  pg.append($('<input name="'+code+'" type="submit" value="Done" id="addTH" onclick="addTaskHistory('+taskId+','+mF+')"/> </div>'));
  const outData='';
  header.append(pg);
  //outData.append(pg); 
  //console.log(outData);
  $("section#searchResults").empty();
  header.appendTo($("section#searchResults"));
  let modal = document.getElementById("myModal");
  modal.style.display = "block";
}
function addTaskHistory(taskId,mF){/* to delete task from upcoming table*/
mF=mF.trim();
  console.log(taskId,mF);
  let history = document.getElementById("tR").value;
  history=history.trim();
  console.log(history);
  if (history == "") {
    alert("Note must be filled out");
  }
  else{
    const file = document.getElementById("file");
    let comCode = document.getElementById("tR").name;
    let code = document.getElementById("addTH").name;
    //let mide = document.getElementById("mide").value;
    console.log(userEmail);
    console.log(history,comCode,code);
    console.log(file);
    let image_name = null;
    if(file.files[0]){ 
      var property = file.files[0];
      image_name= property.name;
    }
    //$_REQUEST['id'],$_REQUEST['report'],$_REQUEST['imgName']
    let num='Number=29&report='+history+'&id='+taskId+'&imgName='+image_name;
    console.log(num);
    $.ajax({
      url: "backend2.php?"+num,
      type: "GET",
      success: function(data) { 
        console.log(data);
        if(data){
          if(image_name!=null&&image_name!='null'){
            var form_data = new FormData();
            form_data.append("file",property);
            $.ajax({
              url:'taskUpload.php',
              method:'POST',
              data:form_data,
              contentType:false,
              cache:false,
              processData:false,
              success:function(data){
                if(data==true){
                  
                  alert("Operation History Saved.");
                  closeModal();
                  updateTask(mF,taskId);
                  //getHistoryFT(mide,opt);
                }
                else{
                  alert("Something went wrong.Operation History not Saved. Try (After Changing the Image Name) again.");
                } 
              }
            });
          }else {
            alert("Operation History Saved.");
            closeModal();
            updateTask(mF,taskId);
            //getHistoryFT(mide,opt);
          }
        }
        else{
          alert("Something went wrong.Operation History not Saved. Try again later");
        }
      }

    });  
  }
}

function updateTask(mF,taskId){
    //console.log(mideId,taskId);
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
    const th = $("<h1 class='hh'>"+name+"</h1>");
    th.append($("<p class='pp'>Number:"+comCode+code+"</p>"));
    th.append($('<label for="fname">Write New Note:</label>'));
    th.append($("<input type='text' name='"+comCode+"' placeholder='New Note' id='nh' /><br>"));
    th.append($('<label for="fname">Select an Image File to Upload:</label>'));
    th.append($('<input id="file" type="file" name="file" accept="image/jpeg, image/png, image/jpg"></input><br>'));
    th.append($('<input name="'+code+'" type="submit" value="Add" id="addNH" onclick="addHistory('+opt+')"/> </div>'));
    console.log(th);
    if(typeof data[0].note!=='undefined')
      {const table=($("<table />", { "class":  "center"}));
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
      th.append(table);
    }
    else{th.append($("<p class='pp'>No Note found. </p>"));}
    th.append($("<input type='hidden' id='mide' value='"+mide_id+"' placeholder='New Note' id='nh' />"));

    return (th);
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
  getComp('getHistoryFT');
  getHistoryAll();
}

function getComp(fun){
  fun="'"+fun+"'";
  let outData='';
  let num='';
  
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
              outData+='<select id="comCod" onchange="getComponentHistory(this,'+fun+');">';
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
}

function getHistoryAll(){
  console.log('getHistoryAll');
  $('#out').empty();
  let num='Number=1';
  $.ajax({
      url: "backend2.php?"+num,
      type: "GET",
      success: function(data) { 
          console.log(data);
          if(data!=false){
              let x=JSON.parse(data);
              //let outData='';
              let outData=getTable('All History',x);
              $('#out').append($(outData));     
          }
          else alert("Something went wrong. Try again later");
      }
  });
}
async function getComponentHistory(sel,fun){ /* gets option list for component number selection for history.php*/
    let name=sel.options[sel.selectedIndex].text;
    name='"'+name+'"';
    let comId = document.getElementById("comCod").value;
    $("section#searchResults").empty();  
    $("<label for='secCode'>Component Number:</label>").appendTo($("section#searchResults")); 
    let opt='"'+1+'"';                                                     
    const selCode =$("<select id='selCode' onchange='"+fun+"(this.options[this.selectedIndex].value,"+opt+");'>");
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
    const th = $("<h1 class='hh'>"+m+"</h1>");
    const table=($("<table />", { "class":  "center"}));
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
    th.append(table);
    return (th);
}

function operationP(ops,op) { /*startup function for opp.php*/
    //let outData=$('#out');
    let num='', outData='';
    console.log(ops);
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
                let ht="<h1 class='hh' id='oph1'> Operation Philosophy-"+op+"</h1>";
                outData+='<div id="select">';
                outData+='<label for="comcode">Component:</label>';
                outData+='<select id="comCod" onchange="getMide(this,'+ops+');">';
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

function getMide(sel,ops){/* gets option list to get mide id for opp.php*/
    let name=sel.options[sel.selectedIndex].text;
    name='"'+name+'"';
    let comCode = document.getElementById("comCod").value;
    
    let nComId='"'+comCode+'"';
    document.getElementById("comCod").value='';
    $("section#searchResults").empty();  
    $("<label for='secCode'>Component Number:</label>").appendTo($("section#searchResults"));                                                    
    const selCode =$("<select id='selCode' onchange='getOPP(this,this.options[this.selectedIndex].value,"+nComId+","+name+","+ops+");'>");
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

function getOPP(sel,mideId,comId,name,ops){/* returns the form for opp.php*/
    let code=sel.options[sel.selectedIndex].text;
    console.log(mideId,name,comId,code,ops);
    if(ops==1){
      var op="CbM";
    }else  var op="RCM";
    //let outData='';
    //let oph1 = document.getElementById("oph1").innerHTML;
    //console.log(oph1);
    $('#out').empty();
    let modal = document.getElementById("myModal");
    modal.style.display = "none";
    let ht = "<h1 class='hh' id ='oph1'>Operation Philosophy-"+op+"</h1>";
    ht+="<h1 class='hh'>"+name+"-"+comId+code+"</h1>";
    opHt1="Operation Philosophy-"+op;
    opHt2=name+"-"+comId+code;
    console.log(ht);
    let div=($("<div />", { "class":  "fDiv"}));
    const form=($("<form />", { "action":"","id": "opfid"/*, "onsubmit":"oppCount()"*/}));
    const table=($("<table />", { "class":  "center",'id': 'oppTb'}));
    const header = $("<thead />");
    const headerRow = $("<tr />");
    headerRow.
    append($("<th />", { "text": "No."})).
    append($("<th />", { "text": "Question"})).
    append($("<th />", { "text": "Answer"}))
    header.append(headerRow);
    table.append(header);
    let tableBody = $("<tbody />");
    let sele=[];
    for(let i=0;i<4;i++){
      let j=i+1;
      sele[i] ='<select name="sN'+j+'" id="sId'+j+'" required>';
      sele[i]+='<option value="">Select</option>';
      sele[i]+='<option value="1">Yes</option>';
      sele[i]+='<option value="0">No</option>';
      sele[i]+='<option value="12">Dont Know</option>';
      sele[i]+='</select>';
    }
    
    const tr = `<tr class='odd'>
                  <td class='other'>1</td>
                  <td class='other'>${opData['sN1']}</td>
                  <td class='other'>${sele[0]}</td>
                </tr>
                <tr class="even">
                  <td class='other'>2</td>
                  <td class='other'>${opData['sN2']}</td>
                  <td class='other'>${sele[1]}</td>
                </tr>
                <tr class='odd'>
                  <td class='other'>3</td>
                  <td class='other'>${opData['sN3']}</td>
                  <td class='other'>${sele[2]}</td>
                </tr>
                <tr class="even">
                  <td class='other'>4</td>
                  <td class='other'>${opData['sN4']}</td>
                  <td class='other'>${sele[3]}</td>
                </tr>
                <tr class='odd'>
                  <td class='other'>5</td>
                  <td class='other'>${opData['mf']}</td>
                  <td class='other'><input id="idMF" name = "mf" type="number" min="0" step="1" max="10" required></td>
                </tr>
                <tr class="even">
                  <td class='other'>6</td>
                  <td class='other'>${opData['mr']}</td>
                  <td class='other'><input id="idMR" name = "mr" type="number" min="0" step="1" max="10" required></td>
                </tr>`
    tableBody.append(tr);
    table.append(tableBody);
    form.append(table);
    let end=($("<input />", { "name":"mideId", "id":"opmi", "type":"hidden", "value":mideId}));
    form.append(end);
    end=($("<input />", { "name":"comId", "id":"opci", "type":"hidden", "value":comId}));
    form.append(end);
    end=($("<input />", { "name":"code", "id":"cod", "type":"hidden", "value":code}));
    form.append(end);
    end=($("<input />", { "name":"ops", "id":"idOps", "type":"hidden", "value":ops}));
    form.append(end);
    end=($("<input />", { "name":"op", "id":"Op", "type":"hidden", "value":op}));
    form.append(end);
    end=($('<button />',{ "name":"submit",'type':"button", 'onclick':"oppCount()","id":"opfs"}).text('Submit'));
    //end=($("<input />", { "name":"submit", "id":"opfs", "type":"submit", "value":"Submit"}));
    form.append(end);
    div.append(form);
    console.log(div);
    //end+='</form>';
    //end+='</div>';
    //ht+=table;
    //ht+=end;
    //opHt=ht;
    //opData+=div;
    $('#out').append($(ht));
    $('#out').append($(div));  
    //$('#out').append($(end));     
}

/*function upcomingWStart() {//Start up function for upcomming.php
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
}*/
function upcomStart(value){
  
    $('#out').empty();
    let num='';
    if (value=='Month')num='Number=17';
    else if(value=='Week')num='Number=10';
    $.ajax({
        url: "backend2.php?"+num,
        type: "GET",
        success: function(data) { 
            console.log(data);
            let x=JSON.parse(data);
            const th = $("<h1 class='hh'>Upcoming Operations for this "+value+"</h1>");
            if(x[0]['id']!=undefined){
              let count=x.length;

              for(let i=0;i<count;i++){
                x[i]['Operation Description']= x[i]['Operation Description'].trim();
                x[i]['Maintenance Frequency']= x[i]['Maintenance Frequency'].trim();
                let name ="'"+x[i]['Component Name']+"'", od="'"+x[i]['Operation Description']+"'";
                let mf="'"+x[i]['Maintenance Frequency']+"'";
                let cc="'"+x[i]['component_code']+"'", opt="'"+2+"'";
                x[i]['Note']='<img id="'+x[i]['mide_id']+'" onclick= "getHistoryFT('+x[i]['mide_id']+','+opt+')" class="saveimg" src="img/noteIcon.jpg" ></img>';
                x[i]['Task']= '<img id="'+x[i]['id']+'" onclick= "taskDone('+x[i]['id']+','+name+','+od+','+mf+','+cc+','+data[i]['Component Code']+')" class="saveimg" src="img/doneIcon.jpg"></img>';
                x[i]['Component Code']=x[i]['component_code']+x[i]['Component Code'];
                delete(x[i]['component_code']);
                delete(x[i]['mide_id']);
                delete(x[i]['id']);
              }
          var outData=logTable(x); 
        }
        else{
         var outData=($("<p>No Upcoming Operations found.</p>"));
        }
            //let outData=getTaskTableUp(x);
            $('#out').append($(th));
            $('#out').append($(outData));
        }     
    });
}

/*function getTaskTableUp(data){ // returns table for upcomming.php and upcommonth.php
    let count=data.length;
    console.log(count);
    const th = $("<h1 class='hh'>Upcoming Operations</h1>");
    const table=($("<table />", { "class":  "center"}));
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
                    <td id='${data[i].id}' onclick= 'taskDone("${data[i].id}","${data[i].name}","${data[i].Operation_Description}","${data[i].Maintenance_Frequency}","${data[i].component_code}","${data[i].code}")'><img class='saveimg' src='img/doneIcon.jpg'></td>
                    </tr>`
        tableBody.append(tr);
      }
    table.append(tableBody);
    th.append(table);
    return (th);
  }*/
$(document).delegate("#span", "click", function(e) { /* to exit from modal*/
  closeModal();
}); 
function closeCBM() { /* to exit from modal*/
  $("#out").empty();
  closeModal();
  //window.location.href ='cbm.php';
}
$(document).delegate("#spanRCM", "click", function(e) { /* to exit from modal*/
  $("#out").empty();
  closeModal();
  //window.location.href ='rcm.php';
});
function closeModal(){
  let modal = document.getElementById("myModal");
      modal.style.display = "none";
}

function closeImgModal() { /* to exit from Image modal*/
  var modal = document.getElementById("imgModal");
  modal.style.display = "none";
}
function logOut() {/* to exit from application (when Log Out Clicked) for logout.php*/
  console.log(userId,inTime);
  let num='Number=25';
    $.ajax({
        url: "backend2.php?"+num,
        type: "GET",
        success: function(data) { 
            console.log(data);
            if (data==true)window.location.href ='login.php';
        }     
    });

}
function logView(){/* for log view in Modle (when Log Out Clicked) at index.php*/
  let num='Number=26';
  $.ajax({
    url: "backend2.php?"+num,
    type: "GET",
    success: function(data) { 
      console.log(data);
      let x=JSON.parse(data);
      console.log(x);
      const th = $("<h1 class='hh'>Log</h1>");
      const outData=logTable(x); 
      console.log(outData);
      $("section#searchResults").empty();
      th.appendTo($("section#searchResults"));
      outData.appendTo($("section#searchResults"));
      let modal = document.getElementById("myModal");
      modal.style.display = "block";
    }     
  });
}
function userView(){
  let num='Number=27';
  $.ajax({
    url: "backend2.php?"+num,
    type: "GET",
    success: function(data) { 
      console.log(data);
      let x=JSON.parse(data);
      console.log(x);
      let count=x.length;
      for(let i=0;i<count;i++){
        if(x[i]["Currently"]==1){x[i]["Currently"]='Logged In';}
        else {
          x[i]["Currently"]='Logged Out';
          x[i]['button']="<img class='delImg' onclick= 'delUser("+x[i]['User Id']+")' src='img/delete.png'>";
        }
        if(x[i]["Status"]==1){x[i]["Status"]='Admin';}
        else x[i]["Status"]='User';
      }
      const th = $("<h1 class='hh'>Users</h1>");
      const outData=logTable(x);
      outData.append($('<button type="button"  id="addNU" onclick="addUser()">Add New User</button>'));;
      console.log(outData);
      $("section#searchResults").empty();
      th.appendTo($("section#searchResults"));
      outData.appendTo($("section#searchResults"));
      let modal = document.getElementById("myModal");
      modal.style.display = "block";
    }     
  });
}
function addUser(){
  console.log('I am in');
  let modal = document.getElementById("myModal");
  modal.style.display = "none";
  window.location='addUs.php';

}
function delUser(id){
  console.log(id);
  let num='Number=28&id='+id;
  $.ajax({
    url: "backend2.php?"+num,
    type: "GET",
    success: function(data) { 
      console.log(data);
      userView();
    }
  });
}

function mainHistortPageStart(){
  getComp('getMainHFT');
}

function getMainHFT(mideId,opt){/* returns Maintanence history */
    console.log(mideId,opt);
    let modal = document.getElementById("myModal");
    modal.style.display = "none";
    let num='Number=30&mideId='+mideId;
    $.ajax({
      url: "backend2.php?"+num,
      type: "GET",
      success: function(data) { 
        console.log(data);
        let x=JSON.parse(data);
        let name=x[0]['Component Name']+x[0]['Component Code'];  
        console.log(name);
        const th = $("<h1 class='hh'>Maintenance History Of "+name+" </h1>");
        //const y=$('');
        //const th = $("<h1 class='hh'>Log</h1>");
        
        if(x[0]['mide_id']!=undefined){
          let count=x.length;
          for(let i=0;i<count;i++){
            
            console.log(i);
            if(x[i]['Image'])
              x[i]['Image']='<img id="'+x[i].id+'" onclick= "imgModal('+x[i].id+')" src="taskuploads/'+x[i]['Image']+'" alt="Snow" style="width:100%;max-width:60px"></img>';
            else x[i]['Image']='Image Not Available';
            x[i]['Component Code']=x[i]['component_code']+x[i]['Component Code'];
            delete(x[i]['component_code']);
            delete(x[i]['mide_id']);
            delete(x[i]['id']);
          }
          var outData=logTable(x); 
        }
        else{
         var outData=($("<p>No Maintenance History found.</p>"));
        }
        //th.append(y);
        console.log(th);
        $('#out').empty();
        $('#out').append($(th));
        $('#out').append($(outData));
      }
    });
}
  

function logTable(data){ /*returns log as table for logView()*/
  let count=data.length;
  console.log(count);
  let keys = Object.keys(data[0]);
  console.log(keys);
  
  const table=($("<table />", { "class":  "center", 'id':'dfTable'}));
  const header = $("<thead />");
  const headerRow = $("<tr />");
  headerRow.append($("<th />", { "text": "No."}));
  for (let k of keys) {
    headerRow.append($("<th />", { "text": k}));
  }
  header.append(headerRow);
  table.append(header);
  let tableBody = $("<tbody />");
  let oe=0;
  let classOE="";
  for(let i=0;i<count;i++){
    console.log(i);
    keys = Object.keys(data[i]);
    console.log(keys);

    if(oe==0){
      classOE="odd";
      oe++;
    }else{
      classOE="even";
      oe--;
    }
    let tB=($("<tr />", { "class": classOE }));

    let j=i+1;
    tB.append($("<td />", { "text": j }));
    for (let k of keys) {
      console.log(data[i][k]);
      if(k!='button'&&k!='Image'&&k!='Note'&&k!='Task'&&k!='To Accept'&&k!='Back to Default')
        tB.append($("<td />", { "text":  data[i][k]}));
      else tB.append($("<td />", { "html":  data[i][k]}));
      
    }
    tableBody.append(tB);
  }
  table.append(tableBody);
  //th.append(table);
  console.log(table);
  return (table);
}
function oppCount(){
  let req={};
  opOut={};
  const formData= $("#opfid").serializeArray();
    console.log(formData,formData.length);
    let j=0;
    let i=0;
    //opData='';
    //opData=document.querySelector("#oppTb");
    for(i=0;i<formData.length;i++){
      if(formData[i]['value']!=''){
        req[formData[j]['name']]=formData[i]['value'];
        j++;
      }
    }
    if(j!=i){
      alert('Answer Missing.');
    }else{
    console.log(req);
    if(req['op']=='CbM'||(req['op']=='RCM'&&(req['comId']=='FSR-'||req['comId']=='STC-'||req['comId']=='PT-'||req['comId']=='MVS-'||req['comId']=='HVS-'||req['comId']=='OEC-'||req['comId']=='LC-')))
    {  let newReq=[];
      let keys = Object.keys(req);
      for (let k of keys) {
        if(k!='b' || k!= 'comId'|| k!='submit'){
          if(req[k]!='12')newReq[k]=req[k]*1; else newReq[k]=0;
        }
        else newReq[k]=req[k];
        if(req[k]=='12')opOut[k]='Dont Know';
        else if(req[k]=='1'&&k!='mf'&&k!='mr')opOut[k]='Yes';
        else if(req[k]=='0'&&k!='mf'&&k!='mr')opOut[k]='No';
        else opOut[k]=req[k];
      }
      
      console.log(newReq,opOut);
      let last12=0;
      let three=newReq['sN2']+newReq['sN3']+newReq['sN4'];
      if(three==0&&newReq['sN1']==1) last12=1;
      let pct=(((newReq['mf']+newReq['mr'])/2)*10)+(-50);
      console.log(three,pct,last12);
      
      let num='Number=9&comCode='+req['comId']+'&code='+req['code'];
      $.ajax({
        url: "backend2.php?"+num,
        type: "GET",
        success: function(data) { 
          console.log(data);
          let x=JSON.parse(data);
          console.log(x);
          console.log(x);
          let count=x.length;
          let month=0, finalT=0,j=0,fMF='',ft=0;
          for(let i=0;i<count;i++){
            let Fre=x[i]['Maintenance Frequency'].trim();
            console.log(Fre);
            const lst = Fre.slice(-1);
            let inc =Fre.slice(0, -1);
            inc=(inc*1);
            const nd= new Date();
            console.log(inc);
            console.log(lst);
            //console.log(nd.getFullYear()+inc);
            switch(lst) {
              case 'Y':
                month=12*inc;
                if(last12==1)ft=inc*2;else ft=three*inc;
                let one =month-ft;
                let two =month+(Math.round((month*pct)/100));
                console.log(one,two);
                if(one<two)finalT=one;else finalT=two;
                finalT=finalT.toFixed(0);
                if((finalT%12)==0){
                  fMF=(finalT/12)+'Y';
                }else fMF=finalT+'M';
                x[i]['Suggested Maintenance Frequency']=fMF;
                x[i]['To Accept']='<input type="checkbox" id="vehicle1" name="'+i+'='+x[i]["id"]+'" value="'+fMF+'"></input>';
                j=j+1;
                break;
              case 'M':
                month=inc;
                if(month>11){
                  if(last12==1)ft=Math.round((inc/12)*2);else ft=Math.round((inc/12)*three);
                  let one =month-ft;
                  let two =month+(Math.round((month*pct)/100));
                  console.log(one,two);
                  if(one<two)finalT=one;else finalT=two;
                  finalT=finalT.toFixed(0);
                  if((finalT%12)==0){
                    fMF=(finalT/12)+'Y';
                  }else fMF=finalT+'M';
                  x[i]['Suggested Maintenance Frequency']=fMF;
                  x[i]['To Accept']='<input type="checkbox" id="vehicle1" name="'+i+'='+x[i]["id"]+'" value="'+fMF+'"></input>';
                  j=j+1;
                }else{
                  x[i]['Suggested Maintenance Frequency']="N/A";
                  x[i]['To Accept']="-";
                }
                break; 
              default:
                x[i]['Suggested Maintenance Frequency']="N/A";
                x[i]['To Accept']="-";
            }
            delete(x[i]['id']);
            delete(x[i]['mide_id']);
          }
          if(j==0){
            var outData=$("<h1 class='hh'>No Change Suggested in Maintenance Frequency.</h1>");
          }
          else{
            console.log(x);

            let table=logTable(x); 
            let opForm=($("<form />",{"action":"", "id":"oppForm"/*, "onsubmit":'subAccOpp("'+req["b"]+'")'*/})); 
            let opDiv=($("<div />", {"id":"oppDiv"}));
            opDiv.append(table);
            opForm.append(opDiv);
            opForm.append($('<button />',{ "name":"submit",'type':"button", "onclick":'subAccOpp("'+req["op"]+'")',"id":"opfb"}).text('Submit'));
            //opForm.append($("<input />",{"type":"submit", "value":"Submit"}));
            var outData=opForm;
            console.log(outData);         
          }
          const th = $("<h1 class='hh'>Operation Philosophy of "+req['comId']+req['code']+"</h1>");
            $("#out").empty();
            $('#out').append($(th));
            $('#out').append($(outData));
        }
      });
    }else{
      const outData=$("<h1 class='hh'>Is no a Series Component.</h1>");
      const th = $("<h1 class='hh'>Operation Philosophy of "+req['comId']+req['code']+"</h1>");
            $("#out").empty();
            $('#out').append($(th));
            $('#out').append($(outData));
    }
  }
}
function subAccOpp(ops){
  console.log(opData,opOut,opHt1,opHt2);
  const formData= $("#oppForm").serialize();
  console.log(formData,ops);
  const formDA= $("#oppForm").serializeArray();
  console.log(formDA);
  if(formDA.length>0){
    //let mId={};
    let tr='';
    opSMF={};
    let i=0;
    let j=0;
    let k=1;
    for(i=0;i<formDA.length;i++){
      const myArray = formDA[i]['name'].split("=");
      tr=(myArray[0]*1)+1;
      console.log(tr);
      let mId=myArray[1];
      let mF=formDA[i]['value'];
      
      console.log(mId,mF);
      let x = document.getElementById("dfTable").rows[tr].cells;
      console.log(x);
      let od='';
      if (x[1].innerHTML.length>20) {
        od=x[1].innerHTML.substring(0,20);
        console.log(od)
      }else od=x[1].innerHTML;
      //let l=k+1;
      opSMF[k-1]=k+'. Operation Description: '+od+'... Last MF: '+x[2].innerHTML+' Suggested MF:'+x[5].innerHTML;
      k=k+1;
      let lastDate=x[3].innerHTML;
      console.log(lastDate);
      let newDate=dateNMF(mF,lastDate);
      let num='Number=32&mId='+mId+'&mF='+mF+'&newDate='+newDate+'&ops='+ops;
      console.log(num);
      $.ajax({
        url: "backend2.php?"+num,
        type: "GET",
        success: function(data) { 
          console.log(data);
          if(data==true){
            j++;
          }
        }
      });
    }
    console.log(i);
    const th = $("<h1 class='hh'>All Maintenance Frequencies changed.<br> To Download Report as PDF </h1> <a href='#' id='download'>Download</a>");
    $("section#searchResults").empty();
    th.appendTo($("section#searchResults"));
    //outData.appendTo($("section#searchResults"));
    let modal = document.getElementById("myModal");
    modal.style.display = "block";
    }else{
      const th = $("<h1 class='hh'>No Maintenance Frequency changed.</h1>");
      $("section#searchResults").empty();
      th.appendTo($("section#searchResults"));
      //outData.appendTo($("section#searchResults"));
      let modal = document.getElementById("myModal");
      modal.style.display = "block";
  }
  $("#out").empty();
}

$(document).delegate("#download", "click", function(e) { /* to downlode PDF*/
  console.log(opData,opOut,opHt1,opHt2,opSMF);
  var doc = new jsPDF();
  doc.setFont("helvetica", "bold");
  doc.text(opHt1, 75, 10);
  doc.setFont("helvetica", "bold");
  doc.text(opHt2, 75, 20);
  
  let keys = Object.keys(opData);
  let i=1;
      for (let k of keys) {
  doc.setFont("times", "italic");
  let row=(25+(10*i));
  doc.text(i+". "+opData[k]+" : "+opOut[k], 15,row);
  i=i+1;
  }
  doc.setFont("times", "normal");
  doc.text("Accepted Results", 15, 110);
  let jkeys = Object.keys(opSMF);
  i=0;
  for (let k of jkeys) {
    doc.setFont("times", "italic");
    let row=(120+(10*i));
    doc.text(opSMF[k], 15, row);
    i=i+1;
  }
  let nd= new Date();
  let d='op-'+Math.round(nd.getTime() / 1000)+'.pdf';
  doc.save(d);
  $("#out").empty();
  closeModal();
});

function dateNMF(mF,date){ /*it returns num value for delUp */ 
    //let Fre=mF.trim();
    //console.log(Fre);
    console.log(date,mF);
    const lst = mF.slice(-1);
    let inc =mF.slice(0, -1);
    inc=(inc*1);
    const nd= new Date(date);
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
    console.log(nd);
    const next_date = nd.toJSON().slice(0, 10);
    console.log(next_date);
    return (next_date);
}
function operationHistory(){
  let num='Number=33';
    $.ajax({
      url: "backend2.php?"+num,
      type: "GET",
      success: function(data) { 
        console.log(data);
        let x=JSON.parse(data);
        const th = $("<h1 class='hh'>Operation Philosophy History</h1>");
         if(x[0]['id']!=undefined){
          let count=x.length;
          for(let i=0;i<count;i++){
           console.log(i);
           let dmf="'"+x[i]['Default Maintenance Frequency'].trim()+"'";
           let ld="'"+x[i]['last_date']+"'";
            x[i]['Back to Default']='<button type="button" id="'+x[i].id+'" class="ophbt" onclick= "delOpHis('+x[i].id+','+x[i].task_id+','+dmf+','+ld+')" >Back</button>';
            delete(x[i].task_id);
            delete(x[i].id);
            delete(x[i].last_date);
          }
          var outData=logTable(x); 
        }
        else{
         var outData=($("<p>No Operation Philosophy History found.</p>"));
        }
        //th.append(y);
        console.log(th);
        $('#out').empty();
        $('#out').append($(th));
        $('#out').append($(outData));
      }
    });

}
function delOpHis(id,taskId,dmf,ld){
  let nd=dateNMF(dmf,ld);
  let num='Number=34&taskId='+taskId+'&mF='+dmf+'&newDate='+nd+'&id='+id;
  console.log(num);
  $.ajax({
    url: "backend2.php?"+num,
    type: "GET",
    success: function(data) { 
      console.log(data);
      if(data==true){
        alert('Maintenance Frequency Back to Default Successfully.');
        operationHistory();
      }else{
        alert('Somthing went wrong.')
      }
    }
  });
}

function toFDate(){
  let num='Number=37';
    $.ajax({
      url: "backend2.php?"+num,
      type: "GET",
      success: function(data) { 
          console.log(data);
          let x=JSON.parse(data); 
          console.log(x);
          let table=logTable(x);
          
          $("#out").empty();
          //$('#out').append($(th));
          $('#out').append($(table));
          }  
      
  });
  //getInpDate(28);
  getComp('getInpDate');
}

function getInpDate(mId,ex){

  var myElem = document.getElementById('inP');
  if (myElem === null) {
  const div = $("<div id='inP'></div>");
  $('#select').append($(div));}
  else $('#inP').empty();
  console.log(mId,ex);
    let modal = document.getElementById("myModal");
    modal.style.display = "none";
    document.getElementById('comCod').value='';
    /*let num='Number=8&mideId='+mideId;
    $.ajax({
      url: "backend2.php?"+num,
      type: "GET",
      success: function(data) { 

      }
    });*/
  //const mId="27";
  let num='Number=35&mId='+mId;
    $.ajax({
      url: "backend2.php?"+num,
      type: "GET",
      success: function(data) { 
          console.log(data);
          let x=JSON.parse(data);
          console.log(x);
          const th = $("<h1 class='hh'>Insert Failure Information of : "+x[0]['Name']+"</h1>");
          const form=($("<form />", { "action":"","id": "failInput"}));
          data=data.trim();
          if(x[0]['ret']=='no Data'){
              var end=`
              <label for="fname">Installation Date:</label>
              <input type="date" id="dateId" name="insDate" min='2000-01-01' max='2024-01-01'><br>
              <label for="lname">Date When Failure Occurs:</label>
              <input type="date" id="dateId" name="fDate" min='2000-01-01' max='2024-01-01'><br>
              <label for="lname">Date When Repairing Ends:</label>
              <input type="date" id="dateId" name="rDate" min='2000-01-01' max='2024-01-01'><br>
              <button name ="submit" type="button" value="Submit" onclick="getFDate(${mId},0)">Submit</button>`
          }else{
              var end=`
              <label for="Fname">Date When Failure Occurs:</label>
              <input type="date" id="dateId" name="fDate" min='2000-01-01' max='2024-01-01'><br>
              <label for="Rname">Date When Repair Ends:</label>
              <input type="date" id="dateId" name="rDate" min='2000-01-01' max='2024-01-01'><br>
              <button name ="submit" type="button" value="Submit" onclick="getFDate(${mId},1)">Submit</button>`
          }
          form.append(end);
          //$('#out').empty();
          $('#inP').append($(th));
          $('#inP').append($(form));
          const today = new Date().toJSON().slice(0, 10);
          document.getElementById("dateId").setAttribute("max", today);
      }
    });
  }
function getFDate(mId, inDb){
  console.log(mId,inDb);
  var newF={};
  const formDA= $("#failInput").serializeArray();
  console.log(formDA);
  const len=formDA.length;
  if((inDb==0&&len<3)||(inDb==1&&len<2)){
      alert('Input Missing.');
  }else{
      for(let i=0;i<len;i++){
          newF[formDA[i]['name']]=formDA[i]['value']
      }
      console.log(newF);
      if(inDb==0){
          if(newF["insDate"]>newF["fDate"]||newF["fDate"]>newF["rDate"])
          {
              alert('Incorrect Data Entered.');
          }else{
              let tf=monthDiff(newF["insDate"],newF["fDate"])+'M';
              let tr=dayDiff(newF["fDate"],newF["rDate"])+'D';
              //"mId"=>"26", "insDate"=>"2015-02-01", "tf"=>"10M", "tr"=>"5D", "fDate"=>"2015-12-07", "rDate"=>"2015-12-12"
              let num='Number=36&mId='+mId+'&insDate='+newF["insDate"]+'&tf='+tf+'&tr='+tr+'&fDate='+newF["fDate"]+'&rDate='+newF["rDate"]; 
              console.log(num);
              $.ajax({
                  url: "backend2.php?"+num,
                  type: "GET",
                  success: function(data){
                      if(data)alert('Data Saved.');
                      else alert('Something went wrong, Data not Saved.');
                      toFDate();
                  }
              });
          }
      }else{
          if(newF["fDate"]>newF["rDate"]){
              alert('Incorrect Data Entered.');
          }else{
              let num='Number=35&mId='+mId;
              $.ajax({
                  url: "backend2.php?"+num,
                  type: "GET",
                  success: function(data) {
                      let x=JSON.parse(data); 
                      console.log(x);
                      if(x[0].Last_Recovery_Date>newF["fDate"]){
                        console.log(x[0].Last_Recovery_Date,newF["fDate"]);
                          alert ('The component Failure occurs before the Last recovery date, unable to calculate MTTF.');
                          toFDate();
                      }else{
                          let noF=(x[0].Total_No_of_Failure*1)+1;
                          let inc =x[0]['MTTF'].slice(0, -1);
                          inc=(inc*1);
                          let tf=monthDiff(x[0]['Last_Failure_Date'],newF["fDate"]);
                          tf=Math.round(((tf+(inc*x[0].Total_No_of_Failure))/noF))+'M';
                          inc=x[0]['MTTR'].slice(0, -1);
                          inc=(inc*1);
                          let tr=dayDiff(newF["fDate"],newF["rDate"]);
                          tr=Math.round(((tr+(inc*x[0].Total_No_of_Failure))/noF))+'D';
                          let num='Number=36&mfId='+x[0]['id']+'&mId='+mId+'&noF='+noF+'&tf='+tf+'&tr='+tr+'&fDate='+newF["fDate"]+'&rDate='+newF["rDate"]; 
                          console.log(num);
                          $.ajax({
                              url: "backend2.php?"+num,
                              type: "GET",
                              success: function(data){
                                  console.log(data);
                                  if(data==1)alert('Data Saved.');
                                  else alert('Something went wrong, Data not Saved.');
                                  toFDate();
                              }
                          });
                          
                      }
                  }
              });
          }
      }
  }        
  
}
function monthDiff(dateFrom, dateTo) {
  var dt = new Date(dateTo);
  var df= new Date(dateFrom);
  return Math.round((dt.getMonth() - df.getMonth()) + 
  (12 * (dt.getFullYear() - df.getFullYear())));
}

function dayDiff(dateFrom, dateTo) {
  var dt = new Date(dateTo);
  var df= new Date(dateFrom);
  return Math.round((dt.getTime() - df.getTime())/ (1000 * 3600 * 24)); 
}
