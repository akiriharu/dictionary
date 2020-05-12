<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="index.js"></script>
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
               <select name="tablename" id="lang">
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
                <textarea id="phr" name="phrase" placeholder="Translatated phrase on other language" cols="40" rows="10" wrap="hard"></textarea>
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
            <p>The result will be displayed here</p>
            <p id="result">Test</p>
          </div>
          
      </div>
  </body>
</html>