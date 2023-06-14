<!DOCTYPE html>
<html>
<body>
<style>
    .custom-select {
      position: relative;
      display: block;
      max-width: 200px;
      min-width: 180px;
      margin: 0 auto;
      /*Color Caja*/ 
      background-color: #cffffa;
      box-shadow:  5px 5px 10px #63ffef;
      border-radius: 8px;
      z-index: 10;
    }
    
    .custom-select select {
      border: none;
      outline: none;
      background: transparent;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      border-radius: 0;
      margin: 0;
      display: block;
      width: 100%;
      padding: 12px 55px 15px 15px;
      font-size: 14px;
      color: #B500B5;
    }
    
    .custom-select:after {
      position: absolute;
      right: 0;
      top: 0;
      width: 50px;
      height: 100%;
      line-height: 38px;
      text-align: center;
      color: #3C1C78;
      font-size: 24px;
      border-left: 1px solid #714BB9;
      z-index: -1;
    }
    
    body {
      margin-top: 80px;
    }
  </style>
  <center>
<h2>The select Element</h2>

<p>The select element defines a drop-down list:</p>
<form method="post">
    <label for="options" class="custom-select">
      <select id="options" name="options">
        <option value="1" selected>Titulo</option>
        <option value="2">Autor</option>
        <option value="3">Fecha</option>
      </select>
    </label>
    <button type="submit">Submit</button>
  </form>

<?php
if(isset($_POST["options"])){
    echo $_POST["options"];
}else{
    echo "Aun no se selecciona nada";
}
    
?>
</center>
</body>
</html>