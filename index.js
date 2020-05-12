//AJAX call to find suggestions
var searchRequest = null;
      $ (function () {
        var minlength = 3;

        $("#btnTrans").click(function () {
            var lang = $('option:selected',"#lang"), 
            value = $('option:selected',"#lang").attr('value');
            var that = $("#phrEn"),
            val = $("#phrEn").val();
            val1 = val.replace(/[+'[|<>@\],\/#$%\^&\*;:{}=\-_`~()]/g, "");
            value1 = val1.replace(/\s{2,}/g, " ");
            console.log(value);
            console.log(value1);
            if (value1.length >= minlength) {
              searchRequest = $.ajax({

                  type: "POST",
                  url: "/dictionary/api/findPhrases.php",
                  data: {
                       'tablename' : value,
                       'pattern' : value1
                  },
                  dataType: "json",
                  success: function(data){

                      console.log(data);
                      var json_obj = $.parseJSON(data);
                      var out = JSON.stringify(json_obj);
                      console.log(out);
                      var outp = out.replace(/[{},]/g, " <br>");
                      var output = outp.replace(/["]/g, " ");
                      $("#result").html(output);                    
                  },
                  dataType: "html",
                  error: function(){
                    $("#result").html("Error");
                  }
                  
              });
            } else {
              alert("Please insert the word with at least 3 letters length.");
            }

        });

      });    

//AJAX call to add translation
$(function(){
    var minlength = 3; 
    $("#btnAddTrans").click(function(){
      val = $("#phrEn").val();
      val1 = val.replace(/[+'[|?<>@.\],\/#!$%\^&\*;:{}=\-_`~()]/g, "");
      value = val1.replace(/\s{2,}/g, " ");
      value1 = $('option:selected',"#lang").attr('value'); 
      val2 = $("#phr").val();
      val3 = val2.replace(/[+'[|.?!<>@\],\/#$%\^&\*;:{}=\-_`~()]/g, "");
      value2 = val2.replace(/\s{2,}/g, " ");
       console.log(value2);
       console.log(value);
      if(value.length >= minlength && value2.length >= minlength){
          searchRequest = $.ajax({
             type: 'POST',
             url: '/dictionary/api/addTranslation.php',
             data: {
                   'enPhrase' : value,
                   'tablename' : value1,
                   'phrase' : value2
             },
             dataType: "json",
             success: function(data){
                 
                var out = JSON.stringify(data);
                console.log(out);
                var outp = out.replace(/[{},":]/g, "");
                var output = outp.replace("message", "");
                $("#result").html(output + " for " + value1 + " language.");
             },
             error: function(){
               $("#result").html("Error");
             }
          });
      } else {
        alert("Please insert in both textboxes the word with at least 3 letters length.");
      }
    });
  });

  //AJAX call to add English phrase into database
  $(function(){
    var minlength = 3; 

    $("#btnAdd").click(function(){
        
      var that = $("#phrEn"),
      val = $("#phrEn").val();
      val1 = val.replace(/[+'[.?!|<>@\],\/#$%\^&\*;:{}=\-_`~()]/g, "");
      value = val1.replace(/\s{2,}/g, " ");
      if (value.length >= minlength){
        console.log(value);
          searchRequest = $.ajax({
              type: "POST",
              url: "/dictionary/api/createPhrase.php",
              data: {
                'phrase': value
              },
              dataType: "json",
              success: function(data){
                console.log(data);
                var out = JSON.stringify(data);
                console.log(out);
                var outp = out.replace(/[{},":]/g, "");
                var output = outp.replace("message", "");
                $("#result").html(output);
              },
              error: function(){
                $("#result").html("Error");
              }
          });
      } else {
        alert("Please insert the word with at least 3 letters length.");
      }  
     });
  });
