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

                  type: "GET",
                  url: "/dictionary/api/english/findPhrases.php",
                  data: {
                       'tablename' : value,
                       'pattern' : value1
                  },
                  dataType: "json",
                  success: function(data){

                      console.log(data);
                      var json_obj = $.parseJSON(data);
                     
                      var lang = $('option:selected',"#lang").attr('value');
                      var output = "<ul>";
                      switch (lang){
                         case "spanish" : 
                               for(i=0; i < json_obj.data.length; i++){
                                  output += "<li>" + json_obj.data[i].phrase + " : " + json_obj.data[i].phraseSp + "</li>"; 
                                } 
                         break;
                         case "french" : 
                                for(i=0; i < json_obj.data.length; i++){
                                   output += "<li>" + json_obj.data[i].phrase + " : " + json_obj.data[i].phraseFr + "</li>";
                                }
                         break; 
                         case "german" : 
                                for(i=0; i < json_obj.data.length; i++){
                                   output += "<li>" + json_obj.data[i].phrase + " : " + json_obj.data[i].phraseGr + "</li>";
                                }
                         break;
                         case "russian" : 
                                for(i=0; i < json_obj.data.length; i++){
                                   output += "<li>" + json_obj.data[i].phrase + " : " + json_obj.data[i].phraseRu + "</li>";
                                }
                         break                  
                       }
                                            
                      output += "</ul>";
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
      var that = $("#phrEn"),
      val = $("#phrEn").val();
      val1 = val.replace(/[+'[|?<>@.\],\/#!$%\^&\*;:{}=\-_`~()]/g, "");
      value = val1.replace(/\s{2,}/g, " ");
      var lang = $('option:selected',"#lang"), 
      value1 = $('option:selected',"#lang").attr('value'); 
      var other = $("#phr"),
      val2 = $("#phr").val();
      val3 = val2.replace(/[+'[|.?!<>@\],\/#$%\^&\*;:{}=\-_`~()]/g, "");
      value2 = val1.replace(/\s{2,}/g, " ");
       console.log();
      if(value.length >= minlength && value2.length >= minlength){
          searchRequest = $.ajax({
             type: 'GET',
             url: '/dictionary/api/english/addTranslation.php',
             data: {
                   'enPhrase' : value,
                   'tablename' : value1,
                   'phrase' : value2
             },
             dataType: "json",
             success: function(data){
               console.log(data);
               $("#result").html("Translation added");
             },
             error: function(){
               $("#result").html("Probably the phrase is already in database");
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
          searchRequest = $.ajax({
              type: "GET",
              url: "/dictionary/api/english/createPhrase.php",
              data: {
                'phrase': value
              },
              dataType: "json",
              success: function(data){
                console.log(data);
                  $("#result").html("Phrase created");
                  console.log(data);
                 // alert("Phrase created");
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
