<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <title>Dictionary</title>
  </head>
  <body>
      <div class="grid">
          <div class="title">My First Dictionary!</div>
          <div class="header">
              <h3>Instruction</h3>
              <p>The button "Add" will add new English phrase into database</p>
              <p>The button "Translate" will load suggestions for translation</p>
              <p>The button "Add translation" will add translation into database for the English phrase</p>
          </div>
          <div class="content">
             <div class="label">
              <label>Translate from English</label>
             </div>
             <div class="dropdown">
              <div class="dropdown-content">
               <label>To</label>
               <select name="language" id="lang">
                 <option value="spanish">Spanish</option>
                 <option value="french">French</option>
                 <option value="german">German</option>
                 <option value="russian">Russian</option>
               </select>
              </div>
             </div>
             <div class="enform">
                <textarea id="phrEn" name="enPhrase" placeholder="Type phrase on English language" cols="40" rows="10" wrap="hard"></textarea>
             </div>
             <div class="otherform">
                <textarea id="phr" name="Phrase" placeholder="Translatated phrase on other language" cols="40" rows="10" wrap="hard"></textarea>
             </div>
             <div class="btn">
               <div class="btn1">
                 <button class="button" type="submit" id="btnAdd" name="submit">Add</button>
               </div>
               <div class="btn2">
                 <button class="button" type="submit" id="btnTrans" name="submit">Translate</button>
               </div>
               <div class="btn3">
               <button class="button" type="submit" id="btnAddTrans" name="submit">Add Translation</button>
               </div>
             </div>
          </div>
          <div class="result">
            <p>The result will displayed here</p>
            <p id="result">Test</p>
          </div>
          
      </div>
      <script> 
  var searchRequest = null;
      $ (function () {
        var minlength = 3;

        $("#btnTrans").click(function () {
            var lang = $('option:selected',"#lang"), 
            value = $('option:selected',"#lang").attr('value');
            var that = $("#phrEn"),
            value1 = $("#phrEn").val();
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
                      var d = JSON.stringify(data);
                      $("#result").html(d);
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
  </script>
  <script>
      $(function(){
        var minlength = 3; 

        $("#btnAdd").click(function(){
            
          var that = $("#phrEn"),
          value = $("#phrEn").val();
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
                    var d = JSON.stringify(data);
                    $("#result").html(d);
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
    
  </script>
<script>
  $(function(){
    var minlength = 3; 
    $("#btnAddTrans").click(function(){
      var that = $("#phrEn"),
      value = $("#phrEn").val();
      var lang = $('option:selected',"#lang"), 
      value1 = $('option:selected',"#lang").attr('value'); 
      var other = $("#phr"),
      value2 = $("#phr").val();

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
               d = JSON.stringify(data);
               $("#result").html(d);
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
</script>
  </body>
</html>