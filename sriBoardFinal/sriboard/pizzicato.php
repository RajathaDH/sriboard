<?php

    session_start();

 ?>
 <?php
    if (!isset($_SESSION['email'])){
      header("Location: ../signin/signin.php?error=loggedout&instrument=pizzicato");
    }
?>
<?php

    if (isset($_GET['octave'])) {
      if ($_GET['octave']==-1) {
          echo '<style>
                #octavelow{
                  background-color:cyan;
                }
          </style>';
      }
    elseif ($_GET['octave']==1) {
        echo '<style>
              #octavehigh{
                background-color:cyan;
              }
        </style>';
      }
      else {
        echo '<style>
              #octavenormal{
                background-color:cyan;
              }
        </style>';
      }
    }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sriboard</title>
    <link rel="stylesheet" href="sriboard.css">
    <link rel="stylesheet" href="../header1.css">
    <script type="text/javascript" src="sriboard.js" defer></script>
    <script type="text/javascript">
      function normalOctave(){
        location.replace("pizzicato.php?octave=0");
      }
      function lowOctave(){
        location.replace("pizzicato.php?octave=-1");
      }
      function highOctave(){
        location.replace("pizzicato.php?octave=1");
      }
    </script>
  </head>
  <body>
    <style>
        body  {
          background-image: url("pizzicato.jpg");
          background-size:cover;
              }
    </style>
    <header>
      <div class="header">
          <div class="logowithname" >
              <li>
                <a href="../home/home.php">
                <img src="../logo1.jpg" alt="" id="logoimage">
              </a>
              </li>
            <div class="navigation">
              <ul>
                <li><a href="../sriboard/piano.php?octave=0" class="navtabs">Grand Piano</a></li>
                <li><a href="../sriboard/pizzicato.php?octave=0" class="navtabs">Pizzicato</a></li>
                <li><a href="../sriboard/epiano.php?octave=0" class="navtabs">E.Piano</a></li>
                <?php
                if (isset($_SESSION['email']))
                {
                    echo '<li><a href="../home/home.php" class="navtabs">Home</a></li>
                    <li><a href="../signin/signout.php" class="navtabs">Logout</a></li>';
                }else
                {
                echo'
                <li><a href="../signin/signin.php" class="navtabs">Login</a></li>
                <li><a href="../signup/signup.php" class="navtabs">Sign Up</a></li>';
                }?>
              </ul>
        </div>
      </div>
    </header>

    <div class="cont">

      <div class="options">

        <div class="recordoptions">
            <div class="container">
              <img src="../buttons/record.png" >
              <button type="button" class="btn" onclick="startRecord()"></button>
            </div>
          <div class="container">
            <img src="../buttons/stop.png" >
            <button type="button" class="btn" onclick="stopRecord()"></button>
          </div>
          <div class="container">
            <img src="../buttons/play.png" >
            <button type="button" class="btn" onclick="playRecord2()"></button>
          </div>
          <div class="container">
            <img src="../buttons/save.png" >
            <button type="button" class="btn" onclick="saveRecord()"></button>
          </div>
          <div class="container">
            <img src="../buttons/playsave.png" >
            <button type="button" class="btn" onclick="playSaveRecordFile()"></button>
          </div>
        </div>

        <div class="volumeoptions">
          <input type="range" name="" class="slider" id="volume" min="0" max="1" step="0.01" value="0.8">
        </div>

        <div class="optiontext">
          <p id="textparagraph"></p>
        </div>

        <div class="keyboardoptions">
          <div class="sustain">
            Sustain
            <label class="switch">
              <input type="checkbox" id="sustain" checked>
              <span class="slider2 round"></span>
            </label>
          </div>
          <div class="octaveswitch">
              <p>Octave Switch</p>
              <input type="button" class="octavebutton" id="octavelow" name="octave" value="-1" onclick="lowOctave()">
              <input type="button" class="octavebutton" id="octavenormal" name="octave" value="0" onclick="normalOctave()">
              <input type="button" class="octavebutton" id="octavehigh" name="octave" value="1" onclick="highOctave()">
          </div>
          <div class="showkeys">
            Show Keys
            <label class="switch">
              <input type="checkbox" id="showtext" onclick="showkeys()">
              <span class="slider2 round"></span>
            </label>
          </div>
        </div>

      </div>

      <div class="piano">
        <div data-note="C5" class="key white"><p class="whitekey" id="whitekeytext1">Q</p></div>
        <div data-note="Db5" class="key black"><p class="blackkey" id="blackkeytext1">2</p></div>
        <div data-note="D5" class="key white"><p class="whitekey" id="whitekeytext2">W</p></div>
        <div data-note="Eb5" class="key black"><p class="blackkey" id="blackkeytext2">3</p></div>
        <div data-note="E5" class="key white"><p class="whitekey" id="whitekeytext3">E</p></div>
        <div data-note="F5" class="key white"><p class="whitekey" id="whitekeytext4">R</p></div>
        <div data-note="Gb5" class="key black"><p class="blackkey" id="blackkeytext3">5</p></div>
        <div data-note="G5" class="key white"><p class="whitekey" id="whitekeytext5">T</p></div>
        <div data-note="Ab5" class="key black"><p class="blackkey" id="blackkeytext4">6</p></div>
        <div data-note="A5" class="key white"><p class="whitekey" id="whitekeytext6">Y</p></div>
        <div data-note="Bb5" class="key black"><p class="blackkey" id="blackkeytext5">7</p></div>
        <div data-note="B5" class="key white"><p class="whitekey" id="whitekeytext7">U</p></div>
        <div data-note="C6" class="key white"><p class="whitekey" id="whitekeytext8">C</p></div>
        <div data-note="Db6" class="key black"><p class="blackkey" id="blackkeytext6">F</p></div>
        <div data-note="D6" class="key white"><p class="whitekey" id="whitekeytext9">V</p></div>
        <div data-note="Eb6" class="key black"><p class="blackkey" id="blackkeytext7">G</p></div>
        <div data-note="E6" class="key white"><p class="whitekey" id="whitekeytext10">B</p></div>
        <div data-note="F6" class="key white"><p class="whitekey" id="whitekeytext11">N</p></div>
        <div data-note="Gb6" class="key black"><p class="blackkey" id="blackkeytext8">J</p></div>
        <div data-note="G6" class="key white"><p class="whitekey" id="whitekeytext12">M</p></div>
        <div data-note="Ab6" class="key black"><p class="blackkey" id="blackkeytext9">K</p></div>
        <div data-note="A6" class="key white"><p class="whitekey" id="whitekeytext13">,</p></div>
        <div data-note="Bb6" class="key black"><p class="blackkey" id="blackkeytext10">L</p></div>
        <div data-note="B6" class="key white"><p class="whitekey" id="whitekeytext14">.</p></div>
        <div data-note="C7" class="key white"><p class="whitekey" id="whitekeytext15">/</p></div>
      </div>

    </div>

<?php
  if ($_GET['octave']==-1) {
    echo '<audio id="C5" src="../notes/pizzicato/C4.mp3"></audio>
    <audio id="Db5" src="../notes/pizzicato/Db4.mp3"></audio>
    <audio id="D5" src="../notes/pizzicato/D4.mp3"></audio>
    <audio id="Eb5" src="../notes/pizzicato/Eb4.mp3"></audio>
    <audio id="E5" src="../notes/pizzicato/E4.mp3"></audio>
    <audio id="F5" src="../notes/pizzicato/F4.mp3"></audio>
    <audio id="Gb5" src="../notes/pizzicato/Gb4.mp3"></audio>
    <audio id="G5" src="../notes/pizzicato/G4.mp3"></audio>
    <audio id="Ab5" src="../notes/pizzicato/Ab4.mp3"></audio>
    <audio id="A5" src="../notes/pizzicato/A4.mp3"></audio>
    <audio id="Bb5" src="../notes/pizzicato/Bb4.mp3"></audio>
    <audio id="B5" src="../notes/pizzicato/B4.mp3"></audio>
    <audio id="C6" src="../notes/pizzicato/C5.mp3"></audio>
    <audio id="Db6" src="../notes/pizzicato/Db5.mp3"></audio>
    <audio id="D6" src="../notes/pizzicato/D5.mp3"></audio>
    <audio id="Eb6" src="../notes/pizzicato/Eb5.mp3"></audio>
    <audio id="E6" src="../notes/pizzicato/E5.mp3"></audio>
    <audio id="F6" src="../notes/pizzicato/F5.mp3"></audio>
    <audio id="Gb6" src="../notes/pizzicato/Gb5.mp3"></audio>
    <audio id="G6" src="../notes/pizzicato/G5.mp3"></audio>
    <audio id="Ab6" src="../notes/pizzicato/Ab5.mp3"></audio>
    <audio id="A6" src="../notes/pizzicato/A5.mp3"></audio>
    <audio id="Bb6" src="../notes/pizzicato/Bb5.mp3"></audio>
    <audio id="B6" src="../notes/pizzicato/B5.mp3"></audio>
    <audio id="C7" src="../notes/pizzicato/C6.mp3"></audio>';
  }
  else if ($_GET['octave']==1) {
    echo '<audio id="C5" src="../notes/pizzicato/C6.mp3"></audio>
    <audio id="Db5" src="../notes/pizzicato/Db6.mp3"></audio>
    <audio id="D5" src="../notes/pizzicato/D6.mp3"></audio>
    <audio id="Eb5" src="../notes/pizzicato/Eb6.mp3"></audio>
    <audio id="E5" src="../notes/pizzicato/E6.mp3"></audio>
    <audio id="F5" src="../notes/pizzicato/F6.mp3"></audio>
    <audio id="Gb5" src="../notes/pizzicato/Gb6.mp3"></audio>
    <audio id="G5" src="../notes/pizzicato/G6.mp3"></audio>
    <audio id="Ab5" src="../notes/pizzicato/Ab6.mp3"></audio>
    <audio id="A5" src="../notes/pizzicato/A6.mp3"></audio>
    <audio id="Bb5" src="../notes/pizzicato/Bb6.mp3"></audio>
    <audio id="B5" src="../notes/pizzicato/B6.mp3"></audio>
    <audio id="C6" src="../notes/pizzicato/C7.mp3"></audio>
    <audio id="Db6" src="../notes/pizzicato/Db7.mp3"></audio>
    <audio id="D6" src="../notes/pizzicato/D7.mp3"></audio>
    <audio id="Eb6" src="../notes/pizzicato/Eb7.mp3"></audio>
    <audio id="E6" src="../notes/pizzicato/E7.mp3"></audio>
    <audio id="F6" src="../notes/pizzicato/F7.mp3"></audio>
    <audio id="Gb6" src="../notes/pizzicato/Gb7.mp3"></audio>
    <audio id="G6" src="../notes/pizzicato/G7.mp3"></audio>
    <audio id="Ab6" src="../notes/pizzicato/Ab7.mp3"></audio>
    <audio id="A6" src="../notes/pizzicato/A7.mp3"></audio>
    <audio id="Bb6" src="../notes/pizzicato/Bb7.mp3"></audio>
    <audio id="B6" src="../notes/pizzicato/B7.mp3"></audio>
    <audio id="C7" src="../notes/pizzicato/C8.mp3"></audio>';
  }
  else{
    echo '<audio id="C5" src="../notes/pizzicato/C5.mp3"></audio>
    <audio id="Db5" src="../notes/pizzicato/Db5.mp3"></audio>
    <audio id="D5" src="../notes/pizzicato/D5.mp3"></audio>
    <audio id="Eb5" src="../notes/pizzicato/Eb5.mp3"></audio>
    <audio id="E5" src="../notes/pizzicato/E5.mp3"></audio>
    <audio id="F5" src="../notes/pizzicato/F5.mp3"></audio>
    <audio id="Gb5" src="../notes/pizzicato//Gb5.mp3"></audio>
    <audio id="G5" src="../notes/pizzicato/G5.mp3"></audio>
    <audio id="Ab5" src="../notes/pizzicato/Ab5.mp3"></audio>
    <audio id="A5" src="../notes/pizzicato/A5.mp3"></audio>
    <audio id="Bb5" src="../notes/pizzicato/Bb5.mp3"></audio>
    <audio id="B5" src="../notes/pizzicato/B5.mp3"></audio>
    <audio id="C6" src="../notes/pizzicato/C6.mp3"></audio>
    <audio id="Db6" src="../notes/pizzicato/Db6.mp3"></audio>
    <audio id="D6" src="../notes/pizzicato/D6.mp3"></audio>
    <audio id="Eb6" src="../notes/pizzicato/Eb6.mp3"></audio>
    <audio id="E6" src="../notes/pizzicato/E6.mp3"></audio>
    <audio id="F6" src="../notes/pizzicato/F6.mp3"></audio>
    <audio id="Gb6" src="../notes/pizzicato/Gb6.mp3"></audio>
    <audio id="G6" src="../notes/pizzicato/G6.mp3"></audio>
    <audio id="Ab6" src="../notes/pizzicato/Ab6.mp3"></audio>
    <audio id="A6" src="../notes/pizzicato/A6.mp3"></audio>
    <audio id="Bb6" src="../notes/pizzicato/Bb6.mp3"></audio>
    <audio id="B6" src="../notes/pizzicato/B6.mp3"></audio>
    <audio id="C7" src="../notes/pizzicato/C7.mp3"></audio>';
  }
 ?>

  </body>
</html>
