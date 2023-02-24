<?php
$result='';
require_once 'components/mechanism.php';
include_once 'components/copy.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $string=$_POST['ttb'];
    $string = Mechanism::cleanInput($string);
    $result = Mechanism::stringToBinary($string);
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once 'components/header.php'?>
<body>
<div id="uvodnitext" class="row text-white text-center">
    <h4>Welcome to the Text-to-Binary converter</h4>
</div>
<div id="form" class="row text-center">
    <div class="col-xl-1 col-lg-1 col-md-1"></div>
    <div id="leftside" class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
        <br>
        <h4>Please insert the text you want to be converted:</h4>
        <br><h6>Binary code output can only support ASCII (no special letters like č,ć,...)</h6>
        <form action="" method="post">
            <textarea class="text-center" style="border-radius: 5px;" name="ttb" id="ttb" cols="60" rows="10"></textarea>
            <br>
            <button type="submit" class="btn btn-success text-white">CONVERT</button>
        </form>
    </div>
        <div id="rightside" class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
            <br>
        <h4>Converted binary code:</h4>
        <br>
            <textarea disabled id="copy" class="text-center" style="border-radius: 5px; resize:none; color:black;" name="ttb" id="ttb" cols="60" rows="10"><?=$result?></textarea>
            <br>
            <button type="button" onclick="copyEvent('copy')" class="btn btn-success text-white">COPY TO CLIPBOARD</button>
        </div>
        <div class="col-xl-1 col-lg-1 col-md-1"></div>
</div>



<?php include_once 'components/footer.php'?>
</body>
<?php include_once 'components/scripts.php'?>
<script>
function copyEvent(id) {
    let str = document.getElementById(id);
    window.getSelection().selectAllChildren(str);
    document.execCommand("Copy")
    alert("Copied to clipboard!");
}
</script>
</html>